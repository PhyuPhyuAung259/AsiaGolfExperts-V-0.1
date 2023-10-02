<?php

namespace Themes\Findhouse\Template;

use Illuminate\Support\ServiceProvider;
use Modules\ModuleServiceProvider;
use Themes\Findhouse\Template\Blocks\BannerProperty;
use Themes\Findhouse\Template\Blocks\FormSearchAllService;
use Themes\Findhouse\Template\Blocks\Gallery;
use Themes\Findhouse\Template\Blocks\ImageTextWithCounting;
use Themes\Findhouse\Template\Blocks\Map;
use Themes\Findhouse\Template\Blocks\OfferBlock;
use Themes\Findhouse\Template\Blocks\PageBanner;

class ModuleProvider extends ModuleServiceProvider
{

    public static function getTemplateBlocks()
    {
        return [
            'form_search_all_service'=>FormSearchAllService::class,
            'banner_property'=>BannerProperty::class,
            'offer_block'=>OfferBlock::class,
            "map"=>Map::class,
            "page_banner"=> PageBanner::class,
            "image_text_with_counting"=> ImageTextWithCounting::class,
            "gallery"=> Gallery::class
        ];
    }
}
