<?php

namespace Themes\Findhouse\Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class MediaFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //general
        DB::table('media_files')->insert([
            ['file_name' => 'avatar', 'file_path' => 'findhouse/general/avatar.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'avatar-2', 'file_path' => 'findhouse/general/avatar-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'avatar-3', 'file_path' => 'findhouse/general/avatar-3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'avatar-4', 'file_path' => 'findhouse/general/avatar-4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'avatar-5', 'file_path' => 'findhouse/general/avatar-5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'contact_banner', 'file_path' => 'findhouse/general/contactbg.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'ico_adventurous', 'file_path' => 'findhouse/general/ico_adventurous.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'ico_localguide', 'file_path' => 'findhouse/general/ico_localguide.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'ico_maps', 'file_path' => 'findhouse/general/ico_maps.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'ico_paymethod', 'file_path' => 'findhouse/general/ico_paymethod.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'logo', 'file_path' => 'findhouse/general/header-logo2.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'logo_trans', 'file_path' => 'findhouse/general/header-logo.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'bg_contact', 'file_path' => 'findhouse/general/bg-contact.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'favicon', 'file_path' => 'findhouse/general/favicon.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'thumb-vendor-register', 'file_path' => 'findhouse/general/thumb-vendor-register.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'bg-video-vendor-register1', 'file_path' => 'findhouse/general/bg-video-vendor-register1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'ico_chat_1', 'file_path' => 'findhouse/general/ico_chat_1.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'ico_friendship_1', 'file_path' => 'findhouse/general/ico_friendship_1.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'ico_piggy-bank_1', 'file_path' => 'findhouse/general/ico_piggy-bank_1.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'home-mix', 'file_path' => 'findhouse/general/home-mix.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_1', 'file_path' => 'findhouse/general/image_home_mix_1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_2', 'file_path' => 'findhouse/general/image_home_mix_2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_3', 'file_path' => 'findhouse/general/image_home_mix_3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_3_search_now', 'file_path' => 'findhouse/general/image_home_mix_3_search_now.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_5', 'file_path' => 'findhouse/general/bg-5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_8_slider_1', 'file_path' => 'findhouse/general/4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_8_slider_2', 'file_path' => 'findhouse/general/5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_8_slider_3', 'file_path' => 'findhouse/general/6.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_10_slider_1', 'file_path' => 'findhouse/home/7.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_10_slider_2', 'file_path' => 'findhouse/home/8.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_10_slider_3', 'file_path' => 'findhouse/home/1.jpg', 'file_type' => 'image/jpeg', 'file_extension'
            => 'jpg'],
            ['file_name' => 'service', 'file_path' => 'findhouse/service/1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'service-2', 'file_path' => 'findhouse/service/2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'service-3', 'file_path' => 'findhouse/service/3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'service-4', 'file_path' => 'findhouse/service/4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'service-5', 'file_path' => 'findhouse/service/5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'testimonial', 'file_path' => 'findhouse/testimonial/1.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'testimonial-2', 'file_path' => 'findhouse/testimonial/2.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'testimonial-3', 'file_path' => 'findhouse/testimonial/3.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'testimonial-4', 'file_path' => 'findhouse/testimonial/4.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'testimonial-5', 'file_path' => 'findhouse/testimonial/5.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'testimonial-bg', 'file_path' => 'findhouse/background/6.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'testimonial-bg-1', 'file_path' => 'findhouse/background/2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],

            ['file_name' => 'image_home_mix_8_slider_1', 'file_path' => 'findhouse/home/4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_8_slider_2', 'file_path' => 'findhouse/home/5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_8_slider_3', 'file_path' => 'findhouse/home/6.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_6_bg', 'file_path' => 'findhouse/background/7.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_6_8_bg', 'file_path' => 'findhouse/background/8.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_6_9_bg', 'file_path' => 'findhouse/background/9.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],


        ]);

        //Property
        DB::table('media_files')->insert([
            ['file_name' => 'banner-search-property', 'file_path' => 'findhouse/general/home-mix.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'banner-search-property-2', 'file_path' => 'findhouse/general/home-mix.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
        ]);
        for ($i = 1; $i <= 13; $i++) {
            DB::table('media_files')->insert([
                ['file_name' => 'property-' . $i, 'file_path' => 'findhouse/property/property-' . $i . '.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ]);
        }
        for ($i = 1; $i <= 5; $i++) {
            DB::table('media_files')->insert([
                ['file_name' => 'property-gallery-' . $i, 'file_path' => 'findhouse/property/gallery/property-gallery-' . $i . '.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ]);
        }


        for ($i = 1; $i <= 3; $i++) {
            DB::table('media_files')->insert([
                ['file_name' => 'property-single-' . $i, 'file_path' => 'findhouse/property/property-' . $i . '.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ]);
        }
        for ($i = 1; $i <= 6; $i++) {
            DB::table('media_files')->insert([
                ['file_name' => 'icon-property-box-' . $i, 'file_path' => 'findhouse/property/property-' . $i . '.jpg', 'file_type' => 'image/png', 'file_extension' => 'jpg'],
            ]);
        }

        //agencies
        for ($i = 1; $i <= 6; $i++) {
            DB::table('media_files')->insert([
                ['file_name' => 'agencies-' . $i, 'file_path' => 'findhouse/agencies/agencies-' . $i . '.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ]);
        }

        //team
        for ($i = 1; $i <= 4; $i++) {
            DB::table('media_files')->insert([
                ['file_name' => 'team-' . $i, 'file_path' => 'findhouse/team/' . $i . '.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ]);
        }
        //Partners
        for ($i = 1; $i <= 5; $i++) {
            DB::table('media_files')->insert([
                ['file_name' => 'partners-' . $i, 'file_path' => 'findhouse/partners/' . $i . '.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ]);
        }
        //about us
        DB::table('media_files')->insert([
            ['file_name' => 'about-banner', 'file_path' => 'findhouse/about/inner-pagebg.jpg', 'file_type' => 'image/jpg', 'file_extension' => 'jpg'],
            ['file_name' => 'about-image-video', 'file_path' => 'findhouse/about/1.jpg', 'file_type' => 'image/jpg', 'file_extension' => 'jpg'],
        ]);

        //Location
        DB::table('media_files')->insert([
            ['file_name' => 'location-1', 'file_path' => 'findhouse/location/location-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-2', 'file_path' => 'findhouse/location/location-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-3', 'file_path' => 'findhouse/location/location-3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-4', 'file_path' => 'findhouse/location/location-4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-5', 'file_path' => 'findhouse/location/location-5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'banner-location-1', 'file_path' => 'findhouse/location/banner-detail/banner-location-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'trip-idea-1', 'file_path' => 'findhouse/location/trip-idea/trip-idea-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'trip-idea-2', 'file_path' => 'findhouse/location/trip-idea/trip-idea-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],

        ]);

        //News
        DB::table('media_files')->insert([
            ['file_name' => 'news-1', 'file_path' => 'findhouse/news/news-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-2', 'file_path' => 'findhouse/news/news-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-3', 'file_path' => 'findhouse/news/news-3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-4', 'file_path' => 'findhouse/news/news-4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-5', 'file_path' => 'findhouse/news/news-5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-6', 'file_path' => 'findhouse/news/news-6.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-7', 'file_path' => 'findhouse/news/news-7.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-banner', 'file_path' => 'findhouse/news/news-banner.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
        ]);

//       version 140
        DB::table('media_files')->insert([
            ['file_name' => 'error_404_banner', 'file_path' => 'findhouse/general/404.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
        ]);

    }
}
