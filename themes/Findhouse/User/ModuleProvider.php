<?php
namespace Themes\Findhouse\User;

use Modules\User\Controllers\PlanController;
use Themes\Findhouse\User\Blocks\ListUser;

class ModuleProvider extends \Modules\User\ModuleProvider
{

    public function boot(){

        parent::boot();
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
        $this->app->bind(PlanController::class, \Themes\Findhouse\User\Controllers\PlanController::class);
    }

    public static function getUserMenu()
    {
        $res = parent::getUserMenu();
        $res ['contact']        = [
                'url'        => route('user.showContact'),
                'title'      => __("Manage Contacts"),
                'icon'       => 'fa fa-envelope-open-o',
                'permission' => 'dashboard_agent_access',
                'position'   => 70
            ];
        return $res;
    }

    public static function getTemplateBlocks(){

        return [
            'list_users'=>ListUser::class
        ];
    }
}
