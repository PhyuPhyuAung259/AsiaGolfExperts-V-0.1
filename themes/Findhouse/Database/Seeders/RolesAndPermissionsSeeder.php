<?php

namespace Themes\Findhouse\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Helpers\PermissionHelper;
use Modules\User\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::firstOrCreate(['name'=>'administrator','code'=>'administrator']);
        $role->givePermission(PermissionHelper::all());

        // this can be done as separate statements
        $this->initAgent();

        // this can be done as separate statements
        $customer = Role::firstOrCreate(['name'=>'customer','code'=>'customer']);

    }

    public function initAgent()
    {

        $agent = Role::firstOrCreate(['name'=>'agent','code'=>'agent']);

        $agent->givePermission('property_view');
        $agent->givePermission('property_create');
        $agent->givePermission('property_update');
        $agent->givePermission('property_delete');
        $agent->givePermission('dashboard_agent_access');
    }
}
