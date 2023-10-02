<?php
namespace Themes\Golf\Golf;
use Modules\Core\Helpers\SitemapHelper;
use Modules\ModuleServiceProvider;
use Modules\News\Models\News;
use Modules\User\Helpers\PermissionHelper;
use Themes\Golf\Golf\Models\Golf;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(SitemapHelper $sitemapHelper){

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        if(is_installed() and Golf::isEnable()){

            $sitemapHelper->add("golf",[app()->make(Golf::class),'getForSitemap']);
        }
        PermissionHelper::add([
            // Golf
            'golf_view',
            'golf_create',
            'golf_update',
            'golf_delete',
            'golf_manage_others',
            'golf_manage_attributes',
        ]);
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        if(!Golf::isEnable()) return [];
        return [
            'golf'=>[
                "position"=>50,
                'url'        => route('golf.admin.index'),
                'title'      => __('Golf'),
                'icon'       => 'ion-ios-globe',
                'permission' => 'golf_view',
                'children'   => [
                    'add'=>[
                        'url'        => route('golf.admin.index'),
                        'title'      => __('All Golfs'),
                        'permission' => 'golf_view',
                    ],
                    'create'=>[
                        'url'        => route('golf.admin.create'),
                        'title'      => __('Add new Golf'),
                        'permission' => 'golf_create',
                    ],
                    'attribute'=>[
                        'url'        => route('golf.admin.attribute.index'),
                        'title'      => __('Attributes'),
                        'permission' => 'golf_manage_attributes',
                    ],
                    'availability'=>[
                        'url'        => route('golf.admin.availability.index'),
                        'title'      => __('Availability'),
                        'permission' => 'golf_create',
                    ],
                    'recovery'=>[
                        'url'        => route('golf.admin.recovery'),
                        'title'      => __('Recovery'),
                        'permission' => 'golf_view',
                    ],
                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        if(!Golf::isEnable()) return [];
        return [
            'golf'=>Golf::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Golf::isEnable()) return [];
        return [
            'golf'=>[
                'class' => Golf::class,
                'name'  => __("Golf"),
                'items' => Golf::searchForMenu(),
                'position'=>51
            ]
        ];
    }

    public static function getUserMenu()
    {
        if(!Golf::isEnable()) return [];
        return [
            'golf' => [
                'url'   => route('golf.vendor.index'),
                'title'      => __("Manage Golf"),
                'icon'       => Golf::getServiceIconFeatured(),
                'position'   => 80,
                'permission' => 'golf_view',
                'children' => [
                    [
                        'url'   => route('golf.vendor.index'),
                        'title'  => __("All Golfs"),
                    ],
                    [
                        'url'   => route('golf.vendor.create'),
                        'title'      => __("Add Golf"),
                        'permission' => 'golf_create',
                    ],
                    'availability'=>[
                        'url'        => route('golf.vendor.availability.index'),
                        'title'      => __('Availability'),
                        'permission' => 'golf_create',
                    ],
                    [
                        'url'   => route('golf.vendor.recovery'),
                        'title'      => __("Recovery"),
                        'permission' => 'golf_create',
                    ],
                ]
            ],
        ];
    }

    public static function getTemplateBlocks(){
        if(!Golf::isEnable()) return [];
        return [
            'form_search_golf'=>"\\Modules\\Golf\\Blocks\\FormSearchGolf",
            'list_golf'=>"\\Modules\\Golf\\Blocks\\ListGolf",
        ];
    }
}
