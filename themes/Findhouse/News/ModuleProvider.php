<?php

namespace Themes\Findhouse\News;

use Modules\ModuleServiceProvider;
use Themes\Findhouse\News\Blocks\ListNews;

class ModuleProvider extends \Modules\News\ModuleProvider
{


    public static function getTemplateBlocks()
    {
        return [
            'list_news'=>ListNews::class
        ];
    }
}
