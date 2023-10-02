<?php
namespace Themes\Findhouse\Property;
use Modules\ModuleServiceProvider;
use Themes\Findhouse\Property\Blocks\CallToAction;
use Themes\Findhouse\Property\Blocks\ListProperty;
use Themes\Findhouse\Property\Blocks\ListUser;
use Themes\Findhouse\Property\Blocks\PropertyTermFeaturedBox;
use Themes\Findhouse\Property\Blocks\Testimonial;
use Themes\Findhouse\Property\Models\Property;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(){

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/property.php','property');
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        if(!Property::isEnable()) return [];
        return [
            'property'=>[
                "position"=>41,
                'url'        => 'admin/module/property',
                'title'      => __('Property'),
                'icon'       => 'ion ion-md-home',
                'permission' => 'property_view',
                'children'   => [
                    'add'=>[
                        'url'        => 'admin/module/property',
                        'title'      => __('All Properties'),
                        'permission' => 'property_view',
                    ],
                    'create'=>[
                        'url'        => 'admin/module/property/create',
                        'title'      => __('Add new Property'),
                        'permission' => 'property_create',
                    ],
                    'attribute'=>[
                        'url'        => 'admin/module/property/attribute',
                        'title'      => __('Attributes'),
                        'permission' => 'property_manage_others',
                    ],
                    'property_category'=>[
                        'url'        => 'admin/module/property/category',
                        'title'      => __('Categories'),
                        'permission' => 'property_manage_others',
                    ],

                    'property_contact'=>[
                        'url'        => 'admin/module/property/contact',
                        'title'      => __('Contact property'),
                        'permission' => 'property_manage_others',
                    ],
                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        return [
            'property'=>Property::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Property::isEnable()) return [];
        return [
            'property'=>[
                'class' => Property::class,
                'name'  => __("Properties"),
                'items' => Property::searchForMenu(),
                'position'=>41
            ]
        ];
    }

    public static function getUserMenu()
    {
        $res = [];
        if (Property::isEnable()) {
            $res['property'] = [
                'url'        => route('property.vendor.index'),
                'title'      => __("Manage Property"),
                'icon'       => Property::getServiceIconFeatured(),
                'position'   => 32,
                'permission' => 'property_view',
                'children'   => [
                    [
                        'url'   => route('property.vendor.index'),
                        'title' => __("All Properties"),
                    ],
                    [
                        'url'        => route('property.vendor.create'),
                        'title'      => __("Add Property"),
                        'permission' => 'property_create',
                    ],
                ]
            ];
        }
        return $res;
    }

    public static function getTemplateBlocks(){
        if(!Property::isEnable()) return [];
        return [
            'list_property'=>ListProperty::class,
            'property_term_featured_box'=>PropertyTermFeaturedBox::class,
            'call_to_action'=>CallToAction::class,
            'testimonial'=>Testimonial::class,
            'list_users'=>ListUser::class
        ];
    }

    public static function getReviewableServices()
    {
        return [
            'property' => Property::class,
        ];
    }
}
