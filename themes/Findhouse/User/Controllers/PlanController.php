<?php


namespace Themes\Findhouse\User\Controllers;


use Modules\User\Models\Plan;
use Modules\User\Models\Role;

class PlanController extends \Modules\User\Controllers\PlanController
{
    public function index()
    {
        if (!is_enable_plan()) {
            return redirect('/');
        }
        if(auth()->check()){
            $role = auth()->user()->role;
        }else{
            $role = Role::find('agent');
        }
        $data = [
            'page_title'=>__('Pricing Packages'),
            'plans'=>$role->plans,
            'user'=>auth()->user(),
        ];
        return view("User::frontend.plan.index",$data);

    }
}
