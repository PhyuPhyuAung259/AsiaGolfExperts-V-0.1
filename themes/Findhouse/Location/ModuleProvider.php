<?php

namespace Themes\Findhouse\Location;

use Modules\ModuleServiceProvider;
use Themes\Findhouse\Location\Blocks\ListLocations;
use Themes\Findhouse\Template\Blocks\FormSearchAllService;

class ModuleProvider extends \Modules\Location\ModuleProvider
{

    public static function getAdminMenu()
    {
        return [
            'location'=>[
                "position"=>30,
                'url'        => route('location.admin.index'),
                'title'      => __("Location"),
                'icon'       => 'icon ion-md-compass',
                'permission' => 'location_view',
            ]
        ];
    }


    public static function getTemplateBlocks()
    {
        return [
            'list_locations'=>ListLocations::class,
        ];
    }
}
