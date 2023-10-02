<?php

namespace Themes\Findhouse\Database\Updaters;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Boat\Models\Boat;
use Modules\Booking\Models\Service;
use Modules\Event\Models\Event;
use Modules\Flight\Models\Flight;
use Modules\Hotel\Models\Hotel;
use Modules\Space\Models\Space;
use Modules\Tour\Models\Tour;
use Modules\User\Helpers\PermissionHelper;
use Modules\User\Models\Plan;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Themes\Findhouse\Property\Models\Property;

class Updater200
{
    public static function run(){
        $version = '1.8';
        if (version_compare(setting_item('findhouse_to_200'), $version, '>=')) return;

        Artisan::call('migrate', [
            '--force' => true,
        ]);

        $admin = Role::query()->where('name','administrator')->first();
        if($admin){
            $admin->givePermission(PermissionHelper::all());
        }

        static::initAgent();

        // Update User Roles
        if(Schema::hasTable('core_model_has_roles'))
        {
            $data = DB::table('core_model_has_roles')->get();
            foreach ($data as $item){
                if($item){
                    User::query()->where('id',$item->model_id)->whereNull('role_id')->update(['role_id'=>$item->role_id]);
                }
            }
        }

        // Update bc_services
        foreach ([Property::class] as $class){

            $tbName = (new $class)->getTable();
            $type = (new $class)->type;

            Service::query()->join($tbName,function($join) use ($tbName,$type){
                $join->on($tbName.'.id','=','bravo_services.object_id');
                $join->where('bravo_services.object_model','=',$type);
            })->update([
                'bravo_services.author_id'=>DB::raw($tbName.'.author_id')
            ]);
        }


        $tableAddAuthorId = [
            'bravo_properties',
            'bravo_agencies',
            'core_news'
        ];
        foreach ($tableAddAuthorId as $tbName){
            \Illuminate\Support\Facades\DB::update("update {$tbName} set author_id = create_user where author_id is null");
        }
        setting_update_item('user_plans_enable',1);

        static::updatePlan();

        setting_update_item('findhouse_to_200',$version);
    }

    static function initAgent()
    {

        $agent = Role::query()->where(['name'=>'agent'])->first();
        if(!$agent) return;

        $agent->givePermission('property_view');
        $agent->givePermission('property_create');
        $agent->givePermission('property_update');
        $agent->givePermission('property_delete');
        $agent->givePermission('dashboard_agent_access');
    }

    static function updatePlan(){
        if(Plan::get()->count()<=0){
            $plans = [
                'Basic',
                'Standard',
                'Extended',
            ];
            $prices = [199,499,799];
            $count = [5,20,50];
            $agent = Role::findByName('agent');

            foreach ($plans as $k=>$plan){
                $a = new Plan();
                $data = [
                    'title'=>$plan,
                    'content'=>"<ul><li>5 service posting</li><li>2 featured service</li><li>Service displayed for 20 days</li><li>Premium Support 24/7</li></ul>",
                    'price'=>$prices[$k],
                    'duration'=>1,
                    'duration_type'=>'month',
                    'annual_price'=>$prices[$k] + 1000,
                    'is_recommended'=>$k == 1 ? 1 : 0,
                    'max_service'=>$count[$k],
                    'role_id'=>$agent->id,
                    'status'=>'publish'
                ];
                $a->fillByAttr(array_keys($data),$data);
                $a->save();
            }
        }
        if(empty(setting_item('user_plans_page_title'))){
            setting_update_item('user_plans_page_title','Pricing Packages');
        }
        if(empty(setting_item('user_plans_page_sub_title'))){
            setting_update_item('user_plans_page_sub_title','Choose your pricing plan');
        }
        if(empty(setting_item('user_plans_sale_text'))){
            setting_update_item('user_plans_sale_text','Save up to 10%');
        }
    }
}
