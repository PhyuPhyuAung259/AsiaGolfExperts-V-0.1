<?php

namespace  Themes\Golf\Golf;

use Modules\Core\Abstracts\BaseSettingsClass;
use Modules\Core\Models\Settings;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'golf',
                'title' => __("Golf Settings"),
                'position'=>20,
                'view'=>"Golf::admin.settings.golf",
                "keys"=>[
                    'golf_disable',
                    'golf_page_search_title',
                    'golf_page_search_banner',
                    'golf_layout_search',
                    'golf_location_search_style',
                    'golf_page_limit_item',

                    'golf_enable_review',
                    'golf_review_approved',
                    'golf_enable_review_after_booking',
                    'golf_review_number_per_page',
                    'golf_review_stats',

                    'golf_page_list_seo_title',
                    'golf_page_list_seo_desc',
                    'golf_page_list_seo_image',
                    'golf_page_list_seo_share',

                    'golf_rate_include_note',
                    'golf_booking_buyer_fees',
                    'golf_vendor_create_service_must_approved_by_admin',
                    'golf_allow_vendor_can_change_their_booking_status',
                    'golf_allow_vendor_can_change_paid_amount',
                    'golf_allow_vendor_can_add_service_fee',
                    'golf_search_fields',
                    'golf_map_search_fields',

                    'golf_allow_review_after_making_completed_booking',
                    'golf_deposit_enable',
                    'golf_deposit_type',
                    'golf_deposit_amount',
                    'golf_deposit_fomular',

                    'golf_layout_map_option',

                    'golf_booking_type',
                    'golf_icon_marker_map',

                    'golf_map_lat_default',
                    'golf_map_lng_default',
                    'golf_map_zoom_default',

                    'golf_location_search_value',
                    'golf_location_search_style',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
