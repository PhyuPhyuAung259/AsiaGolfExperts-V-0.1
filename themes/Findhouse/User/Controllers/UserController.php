<?php
namespace Themes\Findhouse\User\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Matrix\Exception;
use Modules\Booking\Models\Payment;
use Modules\FrontendController;
use Modules\Tracking\Models\TrackingLog;
use Modules\User\Events\NewVendorRegistered;
use Modules\User\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Vendor\Models\VendorRequest;
use Themes\Findhouse\Agencies\Models\BravoContactObject;
use Validator;
use Modules\Booking\Models\Booking;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Booking\Models\Enquiry;
use Themes\Findhouse\Property\Models\Property;
use Modules\Review\Models\Review;
use Modules\User\Models\UserWishList;

class UserController extends FrontendController
{
    use AuthenticatesUsers;

    protected $enquiryClass;

    public function __construct()
    {
        $this->enquiryClass = Enquiry::class;
        parent::__construct();
    }


    public function dashboard(Request $request)
    {
        $this->checkPermission('dashboard_agent_access');
        $user_id = Auth::id();
        $countProperty = Property::where("author_id", $user_id)->count();
        $countView     = Property::where("author_id", $user_id)->sum('view');
        $countWish     = UserWishList::where("user_id", $user_id)->count();
        $countReview   = Review::join("bravo_properties","bravo_properties.id","bravo_review.object_id")->where("bravo_properties.author_id", $user_id)->where("bravo_review.object_model","'property'")->count();
        $f = strtotime('monday this week');
        $data = [
            'count_property' => $countProperty,
            'page_title'         => __("Agent Dashboard"),
            'count_view'         => $countView,
            'count_review'       => $countReview,
            'count_wish'         => $countWish,
            'notifications'      => getNotify(),
            'views_data'         => $this->getDashboardViewsData($f, time()),
            'breadcrumbs'        => [
                [
                    'name'  => __('Dashboard'),
                    'class' => 'active'
                ]
            ]
        ];
        return view('User::frontend.dashboard', $data);
    }

    public function getDashboardViewsData($from, $to)
    {
        $data = [
            'labels'   => [],
            'datasets' => [
                [
                    'label'           => __("Total Views"),
                    'data'            => [],
                    'backgroundColor' => 'transparent',
                    'borderColor'     => '#ff5a5f',
                    'stack'           => 'group-total',
                    'type'            => 'line'
                ]
            ]
        ];
        $sql_raw[] = 'sum(`amount`) as total_price';
        if (($to - $from) / DAY_IN_SECONDS > 90) {
            $year = date("Y", $from);
            // Report By Month
            for ($month = 1; $month <= 12; $month++) {
                $day_last_month = date("t", strtotime($year . "-" . $month . "-01"));
                $viewCount = TrackingLog::query()
                    ->where('vendor_id', Auth::id())
                    ->whereBetween('created_at', [
                        $year . '-' . $month . '-01 00:00:00',
                        $year . '-' . $month . '-' . $day_last_month . ' 23:59:59'
                    ])
                    ->where('object_model', 'property')
                    ->count();
                $data['labels'][] = date("F", strtotime($year . "-" . $month . "-01"));
                $data['datasets'][0]['data'][] = $viewCount ?? 0;
            }
        } elseif (($to - $from) <= DAY_IN_SECONDS) {
            // Report By Hours

            for ($i = strtotime(date('Y-m-d', $from)); $i <= strtotime(date('Y-m-d 23:59:59', $to)); $i += HOUR_IN_SECONDS) {
                $viewCount = TrackingLog::query()
                    ->where('vendor_id', Auth::id())
                    ->whereBetween('created_at', [
                        date('Y-m-d H:i:s', $i),
                        date('Y-m-d H:i:s', $i + HOUR_IN_SECONDS - 1),
                    ])
                    ->where('object_model', 'property')
                    ->count();

                $data['labels'][] = date('H:i', $i);
                $data['datasets'][0]['data'][] = $viewCount ?? 0;
            }
        } else {
            // Report By Day
            $period = periodDate(date('Y-m-d', $from),date('Y-m-d 23:59:59', $to));
            foreach ($period as $dt){
                $viewCount = TrackingLog::query()
                    ->where('vendor_id', Auth::id())
                    ->whereBetween('created_at', [
                        $dt->format('Y-m-d 00:00:00'),
                        $dt->format('Y-m-d 23:59:59'),
                    ])
                    ->where('object_model', 'property')
                    ->count();

                $data['labels'][] = display_date($dt->getTimestamp());
                $data['datasets'][0]['data'][] = $viewCount ?? 0;
            }
        }
        return $data;
    }

