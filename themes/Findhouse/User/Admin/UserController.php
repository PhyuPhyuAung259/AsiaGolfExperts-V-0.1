<?php
namespace Themes\Findhouse\User\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Modules\User\Models\Role;
use Themes\Findhouse\Agencies\Models\AgenciesAgent;

class UserController extends \Modules\User\Admin\UserController
{

    public function store(Request $request, $id)
    {
        if(is_demo_mode()){
            return back()->with('danger',  __('DEMO Mode: You can not do this') );
        }
        if($id and $id>0){
            $this->checkPermission('user_update');
            $row = User::find($id);
            if(empty($row)){
                abort(404);
            }
            if ($row->id != Auth::user()->id and !Auth::user()->hasPermission('user_update')) {
                abort(403);
            }

            $request->validate([
                'first_name'              => 'required|max:255',
                'last_name'              => 'required|max:255',
                'status'              => 'required|max:50',
                'phone'              => 'required',
                'country'              => 'required',
                'role_id'              => 'required|max:11',
                'email'              =>[
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($row->id)
                ],
            ]);

        }else{
            $this->checkPermission('user_create');
            $check = Validator::make($request->input(),[
                'first_name'              => 'required|max:255',
                'last_name'              => 'required|max:255',
                'status'              => 'required|max:50',
                'phone'              => 'required',
                'country'              => 'required',
                'role_id'              => 'required|max:11',
                'email'              =>[
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users')
                ],
            ]);

            if(!$check->validated()){
                return back()->withInput($request->input());
            }

            $row = new User();
            $row->email = $request->input('email');
        }

        $row->name = $request->input('name');
        $row->first_name = $request->input('first_name');
        $row->last_name = $request->input('last_name');
        $row->phone = $request->input('phone');
        $row->birthday = $request->input('birthday');
        $row->address = $request->input('address');
        $row->address2 = $request->input('address2');
        $row->bio = clean($request->input('bio'));
        $row->status = $request->input('status');
        $row->avatar_id = $request->input('avatar_id');
        $row->email = $request->input('email');
        $row->country = $request->input('country');
        $row->city = $request->input('city');
        $row->state = $request->input('state');
        $row->zip_code = $request->input('zip_code');
        $row->business_name = $request->input('business_name');
        $row->vendor_commission_type = $request->input('vendor_commission_type');
        $row->vendor_commission_amount = $request->input('vendor_commission_amount');
        $row->role_id = $request->input('role_id');

        //Block all service when user is block
        if($row->status == "blocked"){
            $services = get_bookable_services();
            if(!empty($services)){
                foreach ($services as $service){
                    $service::query()->where("author_id",$row->id)->update(['status' => "draft"]);
                }
            }
        }

        if ($row->save()) {
            return back()->with('success', ($id and $id>0) ? __('User updated'):__("User created"));
        }
    }

    public function getNotInAgency(){
        $listAgentHasAgencies = new AgenciesAgent();
        $tb = $listAgentHasAgencies->getTable();
        $agencies_id = \request('agencies_id');

        $users = \Themes\Findhouse\User\Models\User::select(['users.*'])
            ->leftJoin($tb,$listAgentHasAgencies->qualifyColumn('agent_id'),'=','users.id')
            ->where(function($query) use ($listAgentHasAgencies, $agencies_id){
                $query->whereNull($listAgentHasAgencies->qualifyColumn('agencies_id'));
                if($agencies_id){
                    $query->orWhere($listAgentHasAgencies->qualifyColumn('agencies_id'),$agencies_id);
                }
            })
            ->whereNotIn('id', $listAgentHasAgencies)
            ->orderBy('id', 'desc')->orderBy('first_name', 'asc')->limit(20)->get();
        $data = [];
        foreach ($users as $item) {
            $data[] = [
                'id'   => $item->id,
                'text' => $item->getDisplayName() . ' (#' . $item->id . ')',
            ];
        }
        return ['results'=>$data];
    }

}
