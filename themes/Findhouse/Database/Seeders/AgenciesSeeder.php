<?php

namespace Themes\Findhouse\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Media\Models\MediaFile;
use App\User;

class AgenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $IDs_vendor[] = $create_user = "1";
        $IDs[] = DB::table('bravo_agencies')->insertGetId(
            [
                'name' => 'Country House Real Estate',
                'slug' => 'country-house-real-estate',
                'email' => 'pakulla@findhouse.com',
                'office' => '134 456 3210',
                'mobile' => '891 456 9874',
                'fax' => '342 654 1258',
                'content' => "<p class=\"mt10 mb10\">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>",
                'image_id' => MediaFile::findMediaByName("agencies-1")->id,
                'banner_image_id' => MediaFile::findMediaByName("agencies-1")->id,
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'status' => "publish",
                'social' => '[{"title":"facebook","code":"fa fa-facebook","link":"#"}]'
            ]);
        $IDs_vendor[] = $create_user = "1";
        $IDs[] = DB::table('bravo_agencies')->insertGetId(
            [
                'name' => 'High-Rise Real Estate',
                'slug' => 'hight-rise-real-estate',
                'email' => 'pakulla@findhouse.com',
                'office' => '134 456 3210',
                'mobile' => '891 456 9874',
                'fax' => '342 654 1258',
                'content' => "<p class=\"mt10 mb10\">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>",
                'image_id' => MediaFile::findMediaByName("agencies-2")->id,
                'banner_image_id' => MediaFile::findMediaByName("agencies-2")->id,
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'status' => "publish",
                'social' => '[{"title":"facebook","code":"fa fa-facebook","link":"#"}]'
            ]);
        $IDs_vendor[] = $create_user = "1";
        $IDs[] = DB::table('bravo_agencies')->insertGetId(
            [
                'name' => 'Modern House Real estate',
                'slug' => 'modern-house-real-estate',
                'email' => 'pakulla@findhouse.com',
                'office' => '134 456 3210',
                'mobile' => '891 456 9874',
                'fax' => '342 654 1258',
                'content' => "<p class=\"mt10 mb10\">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>",
                'image_id' => MediaFile::findMediaByName("agencies-3")->id,
                'banner_image_id' => MediaFile::findMediaByName("agencies-3")->id,
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'status' => "publish",
                'social' => '[{"title":"facebook","code":"fa fa-facebook","link":"#"}]'
            ]);
        $IDs_vendor[] = $create_user = "1";
        $IDs[] = DB::table('bravo_agencies')->insertGetId(
            [
                'name' => 'Real estate experts',
                'slug' => 'real-estate-experts',
                'email' => 'pakulla@findhouse.com',
                'office' => '134 456 3210',
                'mobile' => '891 456 9874',
                'fax' => '342 654 1258',
                'content' => "<p class=\"mt10 mb10\">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>",
                'image_id' => MediaFile::findMediaByName("agencies-4")->id,
                'banner_image_id' => MediaFile::findMediaByName("agencies-4")->id,
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'status' => "publish",
                'social' => '[{"title":"facebook","code":"fa fa-facebook","link":"#"}]'
            ]);

        $listUser = User::all();
        $listAgenciesAgent = [];
        foreach ($IDs as $agenciesId) {
            foreach ($listUser as $user) {
                $listAgenciesAgent[$agenciesId] = [
                    'agencies_id' => $agenciesId,
                    'agent_id' => $user['id']
                ];
            }
            continue;
        }
        \Themes\Findhouse\Agencies\Models\AgenciesAgent::insert($listAgenciesAgent);

        //Setting
        DB::table('core_settings')->insert(
            [
                [
                    'name' => 'agencies_page_list_title',
                    'val' => 'Agencies',
                    'group' => "agencies",
                ],
                [
                    'name' => 'agencies_enable_review',
                    'val' => '1',
                    'group' => "agencies",
                ],
                [
                    'name' => 'agencies_review_approved',
                    'val' => '0',
                    'group' => "agencies",
                ],
            ]
        );
    }
}