    public function reloadChart(Request $request)
    {
        $chart = $request->input('chart');
        switch ($chart) {
            case "view":
                $from = $request->input('from');
                $to = $request->input('to');
                return $this->sendSuccess([
                    'data' => $this->getDashboardViewsData(strtotime($from), strtotime($to))
                ]);
                break;
        }
    }

    public function profile_post(Request $request)
    {
        $user = \auth()->user();
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email'      => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id)
            ],
        ]);
        $user->fill($request->input());
        $user->birthday = date("Y-m-d", strtotime($user->birthday));
        $user->user_social = json_encode($user->user_social);
        $user->save();
        return redirect()->back()->with('success', __('Update successfully'));
    }



    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255'
        ]);
        $check = Subscriber::withTrashed()->where('email', $request->input('email'))->first();
        if ($check) {
            if ($check->trashed()) {
                $check->restore();
                return $this->sendSuccess([], __('Thank you for subscribing'));
            }
            return $this->sendError(__('You are already subscribed'));
        } else {
            $a = new Subscriber();
            $a->email = $request->input('email');
            $a->first_name = $request->input('first_name');
            $a->last_name = $request->input('last_name');
            $a->save();
            return $this->sendSuccess([], __('Thank you for subscribing'));
        }
    }

    public function upgradeVendor(Request $request){
        $user = Auth::user();
        $vendorRequest = VendorRequest::query()->where("user_id",$user->id)->where("status","pending")->first();
        if(!empty($vendorRequest)){
            return redirect()->back()->with('warning', __('You have just done the become vendor request, please wait for the Admin\'s approved'));
        }
        // check vendor auto approved
        $vendorAutoApproved = setting_item('vendor_auto_approved');
         $dataVendor['role_request'] = setting_item('vendor_role');
        if ($vendorAutoApproved) {
            if ($dataVendor['role_request']) {
                $user->assignRole($dataVendor['role_request']);
            }
            $dataVendor['status'] = 'approved';
            $dataVendor['approved_time'] = now();
        } else {
            $dataVendor['status'] = 'pending';
        }
        $vendorRequestData = $user->vendorRequest()->save(new VendorRequest($dataVendor));
        try {
            event(new NewVendorRegistered($user, $vendorRequestData));
        } catch (Exception $exception) {
            Log::warning("NewVendorRegistered: " . $exception->getMessage());
        }
        return redirect()->back()->with('success', __('Request vendor success!'));
    }


    public function showContact(Request $request) {

        $rows = BravoContactObject::where('vendor_id', Auth::id());
        if(!empty($request->contact_type=='property_contact')){
            $rows->where('object_model','property');
        }
        if(!empty($request->contact_type=='agent_contact')){
            $rows->where('object_model','agent');
        }
        if(!empty($request->contact_type=='agency_contact')){
            $rows->where('object_model','agencies');
        }
        $rows = $rows->with(['property','agencies'])->paginate(20);

        $data = [
            'rows'        => $rows,
            'breadcrumbs' => [
                [
                    'name'  => __('Contact'),
                    'class' => 'active'
                ],
            ],
        ];


        return view('User::frontend.contact_new', $data);
    }
    public function showContactNew(Request $request) {
        $rows = \Themes\Findhouse\Agencies\Models\BravoContactObject::where('vendor_id', Auth::id());
        if(!empty($request->contact_type=='property_contact')){
            $rows->where('object_model','property');
        }
        if(!empty($request->contact_type=='agent_contact')){
            $rows->where('object_model','agent');
        }
        if(!empty($request->contact_type=='agency_contact')){
            $rows->where('object_model','agencies');
        }
        $rows = $rows->with(['property','agencies'])->paginate(20);

        $data = [
            'rows'        => $rows,
            'breadcrumbs' => [
                [
                    'name'  => __('Contact'),
                    'class' => 'active'
                ],
            ],
        ];


        return view('User::frontend.contact_new', $data);
    }
}
