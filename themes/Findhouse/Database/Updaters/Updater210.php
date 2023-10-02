<?php

namespace Themes\Findhouse\Database\Updaters;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class Updater210
{
    public static function run(){
        $version = 'update_to_2_0_1';
        if (setting_item($version)) {
            return false;
        }
        Artisan::call('migrate', [
            '--force' => true,
        ]);

        Schema::table('core_pages', function (Blueprint $table) {
            if (!Schema::hasColumn('core_pages', 'custom_logo')) {
                $table->integer('custom_logo')->nullable();
            }
        });

        setting_update_item($version,true);
    }

}
