<?php
namespace Themes\Findhouse\Dashboard\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Booking\Models\Booking;
use Modules\Booking\Models\Payment;
use Themes\Findhouse\Property\Models\Property;
use Modules\Review\Models\Review;
use Modules\User\Models\UserWishList;

class DashboardController extends AdminController
{
    public function index()
    {
        $f = strtotime('monday this week');
        $data = [
            'top_cards'          => $this->getTopCardsReport(),
            'notifications'    => getNotify(),
            'earning_chart_data' => $this->getDashboardChartData($f, time())
        ];
        return view('Dashboard::index', $data);
    }

    public static function getTopCardsReport()
    {
        $total_properties = Property::count();
        $total_views     = Property::sum('view');
        $total_favorites     = UserWishList::count();
        $total_reviews   = Review::join("bravo_properties","bravo_properties.id","bravo_review.object_id")->where("bravo_review.object_model","'property'")->count();
        $res = [];
        $total_service = 0;
        $services = get_bookable_services();
        if(!empty($services))
        {
            foreach ($services as $service){
                $total_service += $service::where('status', 'publish')->count('id');
            }
        }
        $res[] = [
            'size'   => 6,
            'size_md'=>3,
            'title'  => __("Properties"),
            'amount' => $total_properties,
            'desc'   => __("All Properties"),
            'class'  => 'purple',
            'icon'   => 'icon ion-ios-cart'
        ];
        $res[] = [
            'size'   => 6,
            'size_md'=>3,
            'title'  => __("Views"),
            'amount' => $total_views,
            'desc'   => __("Total Views"),
            'class'  => 'pink',
            'icon'   => 'icon ion-ios-eye'
        ];
        $res[] = [

            'size'   => 6,
            'size_md'=>3,
            'title'  => __("Reviews"),
            'amount' => $total_reviews,
            'desc'   => __("Total Visitor Reviews"),
            'class'  => 'info',
            'icon'   => 'icon ion-ios-document'
        ];
        $res[] = [

            'size'   => 6,
            'size_md'=>3,
            'title'  => __("Favorites"),
            'amount' => $total_favorites,
            'desc'   => __("Total Favorites"),
            'class'  => 'success',
            'icon'   => 'icon ion-ios-heart'
        ];
        return $res;
    }

    public function reloadChart(Request $request)
    {
        $chart = $request->input('chart');
        switch ($chart) {
            case "earning":
                $from = $request->input('from');
                $to = $request->input('to');
                return $this->sendSuccess([
                    'data' => $this->getDashboardChartData(strtotime($from), strtotime($to))
                ]);
                break;
        }
    }

    public function getDashboardChartData($from, $to)
    {
        $data = [
            'labels'   => [],
            'datasets' => [
                [
                    'label'           => __("Total Earning"),
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
                $dataBooking = Payment::selectRaw(implode(",", $sql_raw))->whereBetween('created_at', [
                    $year . '-' . $month . '-01 00:00:00',
                    $year . '-' . $month . '-' . $day_last_month . ' 23:59:59'
                ])->where('object_model', 'plan')->where('status', 'completed');

                $dataBooking = $dataBooking->first();
                $data['labels'][] = date("F", strtotime($year . "-" . $month . "-01"));
                $data['datasets'][0]['data'][] = $dataBooking->total_price ?? 0;
            }
        } elseif (($to - $from) <= DAY_IN_SECONDS) {
            // Report By Hours

            for ($i = strtotime(date('Y-m-d', $from)); $i <= strtotime(date('Y-m-d 23:59:59', $to)); $i += HOUR_IN_SECONDS) {
                $dataBooking = Payment::selectRaw(implode(",", $sql_raw))->whereBetween('created_at', [
                    date('Y-m-d H:i:s', $i),
                    date('Y-m-d H:i:s', $i + HOUR_IN_SECONDS - 1),
                ])->where('object_model', 'plan')->where('status', 'completed');

                $dataBooking = $dataBooking->first();
                $data['labels'][] = date('H:i', $i);
                $data['datasets'][0]['data'][] = $dataBooking->total_price ?? 0;
            }
        } else {
            // Report By Day
            $period = periodDate(date('Y-m-d', $from),date('Y-m-d 23:59:59', $to));
            foreach ($period as $dt){
                $dataBooking = Payment::selectRaw(implode(",", $sql_raw))->whereBetween('created_at', [
                    $dt->format('Y-m-d 00:00:00'),
                    $dt->format('Y-m-d 23:59:59'),
                ])->where('object_model', 'plan')->where('status', 'completed');

                $dataBooking = $dataBooking->first();
                $data['labels'][] = display_date($dt->getTimestamp());
                $data['datasets'][0]['data'][] = $dataBooking->total_price ?? 0;
            }
        }
        return $data;
    }
}
