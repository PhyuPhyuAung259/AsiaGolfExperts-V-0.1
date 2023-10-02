<?php

namespace Themes\Findhouse\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeederForReImport extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cache::flush();
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(MediaFileSeeder::class);
        $this->call(General::class);
        $this->call(LocationSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(AgenciesSeeder::class);
    }
}
