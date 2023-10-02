<?php

namespace Themes\Findhouse\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Media\Models\MediaFile;

class General extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Setting header,footer
        $menu_items_en = array(
            array(
                'name' => 'Home',
                'url' => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children' => array(
                    array(
                        'name' => 'Home 1',
                        'url' => '/',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Home 3',
                        'url' => '/page/home-page-3',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Home 5',
                        'url' => '/page/home-page-5',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Home 6',
                        'url' => '/page/home-page-6',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Home 8',
                        'url' => '/page/home-page-8',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Home 10',
                        'url' => '/page/home-page-10',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                ),
            ),
            array(
                'name' => 'Property',
                'url' => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children' => array(
                    array(
                        'name' => 'Property List',
                        'url' => '/property',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(
                            array(
                                'name' => 'Property List V1',
                                'url' => '/property?layout=1',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                            array(
                                'name' => 'Property List V2',
                                'url' => '/property?layout=2',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                        ),
                    ),
                    array(
                        'name' => 'Map Search',
                        'url' => '/property?_layout=map',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(
                            array(
                                'name' => 'Map V1',
                                'url' => '/property?_layout=map',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                            ),
                            array(
                                'name' => 'Map V2',
                                'url' => '/property?_layout=map&layout_map=map_right&layout_map_size=6',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                            ),
                            array(
                                'name' => 'Map V3',
                                'url' => '/property?_layout=map&layout_map_size=6&type=list',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                            ),
                        ),
                    ),
                    array(
                        'name' => 'Property Detail',
                        'url' => '/property/renovated-apartment-1',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(
                            array(
                                'name' => 'Property Detail V1',
                                'url' => '/property/renovated-apartment-1?layout=1',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                            array(
                                'name' => 'Property Detail V2',
                                'url' => '/property/renovated-apartment-1?layout=2',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                            array(
                                'name' => 'Property Detail V3',
                                'url' => '/property/renovated-apartment-1?layout=3',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                            array(
                                'name' => 'Property Detail V4',
                                'url' => '/property/renovated-apartment-1?layout=4',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                        ),
                    ),
                ),
            ),
            array(
                'name' => 'Agencies',
                'url' => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children' => array(
                    [

                        'name' => 'Agencies',
                        'url' => '/agency',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                    ],
                    array(
                        'name' => 'Agency Detail',
                        'url' => '/agency/real-estate-experts',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    [
                        'name' => 'Agent List',
                        'url' => '/agent',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                    ],
                    array(
                        'name' => 'Agent Detail',
                        'url' => '/agent/1',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                ),
            ),
            array(
                'name' => 'Page',
                'url' => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children' => array(
                    [
                        'name' => 'News',
                        'url' => '/news',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                    ],
                    array(
                        'name' => 'News Detail',
                        'url' => '/news/city-spotlight-philadelphia',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                    ),
                    array(
                        'name' => 'Contact',
                        'url' => '/contact',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'About',
                        'url' => '/page/about-us',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Gallery',
                        'url' => '/page/gallery',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Plan',
                        'url' => '/plan',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Become a agent',
                        'url' => '/page/become-a-agent',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                ),
            ),
        );
        $menu_items_egy = array(
            array(
                'name' => 'Home',
                'url' => '/egy',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children' => array(
                    array(
                        'name' => 'Home 1',
                        'url' => '/egy',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Home 3',
                        'url' => '/egy/page/home-page-3',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Home 5',
                        'url' => '/egy/page/home-page-5',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Home 6',
                        'url' => '/egy/page/home-page-6',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Home 8',
                        'url' => '/egy/page/home-page-8',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Home 10',
                        'url' => '/egy/page/home-page-10',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                ),
            ),
            array(
                'name' => 'Property',
                'url' => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children' => array(
                    array(
                        'name' => 'Property List',
                        'url' => '/egy/property',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(
                            array(
                                'name' => 'Property List V1',
                                'url' => '/egy/property?layout=1',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                            array(
                                'name' => 'Property List V2',
                                'url' => '/egy/property?layout=2',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                        ),
                    ),
                    array(
                        'name' => 'Property Detail',
                        'url' => '/egy/property/renovated-apartment-1',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(
                            array(
                                'name' => 'Property Detail V1',
                                'url' => '/egy/property/renovated-apartment-1?layout=1',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                            array(
                                'name' => 'Property Detail V2',
                                'url' => '/egy/property/renovated-apartment-1?layout=2',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                            array(
                                'name' => 'Property Detail V3',
                                'url' => '/egy/property/renovated-apartment-1?layout=3',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                            array(
                                'name' => 'Property Detail V4',
                                'url' => '/egy/property/renovated-apartment-1?layout=4',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children' => array(),
                            ),
                        ),
                    ),
                ),
            ),
            array(
                'name' => 'Agencies',
                'url' => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children' => array(
                    [

                        'name' => 'Agencies',
                        'url' => '/egy/agency',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                    ],
                    array(
                        'name' => 'Agency Detail',
                        'url' => '/egy/agency/real-estate-experts',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    [
                        'name' => 'Agent List',
                        'url' => '/egy/agent',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                    ],
                    array(
                        'name' => 'Agent Detail',
                        'url' => '/egy/agent/1',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                ),
            ),
            array(
                'name' => 'Page',
                'url' => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children' => array(
                    [
                        'name' => 'News',
                        'url' => '/egy/news',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                    ],
                    array(
                        'name' => 'News Detail',
                        'url' => '/egy/news/city-spotlight-philadelphia',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                    ),
                    array(
                        'name' => 'Contact',
                        'url' => '/egy/contact',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'About',
                        'url' => '/egy/page/about-us',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Gallery',
                        'url' => '/egy/page/gallery',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Plan',
                        'url' => '/egy/plan',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                    array(
                        'name' => 'Become a agent',
                        'url' => '/egy/page/become-a-agent',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children' => array(),
                    ),
                ),
            ),
        );
        $main_menu_id = DB::table('core_menus')->insertGetId([
            'name' => 'Main Menu',
            'items' => json_encode($menu_items_en),
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_menu_translations')->insert([
            'items' => json_encode($menu_items_egy),
            'origin_id' => $main_menu_id,
            'locale' => 'egy',
            'created_at' => date("Y-m-d H:i:s")
        ]);


        DB::table('core_menus')->insert([
            'name' => 'Main Menu',
            'items' => json_encode($menu_items_en),
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('core_settings')->insert(
            [
                [
                    'name' => 'menu_locations',
                    'val' => '{"primary":1,"footer":2}',
                    'group' => "general",
                ],
                [
                    'name' => 'admin_email',
                    'val' => 'contact@findhousedev.com',
                    'group' => "general",
                ], [
                'name' => 'email_from_name',
                'val' => 'FindHouse',
                'group' => "general",
            ], [
                'name' => 'email_from_address',
                'val' => 'contact@findhousedev.com',
                'group' => "general",
            ],
                [
                    'name' => 'logo_id',
                    'val' => MediaFile::findMediaByName("logo")->id,
                    'group' => "general",
                ],
                [
                    'name' => 'logo_id_mb',
                    'val' => MediaFile::findMediaByName("logo")->id,
                    'group' => "general",
                ],
                [
                    'name' => 'logo_id_tran',
                    'val' => MediaFile::findMediaByName("logo_trans")->id,
                    'group' => "general",
                ],
                [
                    'name' => 'site_favicon',
                    'val' => MediaFile::findMediaByName("favicon")->id,
                    'group' => "general",
                ],
                [
                    'name' => 'topbar_left_text',
                    'val' => '<div class="socials">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            </div>
            <span class="line"></span>
            <a href="mailto:contact@findhousedev.com">contact@findhousedev.com</a>',
                    'group' => "general",
                ],
                [
                    'name' => 'footer_text_left',
                    'val' => '© Findhouse. Made with love',
                    'group' => "general",
                ],
                [
                    'name' => 'footer_text_right',
                    'val' => '',
                    'group' => "general",
                ],
                [
                    'name' => 'list_widget_footer',
                    'val' => '{"1":{"title" : "About Site", "size" : "3", "content" : "<p>\r\n We’re reimagining how you buy, sell and rent. It’s now easier to get into a place you love. So let’s do this, together.\r\n </p>"},"2":{"title":"COMPANY","size":"3","content":"<ul>\r\n    <li><a href=\"#\">About Us<\/a><\/li>\r\n    <li><a href=\"#\">Community Blog<\/a><\/li>\r\n    <li><a href=\"#\">Rewards<\/a><\/li>\r\n    <li><a href=\"#\">Work with Us<\/a><\/li>\r\n    <li><a href=\"#\">Meet the Team<\/a><\/li>\r\n<\/ul>"},
                    "3":{"title":"SUPPORT","size":"3","content":"<ul>\r\n    <li><a href=\"#\">Account<\/a><\/li>\r\n    <li><a href=\"#\">Legal<\/a><\/li>\r\n    <li><a href=\"#\">Contact<\/a><\/li>\r\n    <li><a href=\"#\">Affiliate Program<\/a><\/li>\r\n    <li><a href=\"#\">Privacy Policy<\/a><\/li>\r\n<\/ul>"},
                    "4":{"title":"Follow us","size":"3","content":"<ul class=\"mb30\">\r\n\t\t\t\t\t\t\t<li class=\"list-inline-item footer-social-icon\"><a href=\"#\"><i class=\"fa fa-facebook\"><\/i><\/a><\/li>\r\n\t\t\t\t\t\t\t<li class=\"list-inline-item footer-social-icon\"><a href=\"#\"><i class=\"fa fa-twitter\"><\/i><\/a><\/li>\r\n\t\t\t\t\t\t\t<li class=\"list-inline-item footer-social-icon\"><a href=\"#\"><i class=\"fa fa-instagram\"><\/i><\/a><\/li>\r\n\t\t\t\t\t\t\t<li class=\"list-inline-item footer-social-icon\"><a href=\"#\"><i class=\"fa fa-pinterest\"><\/i><\/a><\/li>\r\n\t\t\t\t\t\t\t<li class=\"list-inline-item footer-social-icon\"><a href=\"#\"><i class=\"fa fa-dribbble\"><\/i><\/a><\/li>\r\n\t\t\t\t\t\t\t<li class=\"list-inline-item footer-social-icon\"><a href=\"#\"><i class=\"fa fa-google\"><\/i><\/a><\/li>\r\n\t\t\t\t\t\t<\/ul>\r\n<h4>Subscribe<\/h4>\r\n<form class=\"footer_mailchimp_form\">\r\n\t\t\t\t\t\t \t<div class=\"form-row align-items-center\">\r\n\t\t\t\t\t\t\t    <div class=\"col-auto\">\r\n\t\t\t\t\t\t\t    \t<input type=\"email\" name=\"email\" class=\"form-control mb-2\" id=\"inlineFormInput\" placeholder=\"Your email\">\r\n\t\t\t\t\t\t\t    <\/div>\r\n\t\t\t\t\t\t\t    <div class=\"col-auto\">\r\n\t\t\t\t\t\t\t    \t<button type=\"submit\" class=\"btn btn-primary mb-2\"><i class=\"fa fa-angle-right\"><\/i><\/button>\r\n\t\t\t\t\t\t\t    <\/div>\r\n\t\t\t\t\t\t  \t<\/div>\r\n\t\t\t\t\t\t <div class=\"form-mess\"><\/div> <\/form>"}}',
                    'group' => "general",
                ],
                [
                    'name' => 'contact_banner',
                    'val' => MediaFile::findMediaByName("contact_banner")->id,
                    'group' => "general",
                ],
                [
                    'name' => 'list_info_contact',
                    'val' => '[{"title" : "Contact Us","content" : "<p>\r\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida quis libero eleifend ornare. habitasse platea dictumst. \r\n <\/p>"},{"title" : "Address","content" : "<p>\r\n 2301 Ravenswood Rd Madison, WI 53711 \r\n <\/p>"},{"title" : "Phone","content" : "<p>\r\n (315) 905-2321 \r\n <\/p>"},{"title" : "Mail","content" : "<p>\r\n <a href=\"#\" class=\"icofont-facebook\">\r\n traitimanhnholeviem@gmail.com \r\n<\/a>\r\n <\/p>"},{"title" : "Skype","content" : "<p>\r\n findhouse.com \r\n <\/p>"}]',
                    'group' => "general",
                ],
                [
                    'name'  => 'page_contact_iframe_google_map',
                    'val'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835253576489!2d144.95372995111143!3d-37.817327679652266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1581584770980!5m2!1sen!2sin" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                    'group' => "general",
                ],
                [
                    'name' => 'map_contact_lat',
                    'val' => '36.401066',
                    'group' => "general",
                ],
                [
                    'name' => 'map_contact_long',
                    'val' => '-88.312292',
                    'group' => "general",
                ],
                [
                    'name' => 'map_contact_zoom',
                    'val' => '8',
                    'group' => "general",
                ],

                [
                    'name' => 'contact_partners_title',
                    'val' => 'Become a Real Estate Agent',
                    'group' => "general",
                ],

                [
                    'name' => 'contact_partners_sub_title',
                    'val' => 'We only work with the best companies around the globe',
                    'group' => "general",
                ],

                [
                    'name' => 'contact_partners_button_text',
                    'val' => 'Register',
                    'group' => "general",
                ],


                [
                    'name' => 'contact_partners_button_link',
                    'val' => '#',
                    'group' => "general",
                ],

                [
                    'name' => 'list_widget_footer_ja',
                    'val' => '[{"title":"\u52a9\u3051\u304c\u5fc5\u8981\uff1f","size":"3","content":"<div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u304a\u96fb\u8a71\u304f\u3060\u3055\u3044\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            + 00 222 44 5678\r\n        <\/div>\r\n    <\/div>\r\n    <div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u90f5\u4fbf\u7269\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            hello@yoursite.com\r\n        <\/div>\r\n    <\/div>\r\n    <div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u30d5\u30a9\u30ed\u30fc\u3059\u308b\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            <a href=\"#\">\r\n                <i class=\"icofont-facebook\"><\/i>\r\n            <\/a>\r\n            <a href=\"#\">\r\n                <i class=\"icofont-twitter\"><\/i>\r\n            <\/a>\r\n            <a href=\"#\">\r\n                <i class=\"icofont-youtube-play\"><\/i>\r\n            <\/a>\r\n        <\/div>\r\n    <\/div>"},{"title":"\u4f1a\u793e","size":"3","content":"<ul>\r\n    <li><a href=\"#\">\u7d04, \u7565<\/a><\/li>\r\n    <li><a href=\"#\">\u30b3\u30df\u30e5\u30cb\u30c6\u30a3\u30d6\u30ed\u30b0<\/a><\/li>\r\n    <li><a href=\"#\">\u5831\u916c<\/a><\/li>\r\n    <li><a href=\"#\">\u3068\u9023\u643a<\/a><\/li>\r\n    <li><a href=\"#\">\u30c1\u30fc\u30e0\u306b\u4f1a\u3046<\/a><\/li>\r\n<\/ul>"},{"title":"\u30b5\u30dd\u30fc\u30c8","size":"3","content":"<ul>\r\n    <li><a href=\"#\">\u30a2\u30ab\u30a6\u30f3\u30c8<\/a><\/li>\r\n    <li><a href=\"#\">\u6cd5\u7684<\/a><\/li>\r\n    <li><a href=\"#\">\u63a5\u89e6<\/a><\/li>\r\n    <li><a href=\"#\">\u30a2\u30d5\u30a3\u30ea\u30a8\u30a4\u30c8\u30d7\u30ed\u30b0\u30e9\u30e0<\/a><\/li>\r\n    <li><a href=\"#\">\u500b\u4eba\u60c5\u5831\u4fdd\u8b77\u65b9\u91dd<\/a><\/li>\r\n<\/ul>"},{"title":"\u8a2d\u5b9a","size":"3","content":"<ul>\r\n<li><a href=\"#\">\u8a2d\u5b9a1<\/a><\/li>\r\n<li><a href=\"#\">\u8a2d\u5b9a2<\/a><\/li>\r\n<\/ul>"}]',
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_title',
                    'val' => "Send Us An Email",
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_sub_title',
                    'val' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida quis libero eleifend ornare. Maecenas mattis enim at arcu feugiat, sit amet blandit nisl iaculis. Donec lacus odio, malesuada eu libero sit amet, congue aliquam leo. In hac habitasse platea dictumst.",
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_desc',
                    'val' => "<!DOCTYPE html><html><head></head><body><h3>FindHouse</h3><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Tell. + 00 222 444 33</p><p>Email. hello@yoursite.com</p><p>1355 Market St, Suite 900San, Francisco, CA 94103 United States</p></body></html>",
                    'group' => "general",
                ],
                [
                    'name' => 'page_contact_image',
                    'val' => MediaFile::findMediaByName("bg_contact")->id,
                    'group' => "general",
                ],
                [
                    'name' => 'error_404_banner',
                    'val' => MediaFile::findMediaByName("error_404_banner")->id,
                    'group' => "general",
                ],
                [
                    'name' => 'error_404_title',
                    'val' => 'Ohh! Page Not Found',
                    'group' => "general",
                ],
                [
                    'name' => 'error_404_desc',
                    'val' => 'We can’t seem to find the page you’re looking for',
                    'group' => "general",
                ]
            ]
        );

        $banner_home_mix = MediaFile::findMediaByName("home-mix")->id;
        $image_home_mix_1 = MediaFile::findMediaByName("image_home_mix_1")->id;
        $image_home_mix_2 = MediaFile::findMediaByName("image_home_mix_2")->id;
        $image_home_mix_3 = MediaFile::findMediaByName("image_home_mix_3")->id;
        $image_home_mix_5 = MediaFile::findMediaByName("image_home_mix_5")->id;

        $avatar = MediaFile::findMediaByName("avatar")->id;
        $avatar_2 = MediaFile::findMediaByName("avatar-2")->id;
        $avatar_3 = MediaFile::findMediaByName("avatar-3")->id;


        $partners_1 = MediaFile::findMediaByName("partners-1")->id;
        $partners_2 = MediaFile::findMediaByName("partners-2")->id;
        $partners_3 = MediaFile::findMediaByName("partners-3")->id;
        $partners_4 = MediaFile::findMediaByName("partners-4")->id;
        $partners_5 = MediaFile::findMediaByName("partners-5")->id;

        $service_1 = MediaFile::findMediaByName("service")->id;
        $service_2 = MediaFile::findMediaByName("service-2")->id;
        $service_3 = MediaFile::findMediaByName("service-3")->id;
        $service_4 = MediaFile::findMediaByName("service-4")->id;
        $service_5 = MediaFile::findMediaByName("service-5")->id;

        $testimonial_1 = MediaFile::findMediaByName("testimonial")->id;
        $testimonial_2 = MediaFile::findMediaByName("testimonial-2")->id;
        $testimonial_3 = MediaFile::findMediaByName("testimonial-3")->id;
        $testimonial_4 = MediaFile::findMediaByName("testimonial-4")->id;
        $testimonial_5 = MediaFile::findMediaByName("testimonial-5")->id;

        $bg_testimonial = MediaFile::findMediaByName("testimonial-bg")->id;
        $bg_testimonial_1 = MediaFile::findMediaByName("testimonial-bg-1")->id;

        // Setting Home Page
        $template_home_1 = DB::table('core_templates')->insertGetId([
            'title' => 'Home Page',
            'content' => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"service_types":["hotel","space","tour","car","event"],"title":"Find Your Dream Home","sub_title":"From as low as $10 per day with limited time offer discounts.","bg_image":' . $banner_home_mix . ',"attr_show":5,"attr_hide":[6],"hide_form_search":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"Featured Properties","desc":"Handpicked properties by our team.","number":12,"style":"carousel","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"title":"Find Properties in These Cities","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":4,"layout":"style_4","order":"id","order_by":"asc","to_location_detail":"","custom_ids":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"offer_block","name":"Offer Block","model":{"list_item":[{"_active":true,"title":"Trusted By Thousands","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.\nthe best prices on","background_image":' . $image_home_mix_1 . ',"link_title":"See Deals","link_more":"#","featured_text":"HOLIDAY SALE","featured_icon":"flaticon-high-five"},{"_active":true,"title":"Wide Renge Of Properties","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.\n\n","background_image":' . $image_home_mix_2 . ',"link_title":"Sign Up","link_more":"/register","featured_icon":"flaticon-home-1"},{"_active":true,"title":"Financing Made Easy","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.","background_image":' . $image_home_mix_3 . ',"link_title":"Sign Up","link_more":"/register","featured_text":null,"featured_icon":"flaticon-profit"}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Testimonials","list_item":[{"_active":false,"name":"Eva Hicks","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":' . $avatar . '},{"_active":false,"name":"Donald Wolf","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":6,"avatar":' . $avatar_2 . '},{"_active":false,"name":"Charlie Harrington","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.","number_star":5,"avatar":' . $avatar_3 . '}],"desc":"Here could be a nice sub title"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"title":"Articles & Tips","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":3,"category_id":"","order":"id","order_by":"desc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Become a Real Estate Agent","sub_title":"We only work with the best companies around the globe","link_title":"Register Now","link_more":"#","bg_color":""},"component":"RegularBlock","open":true,"is_container":false}]',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_template_translations')->insert([
            'origin_id' => $template_home_1,
            'locale' => 'ja',
            'title' => 'Home Page',
            'content' => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"service_types":["hotel","space","tour","car","event"],"title":"Find Your Dream Home","sub_title":"From as low as $10 per day with limited time offer discounts.","bg_image":' . $banner_home_mix . ',"attr_show":5,"attr_hide":[6],"hide_form_search":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"Featured Properties","desc":"Handpicked properties by our team.","number":12,"style":"carousel","location_id":"","order":"id","order_by":"desc","is_featured":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"title":"Find Properties in These Cities","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":4,"layout":"style_4","order":"id","order_by":"asc","to_location_detail":"","custom_ids":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"offer_block","name":"Offer Block","model":{"list_item":[{"_active":true,"title":"Trusted By Thousands","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.\nthe best prices on","background_image":' . $image_home_mix_1 . ',"link_title":"See Deals","link_more":"#","featured_text":"HOLIDAY SALE","featured_icon":"flaticon-high-five"},{"_active":true,"title":"Wide Renge Of Properties","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.\n\n","background_image":' . $image_home_mix_2 . ',"link_title":"Sign Up","link_more":"/register","featured_icon":"flaticon-home-1"},{"_active":true,"title":"Financing Made Easy","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.","background_image":' . $image_home_mix_3 . ',"link_title":"Sign Up","link_more":"/register","featured_text":null,"featured_icon":"flaticon-profit"}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Testimonials","list_item":[{"_active":false,"name":"Eva Hicks","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":' . $avatar . '},{"_active":false,"name":"Donald Wolf","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":6,"avatar":' . $avatar_2 . '},{"_active":false,"name":"Charlie Harrington","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.","number_star":5,"avatar":' . $avatar_3 . '}],"desc":"Here could be a nice sub title"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"title":"Articles & Tips","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":3,"category_id":"","order":"id","order_by":"desc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Become a Real Estate Agent","sub_title":"We only work with the best companies around the globe","link_title":"Register Now","link_more":"#","bg_color":""},"component":"RegularBlock","open":true,"is_container":false}]',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $image_home_mix_3_search_now = MediaFile::findMediaByName('image_home_mix_3_search_now')->id;


        $template_home_3 = DB::table('core_templates')->insertGetId([
            "title" => "Home Page 3",
            "content" => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"service_types":["hotel","space","tour","car","event"],"title":"Find Your Dream Home","sub_title":"From as low as $10 per day with limited time offer discounts.","bg_image":' . $banner_home_mix . ',"attr_show":5,"attr_hide":[6,1,2],"hide_form_search":"","style":"style_4","list_slider":[],"video_url":"https://www.youtube.com/watch?v=R7xbhKIiw4Y"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"Featured Properties","desc":"Handpicked properties by our team.","number":12,"style":"carousel","location_id":"","order":"id","order_by":"desc","is_featured":true,"layout":"style_2",
"hide_scroll_down":true},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"title":"Find Properties in These Cities","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":4,"layout":"style_4","order":"id","order_by":"asc","to_location_detail":"","custom_ids":"","number":"","style":"style_3"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Search Smarter, From Anywhere","sub_title":"Power your search with our Resideo real estate platform, for timely listings and a seamless experience.","link_title":"Search Now","link_more":"/property","bg_color":"","bg_image":' . $image_home_mix_3_search_now . ',"style":"style_2","desc":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"Best Property Value","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":3,"location_id":"","order":"title","order_by":"asc","layout":"style_3","is_featured":true,
"hide_scroll_down":true},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_users","name":"User: List Users","model":{"title":"Our Agents","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":6,"role_id":"1","order":"name","order_by":"asc"},"component":"RegularBlock","open":true}]',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_template_translations')->insert([
            'origin_id' => $template_home_3,
            'locale' => 'ja',
            'title' => 'Home Page 3',
            'created_at' => date("Y-m-d H:i:s"),
            'content' => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"service_types":["hotel","space","tour","car","event"],"title":"あなたの夢の家を探す","sub_title":"期間限定のオファー割引で1日10から.","bg_image":' . $banner_home_mix . ',"attr_show":5,"attr_hide":[6,1,2],"hide_form_search":"","style":"style_4","list_slider":[],"video_url":"https://www.youtube.com/watch?v=R7xbhKIiw4Y"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"注目のプロパティ","desc":"私たちのチームが厳選した物件.","number":12,"style":"carousel","location_id":"","order":"id","order_by":"desc","is_featured":true,"layout":"style_2",
"hide_scroll_down":true},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"title":"これらの都市の物件を探す","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":4,"layout":"style_4","order":"id","order_by":"asc","to_location_detail":"","custom_ids":"","number":"","style":"style_3"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"どこからでも、よりスマートに検索","sub_title":"タイムリーなリストとシームレスな体験のために、Resideo不動産プラットフォームで検索を強化します.","link_title":"検索中","link_more":"/property","bg_color":"","bg_image":' . $image_home_mix_3_search_now . ',"style":"style_2","desc":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"Best Property Value","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":3,"location_id":"","order":"title","order_by":"asc","layout":"style_3","is_featured":true,
"hide_scroll_down":true},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_users","name":"User: List Users","model":{"title":"私たちのエージェント","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":6,"role_id":"1","order":"name","order_by":"asc"},"component":"RegularBlock","open":true}]'
        ]);

        $image_home_mix_6_bg = MediaFile::findMediaByName('image_home_mix_6_bg')->id;
        $image_home_mix_6_8_bg = MediaFile::findMediaByName('image_home_mix_6_8_bg')->id;
        $image_home_mix_6_9_bg = MediaFile::findMediaByName('image_home_mix_6_9_bg')->id;
        $template_home_6 = DB::table('core_templates')->insertGetId([
            'title' => 'Home Page 6',
            'content' => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"service_types":["hotel","space","tour","car","event"],"title":"Find Your Dream Home","sub_title":"From as low as $10 per day with limited time offer discounts.","bg_image":' . $image_home_mix_6_bg . ',"attr_show":5,"attr_hide":[6,1,2],"hide_form_search":"","style":"style_5","list_slider":[],"video_url":"https://www.youtube.com/watch?v=R7xbhKIiw4Y"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"Featured Properties","desc":"Handpicked properties by our team.","number":12,"style":"carousel","location_id":"","order":"id","order_by":"desc","is_featured":false,"layout":"style_4"},"component":"RegularBlock","open":true,"is_container":false},{"type":"offer_block","name":"Offer Block","model":{"title":"What are you looking for?","desc":"We provide full service at every step.","style":"style_2","bg_image":' . $image_home_mix_6_8_bg . ',"list_item":[{"_active":true,"title":"Modern Villa","desc":"Aliquam dictum elit vitae mauris facilisis, at dictum urna.","featured_icon":"flaticon-house-1","link_more":"/property"},{"_active":true,"title":"Family House","desc":"Aliquam dictum elit vitae mauris facilisis, at dictum urna.","featured_icon":"flaticon-house","link_more":"/property"},{"_active":true,"title":"Town House","desc":"Aliquam dictum elit vitae mauris facilisis, at dictum urna.","featured_icon":"flaticon-house-2","link_more":"/property"},{"_active":true,"title":"Apartment","desc":"Aliquam dictum elit vitae mauris facilisis, at dictum urna.","featured_icon":"flaticon-building","link_more":"/property"}]},"component":"RegularBlock","open":true},{"type":"list_locations","name":"List Locations","model":{"title":"Find Properties in These Cities","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","layout":"style_4","order":"id","order_by":"asc","to_location_detail":"","custom_ids":"","number":"6","style":"style_4"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Modern Apartment","sub_title":"$79 at night","link_title":"Book Now","link_more":"/property","bg_color":"#ffffff","bg_image":' . $image_home_mix_6_9_bg . ',"style":"style_3","desc":"I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit."},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_users","name":"User: List Users","model":{"title":"Our Agents","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":6,"role_id":"1","order":"name","order_by":"asc","style":"style_2"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"title":"Articles & Tips","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":3,"category_id":"","order":"id","order_by":"desc"},"component":"RegularBlock","open":true},{"type":"partners","name":"Our Partners","model":{"title":"Our Partners","desc":"We only work with the best companies around the globe","list_item":[{"_active":true,"avatar":' . $partners_1 . '},{"_active":true,"avatar":' . $partners_2 . '},{"_active":true,"avatar":' . $partners_3 . '},{"_active":true,"avatar":' . $partners_4 . '},{"_active":true,"avatar":' . $partners_5 . '}]},"component":"RegularBlock","open":true}]',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_template_translations')->insert([
            'origin_id' => $template_home_6,
            'locale' => 'ja',
            'title' => 'Home Page 6',
            'content' => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"service_types":["hotel","space","tour","car","event"],"title":"あなたの夢の家を探す","sub_title":"期間限定のオファー割引で1日10から.","bg_image":' . $image_home_mix_6_bg . ',"attr_show":5,"attr_hide":[6,1,2],"hide_form_search":"","style":"style_5","list_slider":[],"video_url":"https://www.youtube.com/watch?v=R7xbhKIiw4Y"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"注目のプロパティ","desc":"私たちのチームが厳選した物件.","number":12,"style":"carousel","location_id":"","order":"id","order_by":"desc","is_featured":false,"layout":"style_4"},"component":"RegularBlock","open":true,"is_container":false},{"type":"offer_block","name":"Offer Block","model":{"title":"何をお探しですか？","desc":"私たちはあらゆる段階でフルサービスを提供します。","style":"style_2","bg_image":' . $image_home_mix_6_8_bg . ',"list_item":[{"_active":true,"title":"Modern Villa","desc":"Aliquam dictum elit vitae mauris facilisis, at dictum urna.","featured_icon":"flaticon-house-1","link_more":"/property"},{"_active":true,"title":"Family House","desc":"Aliquam dictum elit vitae mauris facilisis, at dictum urna.","featured_icon":"flaticon-house","link_more":"/property"},{"_active":true,"title":"Town House","desc":"Aliquam dictum elit vitae mauris facilisis, at dictum urna.","featured_icon":"flaticon-house-2","link_more":"/property"},{"_active":true,"title":"Apartment","desc":"Aliquam dictum elit vitae mauris facilisis, at dictum urna.","featured_icon":"flaticon-building","link_more":"/property"}]},"component":"RegularBlock","open":true},{"type":"list_locations","name":"List Locations","model":{"title":"これらの都市の物件を探す","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":4,"layout":"style_4","order":"id","order_by":"asc","to_location_detail":"","custom_ids":"","number":"6","style":"style_4"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Modern Apartment","sub_title":"$79 at night","link_title":"Book Now","link_more":"/property","bg_color":"#ffffff","bg_image":' . $image_home_mix_6_9_bg . ',"style":"style_3","desc":"I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit."},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_users","name":"User: List Users","model":{"title":"私たちのエージェント","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":6,"role_id":"1","order":"name","order_by":"asc","style":"style_2"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"title":"記事とヒント","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":3,"category_id":"","order":"id","order_by":"desc"},"component":"RegularBlock","open":true},{"type":"partners","name":"Our Partners","model":{"title":"私たちのパートナー","desc":"私たちは世界中の最高の企業とのみ協力しています","list_item":[{"_active":true,"avatar":' . $partners_1 . '},{"_active":true,"avatar":' . $partners_2 . '},{"_active":true,"avatar":' . $partners_3 . '},{"_active":true,"avatar":' . $partners_4 . '},{"_active":true,"avatar":' . $partners_5 . '}]},"component":"RegularBlock","open":true}]',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $template_home_5 = DB::table('core_templates')->insertGetId([
            'title' => 'Home Page 5',
            'content' => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"attr_hide":[1,2],"title":"Find Your Dream Home","sub_title":"From as low as $10 per day with limited time offer discounts.","style":"style_3","bg_image":' . $image_home_mix_5 . ',"list_slider":[],"video_url":"","hide_form_search":"","desc":"","link_title":"","link_more":"","property_id":"","category_ids":["1","2","3","4"]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"title":"Find Properties in These Cities","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number_show":"","order":"id","order_by":"desc","custom_ids":"","to_location_detail":"","style":"style_2","number":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"Featured Properties","desc":"Handpicked properties by our team.","number":6,"location_id":"","order":"id","order_by":"desc","layout":"","is_featured":""},"component":"RegularBlock","open":true},{"type":"offer_block","name":"Offer Block","model":{"title":"Why Choose Us","desc":"We provide full service at every step.","style":"style_3","bg_image":"","list_item":[{"_active":false,"title":"Trusted By Thousands","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.","featured_icon":"flaticon-high-five","link_more":null},{"_active":false,"title":"Wide Renge Of Properties","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.","featured_icon":"flaticon-home-1","link_more":null},{"_active":false,"title":"Financing Made Easy","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.","featured_icon":"flaticon-profit","link_more":null}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Testimonials","sub_title":"Here could be a nice sub title","bg_image":' . $bg_testimonial . ',"list_item":[{"_active":false,"name":"Eva Hicks","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":' . $testimonial_1 . '},{"_active":false,"name":"Donald Wolf","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":6,"avatar":' . $testimonial_2 . '},{"_active":false,"name":"Charlie Harrington","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.","number_star":5,"avatar":' . $testimonial_3 . '}],"style":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"title":"Articles & Tips","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","category_id":"","order":"id","order_by":"desc","bg_image":"","number":"3"},"component":"RegularBlock","open":true,"is_container":false},{"type":"partners","name":"Our Partners","model":{"title":"Our Partners","desc":"We only work with the best companies around the globe","list_item":[{"_active":true,"avatar":' . $partners_1 . '},{"_active":true,"avatar":' . $partners_2 . '},{"_active":true,"avatar":' . $partners_3 . '},{"_active":true,"avatar":' . $partners_4 . '},{"_active":true,"avatar":' . $partners_5 . '}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Become a Real Estate Agent","sub_title":"We only work with the best companies around the globe","link_title":"Register Now","link_more":"#","bg_color":"","bg_image":"","style":"","desc":""},"component":"RegularBlock","open":true,"is_container":false}]',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $img_slide_home_8_1 = MediaFile::findMediaByName('image_home_mix_8_slider_1')->id;
        $img_slide_home_8_2 = MediaFile::findMediaByName('image_home_mix_8_slider_2')->id;
        $img_slide_home_8_3 = MediaFile::findMediaByName('image_home_mix_8_slider_3')->id;
        $template_home_8 = DB::table('core_templates')->insertGetId([
            'title' => 'Home Page 8',
            'content' => '[{"type":"banner_property","name":"Banner Property","model":{"layout":"","list_slider":[{"_active":true,"title":"Find Your Dream Home","sub_title":"From as low as $10 per day with limited time offer discounts","bg_image":' . $img_slide_home_8_1 . ',"property_id":"11"},{"_active":true,"title":"Find Your Dream Home","sub_title":"From as low as $10 per day with limited time offer discounts","bg_image":' . $img_slide_home_8_2 . ',"property_id":"10"},{"_active":true,"title":"Your Property, Our Priority.","sub_title":"From as low as $10 per day with limited time offer discounts","bg_image":' . $img_slide_home_8_3 . ',"property_id":null}],"hide_slider_controls":false},"component":"RegularBlock","open":true},{"type":"list_locations","name":"List Locations","model":{"title":"Find Properties in These Cities","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number":4,"order":"id","order_by":"desc","custom_ids":[],"to_location_detail":"","style":"style_5"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"Featured Properties","desc":"Handpicked properties by our team.","number":"","location_id":"","order":"","order_by":"","layout":"","is_featured":"",
"hide_scroll_down":true},"component":"RegularBlock","open":true,"is_container":false},{"type":"offer_block","name":"Offer Block","model":{"title":"Find a Place That Fits Your Comfort","desc":"Explore the greates places in the city. You wonu2019t be disappointed.","style":"style_4","bg_image":"","list_item":[{"_active":false,"title":"Miami","desc":"07 Listings","featured_icon":"flaticon-house","link_more":null,"bg_image_item":' . $service_1 . '},{"_active":false,"title":"Family House","desc":"58 Listings","featured_icon":"flaticon-house-1","link_more":null,"bg_image_item":' . $service_2 . '},{"_active":false,"title":"Town House","desc":"07 Listings","featured_icon":"flaticon-house-2","link_more":null,"bg_image_item":' . $service_3 . '},{"_active":false,"title":"Apartment","desc":"07 Listings","featured_icon":"flaticon-building","link_more":null,"bg_image_item":' . $service_4 . '}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"partners","name":"Our Partners","model":{"title":"","desc":"","list_item":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"map","name":"Property Map by location","model":{"custom_ids":"3","number":12},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Testimonials","sub_title":"Here could be a nice sub title","bg_image":"","list_item":[{"_active":false,"name":"Lara Croft","desc":"Especially i want to give thanks to support team, this guys are friendly, correct, gave me quick and complete answers.","number_star":"Good job!","position":"Restaurant Owner","avatar":' . $testimonial_1 . '},{"_active":false,"name":"Ali Tufan","desc":"Especially i want to give thanks to support team, this guys are friendly, correct, gave me quick and complete answers.","number_star":"Good job!","position":"Restaurant Owner","avatar":' . $testimonial_2 . '},{"_active":false,"name":"Ali Tufan","desc":"Especially i want to give thanks to support team, this guys are friendly, correct, gave me quick and complete answers.","number_star":"Good job!","position":"Restaurant Owner","avatar":' . $testimonial_3 . '},{"_active":false,"name":"Ali Tufan 4","desc":"Especially i want to give thanks to support team, this guys are friendly, correct, gave me quick and complete answers.","number_star":"Good job!","position":"Restaurant Owner","avatar":' . $testimonial_4 . '},{"_active":false,"name":"Ali Tufan 5","desc":"Especially i want to give thanks to support team, this guys are friendly, correct, gave me quick and complete answers.","number_star":"Good job!","position":"Restaurant Owner","avatar":' . $testimonial_5 . '},{"_active":false,"name":"Ali Tufan 6","desc":"Especially i want to give thanks to support team, this guys are friendly, correct, gave me quick and complete answers.","number_star":"Good job!","position":"Restaurant Owner","avatar":61}],"style":"style_1"},"component":"RegularBlock","open":true,"is_container":false},{"type":"partners","name":"Our Partners","model":{"title":"Our Partners","desc":"We only work with the best companies around the globe","list_item":[{"_active":false,"avatar":' . $partners_1 . '},{"_active":false,"avatar":' . $partners_2 . '},{"_active":true,"avatar":' . $partners_3 . '},{"_active":true,"avatar":' . $partners_4 . '},{"_active":true,"avatar":' . $partners_5 . '}]},"component":"RegularBlock","open":true}]',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $image_home_mix_10_slider_1 = MediaFile::findMediaByName("image_home_mix_10_slider_1")->id;
        $image_home_mix_10_slider_2 = MediaFile::findMediaByName("image_home_mix_10_slider_2")->id;
        $image_home_mix_10_slider_3 = MediaFile::findMediaByName("image_home_mix_10_slider_3")->id;
        $template_home_10 = DB::table('core_templates')->insertGetId([
            'title' => 'Home Page 10',
            'content' => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"attr_hide":[2],"title":"$13,000 <small>/mo</small>","sub_title":"Gorgeous Villa Bay View","style":"style_6","bg_image":"","list_slider":[{"_active":true,"bg_image":' . $image_home_mix_10_slider_1 . ',"property_id":"10"},{"_active":true,"bg_image":' . $image_home_mix_10_slider_2 . ',"property_id":"3"},{"_active":true,"bg_image":' . $image_home_mix_10_slider_3 . ',"property_id":"8"}],"video_url":"","hide_form_search":false,"desc":"Beds: 3,  Baths: 4","link_title":"Learn More","link_more":"#","property_id":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"Featured Properties","desc":"Handpicked properties by our team.","number":3,"location_id":"","order":"","order_by":"","layout":"","is_featured":"","hide_scroll_down":true},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_locations","name":"List Locations","model":{"title":"Find Properties in These Cities","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","number_show":4,"order":"name","order_by":"desc","custom_ids":"","to_location_detail":"","style":"style_1","number":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"offer_block","name":"Offer Block","model":{"title":"Why Choose Us","desc":"We provide full service at every step.","style":"style_5","bg_image":"","list_item":[{"_active":false,"title":"Trusted By Thousands","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.nthe best prices on","featured_icon":"flaticon-high-five","link_more":null},{"_active":false,"title":"Wide Renge Of Properties","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.","featured_icon":"flaticon-home-1","link_more":null},{"_active":false,"title":"Financing Made Easy","desc":"Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.","featured_icon":"flaticon-profit","link_more":null}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Testimonials","sub_title":"Here could be a nice sub title","bg_image":' . $bg_testimonial_1 . ',"list_item":[{"_active":false,"name":"Eva Hicks","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":61},{"_active":false,"name":"Donald Wolf","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":6,"avatar":62},{"_active":false,"name":"Charlie Harrington","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.","number_star":6,"avatar":60}],"style":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"title":"Articles & Tips","desc":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","bg_image":"","category_id":"","order":"","order_by":"","number":3},"component":"RegularBlock","open":true,"is_container":false},{"type":"partners","name":"Our Partners","model":{"title":"Our Partners","desc":"We only work with the best companies around the globe","list_item":[{"_active":true,"avatar":' . $partners_1 . '},{"_active":true,"avatar":' . $partners_2 . '},{"_active":true,"avatar":' . $partners_3 . '},{"_active":true,"avatar":' . $partners_4 . '},{"_active":true,"avatar":' . $partners_5 . '}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Become a Real Estate Agent","sub_title":"We only work with the best companies around the globe","desc":"","link_title":"Register Now","link_more":"#","bg_color":"","bg_image":"","style":""},"component":"RegularBlock","open":true,"is_container":false}]',

            'created_at' => date("Y-m-d H:i:s")
        ]);

        //PAGE ABOUT US
        $about_banner = MediaFile::findMediaByName("about-banner")->id;
        $about_image_video = MediaFile::findMediaByName("about-image-video")->id;
        $team_1 = MediaFile::findMediaByName("team-1")->id;
        $team_2 = MediaFile::findMediaByName("team-2")->id;
        $team_3 = MediaFile::findMediaByName("team-3")->id;
        $team_4 = MediaFile::findMediaByName("team-4")->id;
        $aboutData = [
            [
                "type" => "page_banner",
                "name" => "Page Banner",
                "model" => [
                    "title" => "About Us",
                    "bg_image" => $about_banner
                ],
                "component" => "RegularBlock",
                "open" => true,
                "is_container" => false
            ],
            [
                "type" => "image_text_with_counting",
                "name" => "Image Text With Counting",
                "model" => [
                    "title" => "Our Mission Is To FindHouse",
                    "image" => $about_image_video,
                    "video_url" => "https://www.youtube.com/watch?v=LNu3Fx0T7-g",
                    "description" => "<p class='large'>Mauris ac consectetur ante, dapibus gravida tellus. Nullam aliquet eleifend dapibus. Cras sagittis, ex euismod lacinia tempor.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus vulputate porttitor sed feugiat nunc. Mauris ac consectetur ante, dapibus gravida tellus. Nullam aliquet eleifend dapibus. Cras sagittis, ex euismod lacinia tempor, lectus orci elementum augue, eget auctor metus ante sit amet velit.</p>
<p>Maecenas quis viverra metus, et efficitur ligula. Nam congue augue et ex congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis elementum tortor eget condimentum tempor. Praesent sollicitudin lectus ut pharetra pulvinar. Donec et libero ligula. Vivamus semper at orci at placerat.Placeat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod libero amet, laborum qui nulla quae alias tempora.</p>",
                  "list_item" => [
                    [
                        "_active" => false,
                        "title" => "Customers to date",
                        "value" => "80,123",
                        "icon_class" => "flaticon-user"
                    ],
                    [
                        "_active" => false,
                        "title" => "In home sales",
                        "value" => "$74 Billion",
                        "icon_class" => "flaticon-home"
                    ],
                    [
                        "_active" => false,
                        "title" => "In Savings",
                        "value" => "$468 Million",
                        "icon_class" => "flaticon-transfer"
                    ]
                       ],
                           "component" => "RegularBlock",
                           "open" => true,
                           "is_container" => false
                ],
            ],
           [
               "type" => "offer_block",
               "name" => "Offer Block",
               "model" => [
                   "list_item" => [
                       [
                           "_active" => false,
                           "title" => "Trusted By Thousands",
                           "desc" => "Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis. the best prices on",
                           "link_title" => "See Deals",
                           "link_more" => "#",
                           "featured_text" => "HOLIDAY SALE",
                           "featured_icon" => "flaticon-high-five"
                       ],
                       [
                           "_active" => false,
                           "title" => "Wide Renge Of Properties",
                           "desc" => "Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.
        ",
                           "link_title" => "Sign Up",
                           "link_more" => "/register",
                           "featured_icon" => "flaticon-home-1"
                       ],
                       [
                           "_active" => false,
                           "title" => "Financing Made Easy",
                           "desc" => "Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.",
                           "link_title" => "Sign Up",
                           "link_more" => "/register",
                           "featured_text" => null,
                           "featured_icon" => "flaticon-profit"
                       ]
                   ],
                   "title" => "Why Choose Us",
                   "desc" => "We provide full service at every step.",
                   "style" => "style_3",
                   "bg_image" => ""
               ],
               "component" => "RegularBlock",
               "open" => true,
               "is_container" => false
           ],
           [
               "type" => "our_team",
               "name" => "Our Team",
               "model" => [
                   "title" => "Our Team",
                   "list_item" => [
                       [
                           "_active" => false,
                           "name" => "Jennifer Barton",
                           "type" => "Broker",
                           "avatar" => $team_1
                       ],
                       [
                           "_active" => false,
                           "name" => "Kathleen Myers",
                           "type" => "Broker",
                           "avatar" => $team_2
                       ],
                       [
                           "_active" => false,
                           "name" => "Mariusz Ciesla",
                           "type" => "Broker",
                           "avatar" => $team_3
                       ],
                       [
                           "_active" => false,
                           "name" => "Kathleen Myers",
                           "type" => "Agent",
                           "avatar" => $team_4
                       ]
                   ],
                   "desc" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit"
               ],
               "component" => "RegularBlock",
               "open" => true,
               "is_container" => false
           ],
           [
               "type" => "testimonial",
               "name" => "List Testimonial",
               "model" => [
                   "title" => "Testimonials",
                   "list_item" => [
                       [
                           "_active" => false,
                           "name" => "Eva Hicks",
                           "desc" => "Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ",
                           "number_star" => 5,
                           "avatar" => $avatar
                       ],
                       [
                           "_active" => false,
                           "name" => "Donald Wolf",
                           "desc" => "Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ",
                           "number_star" => 4,
                           "avatar" => $avatar_2
                       ],
                       [
                           "_active" => false,
                           "name" => "Charlie Harrington",
                           "desc" => "Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.",
                           "number_star" => 5,
                           "avatar" => $avatar_3
                       ]
                   ],
                   "desc" => "Here could be a nice sub title",
                   "sub_title" => "Here could be a nice sub title",
                   "bg_image" => "",
                   "style" => "style_3"
               ],
               "component" => "RegularBlock",
               "open" => true,
               "is_container" => false
           ],
           [
               "type" => "partners",
               "name" => "Our Partners",
               "model" => [
                   "title" => "Our Partners",
                   "desc" => "We only work with the best companies around the globe",
                   "list_item" => [
                       [
                           "_active" => true,
                           "avatar" => $partners_1
                       ],
                       [
                           "_active" => true,
                           "avatar" => $partners_2
                       ],
                       [
                           "_active" => true,
                           "avatar" => $partners_3
                       ],
                       [
                           "_active" => true,
                           "avatar" => $partners_4
                       ],
                       [
                           "_active" => true,
                           "avatar" => $partners_5
                       ]
                   ]
               ],
               "component" => "RegularBlock",
               "open" => true,
               "is_container" => false
           ],
           [
               "type" => "call_to_action",
               "name" => "Call To Action",
               "model" => [
                   "title" => "Become a Real Estate Agent",
                   "sub_title" => "We only work with the best companies around the globe",
                   "desc" => "",
                   "link_title" => "Register Now",
                   "link_more" => "#",
                   "bg_color" => "",
                   "bg_image" => "",
                   "style" => ""
               ],
               "component" => "RegularBlock",
               "open" => true

            ]
        ];
        $template_about_us = DB::table('core_templates')->insertGetId([
            'title' => 'About us',
            'content' => json_encode($aboutData),
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $bg_form_become_a_agent = MediaFile::findMediaByName("thumb-vendor-register")->id;
        $template_become_a_agent = DB::table('core_templates')->insertGetId([
            'title' => 'Become a agent',
            'content' => '[{"type":"vendor_register_form","name":"Agent Register Form","model":{"title":"Become a agent","desc":"Join our community to unlock your greatest asset and welcome paying guests into your home.","youtube":"https://www.youtube.com/watch?v=AmZ0WrEaf34","bg_image":' . $bg_form_become_a_agent . '},"component":"RegularBlock","open":true,"is_container":false}]',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $home1_id = DB::table('core_pages')->insertGetId([
            'title' => 'Home Page',
            'slug' => 'home-page',
            'template_id' => $template_home_1,
            'header_style' => 'transparent',

            'status' => 'publish',
            'created_at' => date("Y-m-d H:i:s"),
            'show_template' => 1
        ]);
        DB::table('core_pages')->insert([
            'title' => 'Home Page 3',
            'slug' => 'home-page-3',
            'template_id' => $template_home_3,
            'body_width' => 'max1600',

            'status' => 'publish',
            'created_at' => date("Y-m-d H:i:s"),
            'show_template' => 1
        ]);
        DB::table('core_pages')->insert([
            'title' => 'Home Page 5',
            'slug' => 'home-page-5',
            'template_id' => $template_home_5,

            'status' => 'publish',
            'created_at' => date("Y-m-d H:i:s"),
            'show_template' => 1
        ]);
        DB::table('core_pages')->insert([
            'title' => 'Home Page 6',
            'slug' => 'home-page-6',
            'template_id' => $template_home_6,

            'status' => 'publish',
            'created_at' => date("Y-m-d H:i:s"),
            'show_template' => 1
        ]);
        DB::table('core_pages')->insert([
            'title' => 'Home Page 8',
            'slug' => 'home-page-8',
            'template_id' => $template_home_8,

            'status' => 'publish',
            'created_at' => date("Y-m-d H:i:s"),
            'show_template' => 1
        ]);
        DB::table('core_pages')->insert([
            'title' => 'Home Page 10',
            'slug' => 'home-page-10',
            'template_id' => $template_home_10,

            'status' => 'publish',
            'created_at' => date("Y-m-d H:i:s"),
            'show_template' => 1
        ]);
        DB::table('core_pages')->insert([
            'title' => 'About Us',
            'slug' => 'about-us',
            'template_id' => $template_about_us,

            'status' => 'publish',
            'created_at' => date("Y-m-d H:i:s"),
            'show_template' => 1
        ]);
        DB::table('core_pages')->insert([
            'title' => 'Become a agent',
            'slug' => 'become-a-agent',
            'template_id' => $template_become_a_agent,
            'status' => 'publish',
            'created_at' => date("Y-m-d H:i:s"),
            'show_template' => 1
        ]);

        /* Gallery Page */
        $gallery = [];
        for($i = 1; $i < 13 ; $i++){
            $gallery[] = [
                "_active" => false,
                "image" => MediaFile::findMediaByName('property-' . $i)->id
            ];
        }
        $galleryData = [
            [
                "type" => "page_banner",
                "name" => "Page Banner",
                "model" => [
                    "title" => "Gallery",
                    "bg_image" => $about_banner
                ],
                "component" => "RegularBlock",
                "open" => true,
                "is_container" => false
            ],
            [
                "type" => "gallery",
                "name" => "Gallery",
                "model" => [
                    "gallery" => $gallery
                ],
                "component" => "RegularBlock",
                "open" => true
            ]
        ];
        $template_gallery = DB::table('core_templates')->insertGetId([
            'title' => 'Gallery',
            'content' => json_encode($galleryData),
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_pages')->insert([
            'title' => 'Gallery',
            'slug' => 'gallery',
            'template_id' => $template_gallery,
            'status' => 'publish',
            'created_at' => date("Y-m-d H:i:s"),
            'show_template' => 1
        ]);
        /* End Gallery Page */


        $settings = [
            [
                'name' => 'home_page_id',
                'val' => '1',
                'group' => "general",
            ],

            [
                'name' => "cookie_agreement_enable",
                'val' => "1",
                'group' => "advance",
            ],
            [
                'name' => "cookie_agreement_button_text",
                'val' => "Got it",
                'group' => "advance",
            ],
            [
                'name' => "cookie_agreement_content",
                'val' => "<p>This website requires cookies to provide all of its features. By using our website, you agree to our use of cookies. <a href='#'>More info</a></p>",
                'group' => "advance",
            ],
            [
                'name' => 'page_contact_title',
                'val' => "Send Us An Email",
                'group' => "general",
            ],
            [
                'name' => 'page_contact_title_ja',
                'val' => "私たちにメールを送って",
                'group' => "general",
            ],
            [
                'name' => 'page_contact_sub_title',
                'val' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida quis libero eleifend ornare. Maecenas mattis enim at arcu feugiat, sit amet blandit nisl iaculis. Donec lacus odio, malesuada eu libero sit amet, congue aliquam leo. In hac habitasse platea dictumst.",
                'group' => "general",
            ],
            [
                'name' => 'page_contact_sub_title_ja',
                'val' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In gravida quis libero eleifend ornare. Maecenas mattis enim at arcu feugiat, sit amet blandit nisl iaculis. Donec lacus odio, malesuada eu libero sit amet, congue aliquam leo. ハク・ハビタス・プラテア・ディクタムストで。",
                'group' => "general",
            ],
            [
                'name' => 'page_contact_desc',
                'val' => "<!DOCTYPE html><html><head></head><body><h3>FindHouse</h3><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Tell. + 00 222 444 33</p><p>Email. hello@yoursite.com</p><p>1355 Market St, Suite 900San, Francisco, CA 94103 United States</p></body></html>",
                'group' => "general",
            ],
            [
                'name' => 'page_contact_image',
                'val' => MediaFile::findMediaByName("bg_contact")->id,
                'group' => "general",
            ],
            [
                'name' => "currency_main",
                'val' => "usd",
                'group' => "payment",
            ],
            [
                'name' => "currency_format",
                'val' => "left",
                'group' => "payment",
            ],
            [
                'name' => "currency_decimal",
                'val' => ",",
                'group' => "payment",
            ],
            [
                'name' => "currency_thousand",
                'val' => ".",
                'group' => "payment",
            ],
            [
                'name' => "currency_no_decimal",
                'val' => "0",
                'group' => "payment",
            ],
            [
                'name' => "extra_currency",
                'val' => '[{"currency_main":"eur","currency_format":"left","currency_thousand":".","currency_decimal":",","currency_no_decimal":"2","rate":"0.902807"},{"currency_main":"jpy","currency_format":"right_space","currency_thousand":".","currency_decimal":",","currency_no_decimal":"0","rate":"0.00917113"}]',
                'group' => "payment",
            ],
            [
                'name' => 'map_provider',
                'val' => 'gmap',
                'group' => "advance",
            ],
            [
                'name' => 'size_unit',
                'val' => 'ft',
                'group' => "advance",
            ],
            [
                'name' => 'map_gmap_key',
                'val' => '',
                'group' => "advance",
            ],
            [
                'name' => "g_offline_payment_enable",
                'val' => "1",
                'group' => "payment",
            ],
            [
                'name' => "g_offline_payment_name",
                'val' => "Offline Payment",
                'group' => "payment",
            ],
            [
                'name' => "date_format",
                'val' => "m/d/Y",
                'group' => "general",
            ],
            [
                'name' => "site_title",
                'val' => "FindHouse",
                'group' => "general",
            ],
            [
                'name' => "site_timezone",
                'val' => "UTC",
                'group' => "general",
            ],
            [
                'name' => "site_title",
                'val' => "FindHouse",
                'group' => "general",
            ],
            [
                'name' => "email_header",
                'val' => '<h1 class="site-title" style="text-align: center">FindHouse</h1>',
                'group' => "general",
            ],
            [
                'name' => "email_footer",
                'val' => '<p class="" style="text-align: center">&copy; 2019 FindHouse. All rights reserved</p>',
                'group' => "general",
            ],
            [
                'name' => "enable_mail_user_registered",
                'val' => 1,
                'group' => "user",
            ],
            [
                'name' => "user_content_email_registered",
                'val' => '<h1 style="text-align: center">Welcome!</h1>
                    <h3>Hello [first_name] [last_name]</h3>
                    <p>Thank you for signing up with FindHouse! We hope you enjoy your time with us.</p>
                    <p>Please click button to verify your email address!</p>
                    <p>[button_verify]</p>
                    <p>Regards,</p>
                    <p>FindHouse</p>',
                'group' => "user",
            ],
            [
                'name' => "admin_enable_mail_user_registered",
                'val' => 1,
                'group' => "user",
            ],
            [
                'name' => "admin_content_email_user_registered",
                'val' => '<h3>Hello Administrator</h3>
                    <p>We have new registration</p>
                    <p>Full name: [first_name] [last_name]</p>
                    <p>Email: [email]</p>
                    <p>Regards,</p>
                    <p>FindHouse</p>',
                'group' => "user",
            ],
            [
                'name' => "user_content_email_forget_password",
                'val' => '<h1>Hello!</h1>
                    <p>You are receiving this email because we received a password reset request for your account.</p>
                    <p style="text-align: center">[button_reset_password]</p>
                    <p>This password reset link expire in 60 minutes.</p>
                    <p>If you did not request a password reset, no further action is required.
                    </p>
                    <p>Regards,</p>
                    <p>FindHouse</p>',
                'group' => "user",
            ],
            [
                'name' => "email_driver",
                'val' => "log",
                'group' => "email",
            ],
            [
                'name' => "email_host",
                'val' => "smtp.mailgun.org",
                'group' => "email",
            ],
            [
                'name' => "email_port",
                'val' => "587",
                'group' => "email",
            ],
            [
                'name' => "email_encryption",
                'val' => "tls",
                'group' => "email",
            ],
            [
                'name' => "email_username",
                'val' => "",
                'group' => "email",
            ],
            [
                'name' => "email_password",
                'val' => "",
                'group' => "email",
            ],
            [
                'name' => "email_mailgun_domain",
                'val' => "",
                'group' => "email",
            ],
            [
                'name' => "email_mailgun_secret",
                'val' => "",
                'group' => "email",
            ],
            [
                'name' => "email_mailgun_endpoint",
                'val' => "api.mailgun.net",
                'group' => "email",
            ],
            [
                'name' => "email_postmark_token",
                'val' => "",
                'group' => "email",
            ],
            [
                'name' => "email_ses_key",
                'val' => "",
                'group' => "email",
            ],
            [
                'name' => "email_ses_secret",
                'val' => "",
                'group' => "email",
            ],
            [
                'name' => "email_ses_region",
                'val' => "us-east-1",
                'group' => "email",
            ],
            [
                'name' => "email_sparkpost_secret",
                'val' => "",
                'group' => "email",
            ],
            [
                'name' => "booking_enquiry_type",
                'val' => "booking_and_enquiry",
                'group' => "enquiry",
            ],
            [
                'name' => "booking_enquiry_enable_mail_to_vendor",
                'val' => "1",
                'group' => "enquiry",
            ],
            [
                'name' => "booking_enquiry_mail_to_vendor_content",
                'val' => "<h3>Hello [vendor_name]</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Regards,</p>
                            <p>FindHouse</p>
                            </div>",
                'group' => "enquiry",
            ],
            [
                'name' => "booking_enquiry_enable_mail_to_admin",
                'val' => "1",
                'group' => "enquiry",
            ],
            [
                'name' => "booking_enquiry_mail_to_admin_content",
                'val' => "<h3>Hello Administrator</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Vendor:[vendor_link]</p>
                            <p>Regards,</p>
                            <p>FindHouse</p>",
                'group' => "enquiry",
            ],
            [
                'name' => "vendor_enable",
                'val' => "1",
                'group' => "agent",
            ],
            [
                'name' => "vendor_commission_type",
                'val' => "percent",
                'group' => "agent",
            ],
            [
                'name' => "vendor_commission_amount",
                'val' => "10",
                'group' => "agent",
            ],
            [
                'name' => "vendor_role",
                'val' => "2",
                'group' => "agent",
            ],
            [
                'name' => "role_verify_fields",
                'val' => '{"phone":{"name":"Phone","type":"text","roles":["1","2","3"],"required":null,"order":null,"icon":"fa fa-phone"},"id_card":{"name":"ID Card","type":"file","roles":["1","2","3"],"required":"1","order":"0","icon":"fa fa-id-card"},"trade_license":{"name":"Trade License","type":"multi_files","roles":["1","3"],"required":"1","order":"0","icon":"fa fa-copyright"}}',
                'group' => "agent",
            ],
            [
                'name' => 'enable_mail_vendor_registered',
                'val' => '1',
                'group' => 'agent'
            ],
            [
                'name' => 'vendor_content_email_registered',
                'val' => '<h1 style="text-align: center;">Welcome!</h1>
                                <h3>Hello [first_name] [last_name]</h3>
                                <p>Thank you for signing up with FindHouse! We hope you enjoy your time with us.</p>
                                <p>Please click button to verify your email address!</p>
                                <p>[button_verify]</p>
                                <p>Regards,</p>
                                <p>FindHouse</p>',
                'group' => 'agent'
            ],
            [
                'name' => 'admin_enable_mail_vendor_registered',
                'val' => '1',
                'group' => 'agent'
            ],
            [
                'name' => 'admin_content_email_vendor_registered',
                'val' => '<h3>Hello Administrator</h3>
                            <p>An user has been registered as Vendor. Please check the information bellow:</p>
                            <p>Full name: [first_name] [last_name]</p>
                            <p>Email: [email]</p>
                            <p>Registration date: [created_at]</p>
                            <p>You can approved the request here: [link_approved]</p>
                            <p>Regards,</p>
                            <p>FindHouse</p>',
                'group' => 'agent'
            ],
            [
                'name' => "cookie_agreement_enable",
                'val' => "1",
                'group' => "advance",
            ],
            [
                'name' => "cookie_agreement_button_text",
                'val' => "Got it",
                'group' => "advance",
            ],
            [
                'name' => "cookie_agreement_content",
                'val' => "<p>This website requires cookies to provide all of its features. By using our website, you agree to our use of cookies. <a href='#'>More info</a></p>",
                'group' => "advance",
            ],
            [
                'name' => 'logo_invoice_id',
                'val' => MediaFile::findMediaByName("logo")->id,
                'group' => "booking",
            ],
            [
                'name' => "invoice_company_info",
                'val' => "<p><span style=\"font-size: 14pt;\"><strong>FindHouse Company</strong></span></p>
                            <p>Ha Noi, Viet Nam</p>
                            <p>www.findhousedev.com</p>",
                'group' => "booking",
            ]
        ];
        foreach ($settings as $setting) {
            setting_update_item($setting['name'], $setting['val']);
        }
    }
}
