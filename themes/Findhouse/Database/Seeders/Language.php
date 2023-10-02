<?php

namespace Themes\Findhouse\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Language extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'name' => 'site_locale',
                'val' => 'en',
                'group' => "general",
            ],
            [
                'name' => 'site_enable_multi_lang',
                'val' => 1,
                'group' => "general",
            ],
            [
                'name' => 'enable_rtl_egy',
                'val' => 1,
                'group' => "general",
            ],
        ];

        foreach ($settings as $setting) {
            setting_update_item($setting['name'], $setting['val']);
        }
        \Modules\Language\Models\Language::query()->delete();
        $langs = [
            [
                'locale' => 'en',
                'name' => 'English',
                'flag' => "gb",
                'status' => "publish",

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'locale' => 'ja',
                'name' => 'Japanese',
                'flag' => "jp",
                'status' => "publish",

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'locale' => 'egy',
                'name' => 'Egyptian',
                'flag' => "eg",
                'status' => "publish",

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        foreach ($langs as $lang){
            \Modules\Language\Models\Language::create($lang);
        }
    }
}
