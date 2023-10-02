<?php

namespace Themes\Findhouse\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Media\Models\MediaFile;
use Themes\Findhouse\Property\Models\Property;
use Themes\Findhouse\Property\Models\PropertyCategory;
use Modules\Review\Models\Review;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     */
    public function run()
    {

        $categories = [
            ['name' => 'Apartment', 'icon' => 'flaticon-building', 'content' => '', 'status' => 'publish',],
            ['name' => 'Condo', 'icon' => 'flaticon-house-2', 'content' => '', 'status' => 'publish',],
            ['name' => 'Family House', 'icon' => 'flaticon-house-1', 'content' => '', 'status' => 'publish',],
            ['name' => 'Modern Villa', 'icon' => 'flaticon-house', 'content' => '', 'status' => 'publish',],
            ['name' => 'Town House', 'icon' => 'flaticon-house-2', 'content' => '', 'status' => 'publish',]
        ];

        foreach ($categories as $category) {
            $row = new PropertyCategory($category);
            $row->save();
        }

        $list_gallery = [];
        for ($i = 1; $i <= 5; $i++) {
            $list_gallery[] = MediaFile::findMediaByName("property-gallery-" . $i)->id;
        }

        $IDs_vendor[] = $create_user = '1';
        $IDs[] = DB::table('bravo_properties')->insertGetId(
            [
                'title' => 'Renovated Apartment',
                'slug' => Str::slug('Renovated Apartment', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("property-1")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-single-' . rand(1, 3))->id,
                'address' => "1421 San Pedro St, Los Angeles, CA 90015",
                'is_featured' => rand(0, 1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "300",
                'sale_price' => rand(100, 800),
                'map_lat' => "51.528564",
                'map_lng' => "-0.203010",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'bed' => rand(3, 10),
                'bathroom' => rand(1, 10),
                'square' => rand(100, 200),
                'max_guests' => rand(5, 10),
                'is_instant' => rand(0, 1),
                'category_id' => 1,
                'location_id' => 1,
                'enable_extra_price' => '1',
                //additional attributes
                'deposit' => '20',
                'pool_size' => '300',
                'remodal_year' => '1987',
                'amenities' => 'Clubhouse',
                'additional_zoom' => 'Guest Bath',
                'equipment' => 'Grill - Gas',

                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
                'property_type' => 1,
            ]);

        $IDs_vendor[] = $create_user = '9';
        $IDs[] = DB::table('bravo_properties')->insertGetId(
            [
                'title' => 'Gorgeous Villa Bay View',
                'slug' => Str::slug('Gorgeous Villa Bay View', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("property-2")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-single-' . rand(1, 3))->id,
                'address' => "1421 San Pedro St, Los Angeles, CA 90015",
                'is_featured' => rand(0, 1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "900",
                'sale_price' => '',
                'map_lat' => "51.519592",
                'map_lng' => "-0.226346",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'bed' => rand(3, 10),
                'bathroom' => rand(1, 10),
                'square' => rand(100, 200),
                'max_guests' => rand(5, 10),
                'is_instant' => rand(0, 1),
                'category_id' => 2,
                'location_id' => 3,
                'enable_extra_price' => '1',
                //additional attributes
                'deposit' => '20',
                'pool_size' => '300',
                'remodal_year' => '1987',
                'amenities' => 'Clubhouse',
                'additional_zoom' => 'Guest Bath',
                'equipment' => 'Grill - Gas',

                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
                'property_type' => 1,
            ]);

        $IDs_vendor[] = $create_user = rand(4, 13);
        $IDs[] = DB::table('bravo_properties')->insertGetId(
            [
                'title' => 'Luxury Family Home',
                'slug' => Str::slug('Luxury Family Home', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("property-3")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-single-' . rand(1, 3))->id,
                'location_id' => 3,
                'address' => "1421 San Pedro St, Los Angeles, CA 90015",
                'is_featured' => rand(0, 1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "650",
                'sale_price' => '',
                'map_lat' => "51.461875",
                'map_lng' => "-0.211246",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'bed' => rand(3, 10),
                'bathroom' => rand(1, 10),
                'square' => rand(100, 200),
                'max_guests' => rand(5, 10),
                'is_instant' => rand(0, 1),
                'category_id' => 2,
                'location_id' => 3,
                'enable_extra_price' => '1',
                //additional attributes
                'deposit' => '20',
                'pool_size' => '300',
                'remodal_year' => '1987',
                'amenities' => 'Clubhouse',
                'additional_zoom' => 'Guest Bath',
                'equipment' => 'Grill - Gas',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
                'property_type' => 1,
            ]);

        $IDs[] = DB::table('bravo_properties')->insertGetId(
            [
                'title' => 'Luxury Family Home',
                'slug' => Str::slug('Luxury Family Home', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("property-4")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-single-' . rand(1, 3))->id,
                'location_id' => 4,
                'address' => "1421 San Pedro St, Los Angeles, CA 90015",
                'is_featured' => rand(0, 1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "800",
                'sale_price' => '',
                'map_lat' => "51.427638",
                'map_lng' => "-0.170752",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'bed' => rand(3, 10),
                'bathroom' => rand(1, 10),
                'square' => rand(100, 200),
                'max_guests' => rand(5, 10),
                'is_instant' => rand(0, 1),
                'category_id' => 3,
                'location_id' => 2,
                'enable_extra_price' => '1',
                //additional attributes
                'deposit' => '20',
                'pool_size' => '300',
                'remodal_year' => '1987',
                'amenities' => 'Clubhouse',
                'additional_zoom' => 'Guest Bath',
                'equipment' => 'Grill - Gas',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
                'property_type' => 1,
            ]);

        $IDs[] = DB::table('bravo_properties')->insertGetId(
            [
                'title' => 'Renovated Apartment',
                'slug' => Str::slug('Renovated Apartment', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("property-5")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-single-' . rand(1, 3))->id,
                'location_id' => 1,
                'address' => "1421 San Pedro St, Los Angeles, CA 90015",
                'is_featured' => rand(0, 1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "220",
                'sale_price' => '',
                'map_lat' => "51.442192",
                'map_lng' => "-0.043778",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'bed' => rand(3, 10),
                'bathroom' => rand(1, 10),
                'square' => rand(100, 200),
                'max_guests' => rand(5, 10),
                'is_instant' => rand(0, 1),
                'category_id' => 1,
                'location_id' => 4,
                'enable_extra_price' => '1',
                //additional attributes
                'deposit' => '20',
                'pool_size' => '300',
                'remodal_year' => '1987',
                'amenities' => 'Clubhouse',
                'additional_zoom' => 'Guest Bath',
                'equipment' => 'Grill - Gas',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
                'property_type' => 1,
            ]);

        $IDs[] = DB::table('bravo_properties')->insertGetId(
            [
                'title' => 'Gorgeous Villa Bay View',
                'slug' => Str::slug('Gorgeous Villa Bay View', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("property-6")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-single-' . rand(1, 3))->id,
                'location_id' => 1,
                'address' => "1421 San Pedro St, Los Angeles, CA 90015",
                'is_featured' => rand(0, 1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "320",
                'sale_price' => '',
                'map_lat' => "51.475135",
                'map_lng' => "0.003592",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'bed' => rand(3, 10),
                'bathroom' => rand(1, 10),
                'square' => rand(100, 200),
                'max_guests' => rand(5, 10),
                'is_instant' => rand(0, 1),
                'category_id' => 2,
                'location_id' => 4,
                'enable_extra_price' => '1',
                //additional attributes
                'deposit' => '20',
                'pool_size' => '300',
                'remodal_year' => '1987',
                'amenities' => 'Clubhouse',
                'additional_zoom' => 'Guest Bath',
                'equipment' => 'Grill - Gas',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
                'property_type' => 1,
            ]);

        $IDs[] = DB::table('bravo_properties')->insertGetId(
            [
                'title' => 'EAST VILLAGE',
                'slug' => Str::slug('EAST VILLAGE', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("property-7")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-single-' . rand(1, 3))->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0, 1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "300",
                'sale_price' => '260',
                'map_lat' => "51.524292",
                'map_lng' => "-0.022489",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'bed' => rand(3, 10),
                'bathroom' => rand(1, 10),
                'square' => rand(100, 200),
                'max_guests' => rand(5, 10),
                'is_instant' => rand(0, 1),
                'category_id' => 3,
                'location_id' => 3,
                'enable_extra_price' => '1',
                //additional attributes
                'deposit' => '20',
                'pool_size' => '300',
                'remodal_year' => '1987',
                'amenities' => 'Clubhouse',
                'additional_zoom' => 'Guest Bath',
                'equipment' => 'Grill - Gas',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
                'property_type' => 1,
            ]);

        $IDs[] = DB::table('bravo_properties')->insertGetId(
            [
                'title' => 'PARIS GREENWICH VILLA',
                'slug' => Str::slug('PARIS GREENWICH VILLA', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("property-8")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-single-' . rand(1, 3))->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0, 1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "500",
                'sale_price' => '',
                'map_lat' => "51.556749",
                'map_lng' => "-0.091124",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'bed' => rand(3, 10),
                'bathroom' => rand(1, 10),
                'square' => rand(100, 200),
                'max_guests' => rand(5, 10),
                'is_instant' => rand(0, 1),
                'category_id' => 4,
                'location_id' => 1,
                'enable_extra_price' => '1',
                //additional attributes
                'deposit' => '20',
                'pool_size' => '300',
                'remodal_year' => '1987',
                'amenities' => 'Clubhouse',
                'additional_zoom' => 'Guest Bath',
                'equipment' => 'Grill - Gas',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
                'property_type' => 1,
            ]);

        $IDs[] = DB::table('bravo_properties')->insertGetId(
            [
                'title' => 'LUXURY SINGLE',
                'slug' => Str::slug('LUXURY SINGLE', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("property-9")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-single-' . rand(1, 3))->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0, 1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "400",
                'sale_price' => '350',
                'map_lat' => "51.569555",
                'map_lng' => "0.012563",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'bed' => rand(3, 10),
                'bathroom' => rand(1, 10),
                'square' => rand(100, 200),
                'max_guests' => rand(5, 10),
                'is_instant' => rand(0, 1),
                'category_id' => 2,
                'location_id' => 5,
                'enable_extra_price' => '1',
                //additional attributes
                'deposit' => '20',
                'pool_size' => '300',
                'remodal_year' => '1987',
                'amenities' => 'Clubhouse',
                'additional_zoom' => 'Guest Bath',
                'equipment' => 'Grill - Gas',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
                'property_type' => 1,
            ]);

        $IDs_vendor[] = $create_user = "1";
        $IDs[] = DB::table('bravo_properties')->insertGetId(
            [
                'title' => 'LILY DALE VILLAGE',
                'slug' => Str::slug('LILY DALE VILLAGE', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("property-10")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-single-' . rand(1, 3))->id,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0, 1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "250",
                'sale_price' => '',
                'map_lat' => "51.517883",
                'map_lng' => "-0.134314",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'bed' => rand(3, 10),
                'bathroom' => rand(1, 10),
                'square' => rand(100, 200),
                'max_guests' => rand(5, 10),
                'category_id' => 5,
                'location_id' => 2,
                'is_instant' => rand(0, 1),
                'enable_extra_price' => '1',
                //additional attributes
                'deposit' => '20',
                'pool_size' => '300',
                'remodal_year' => '1987',
                'amenities' => 'Clubhouse',
                'additional_zoom' => 'Guest Bath',
                'equipment' => 'Grill - Gas',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
                'property_type' => 1,
            ]);

        $IDs[] = DB::table('bravo_properties')->insertGetId(
            [
                'title' => 'STAY GREENWICH VILLAGE',
                'slug' => Str::slug('STAY GREENWICH VILLAGE', '-'),
                'content' => "<p>Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p>Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh's The Starry Night</li><li>Check out Campbell's Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>",
                'image_id' => MediaFile::findMediaByName("property-11")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-single-2')->id,
                'location_id' => 1,
                'address' => "Porte de Vanves",
                'is_featured' => rand(0, 1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price' => "300",
                'sale_price' => '150',
                'map_lat' => "51.514892",
                'map_lng' => "-0.176181",
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'author_id' => $create_user,
                'created_at' => date("Y-m-d H:i:s"),
                'bed' => rand(3, 10),
                'bathroom' => rand(1, 10),
                'square' => rand(100, 200),
                'max_guests' => rand(5, 10),
                'category_id' => 4,
                'location_id' => 3,
                'is_instant' => rand(0, 1),
                'enable_extra_price' => '1',
                //additional attributes
                'deposit' => '20',
                'pool_size' => '300',
                'remodal_year' => '1987',
                'amenities' => 'Clubhouse',
                'additional_zoom' => 'Guest Bath',
                'equipment' => 'Grill - Gas',
                'extra_price' => '[{"name":"Lawn garden","price":"100","type":"one_time"},{"name":"Clearning","price":"100","type":"one_time"},{"name":"Breakfasts","price":"200","type":"one_time"}]',
                'property_type' => 1,
            ]);

        // Add meta
        foreach ($IDs as $numer_key => $property) {
            $vendor_id = $IDs_vendor[rand(0,count($IDs_vendor) - 1)];
            $titles = ["Great Trip", "Good Trip", "Trip was great", "Easy way to discover the city"];
            $review = new Review([
                "object_id" => $property,
                "object_model" => "property",
                "title" => $titles[rand(0, 3)],
                "content" => "Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te",
                "rate_number" => rand(1, 5),
                "author_ip" => "127.0.0.1",
                "status" => "approved",
                "publish_date" => date("Y-m-d H:i:s"),
                'author_id' => rand(7, 16),
                'vendor_id' => $vendor_id,
            ]);
            $review->save();
        }

        // Settings
        $settings =
            [
                [
                    'name' => 'property_page_search_title',
                    'val' => 'Search for property',
                    'group' => "property",
                ],
                [
                    'name' => 'property_page_search_banner',
                    'val' => MediaFile::findMediaByName("banner-search-property-2")->id,
                    'group' => "property",
                ],
                [
                    'name' => 'property_layout_search',
                    'val' => 'normal',
                    'group' => "property",
                ],
                [
                    'name' => 'property_category_attribute',
                    'val' => '5',
                    'group' => "property",
                ],
                [
                    'name' => 'property_enable_review',
                    'val' => '1',
                    'group' => "property",
                ],
                [
                    'name' => 'property_review_approved',
                    'val' => '0',
                    'group' => "property",
                ],
                [
                    'name' => 'property_review_stats',
                    'val' => '[{"title":"Sleep"},{"title":"Location"},{"title":"Service"},{"title":"Clearness"},{"title":"Rooms"}]',
                    'group' => "property",
                ],
                [
                    'name' => 'property_booking_buyer_fees',
                    'val' => '[{"name":"Cleaning fee","desc":"One-time fee charged by host to cover the cost of cleaning their property.","name_ja":"\u30af\u30ea\u30fc\u30cb\u30f3\u30b0\u4ee3","desc_ja":"\u30b9\u30da\u30fc\u30b9\u3092\u6383\u9664\u3059\u308b\u8cbb\u7528\u3092\u30db\u30b9\u30c8\u304c\u8acb\u6c42\u3059\u308b1\u56de\u9650\u308a\u306e\u6599\u91d1\u3002","price":"100","type":"one_time"},{"name":"Service fee","desc":"This helps us run our platform and offer services like 24\/7 support on your trip.","name_ja":"\u30b5\u30fc\u30d3\u30b9\u6599","desc_ja":"\u3053\u308c\u306b\u3088\u308a\u3001\u5f53\u793e\u306e\u30d7\u30e9\u30c3\u30c8\u30d5\u30a9\u30fc\u30e0\u3092\u5b9f\u884c\u3057\u3001\u65c5\u884c\u4e2d\u306b","price":"200","type":"one_time"}]',
                    'group' => "property",
                ],
                [
                    'name' => 'property_map_search_fields',
                    'val' => '[{"field":"location","attr":null,"position":"1","size":2},{"field":"type","attr":null,"position":"2","size":2},{"field":"keyword","attr":null,"position":"3","size":6},{"field":"advance","attr":null,"position":"5","size":2}]',
                    'group' => 'property'
                ],
                [
                    'name' => 'property_search_fields',
                    'val' => '[{"title":"Location","field":"location","position":"2"},{"title":"Property Name","field":"service_name","position":"1"},{"title":"Property Category","field":"category","position":"3"},{"title":"Property Type","field":"property_type","position":"4"},{"title":"Bathrooms","field":"bathrooms","position":"5"},{"title":"Bedrooms","field":"bedrooms","position":"6"},{"title":"Garages","field":"garages","position":"7"},{"title":"Price","field":"price","position":"8"},{"title":"Year built","field":"year_built","position":"9"},{"title":"Amenities","field":"amenities-1|6","position":"10"}]',
                ],
                [
                    'name' => 'property_map_lat_default',
                    'val' => 52.355518,
                ],
                [
                    'name' => 'property_map_lng_default',
                    'val' => -1.174320,
                ],
            ];
        foreach ($settings as $setting){
            setting_update_item($setting['name'],$setting['val']);
        }

        $property_type = new \Modules\Core\Models\Attributes([
            'name' => 'Property Type',
            'service' => 'property'
        ]);

        $property_type->save();

        foreach (['Auditorium', 'Bar', 'Cafe', 'Ballroom', 'Dance Studio', 'Office', 'Party Hall', 'Recording Studio', 'Yoga Studio', 'Villa', 'Warehouse'] as $k => $term) {
            $t = new \Modules\Core\Models\Terms([
                'name' => $term,
                'attr_id' => $property_type->id,
            ]);
            $t->save();
        }

        $a = new \Modules\Core\Models\Attributes([
            'name' => 'Amenities',
            'service' => 'property'
        ]);

        $a->save();

        $term_ids = [];

        foreach (['Air Conditioning', 'Breakfast', 'Kitchen', 'Parking', 'Pool', 'Wi-Fi Internet'] as $k => $term) {
            $t = new \Modules\Core\Models\Terms([
                'name' => $term,
                'attr_id' => $a->id,
                'image_id' => MediaFile::findMediaByName("icon-property-box-" . ($k + 1))->id
            ]);
            $t->save();
            $term_ids[] = $t->id;
        }

        foreach ($IDs as $property_id) {
            foreach ($term_ids as $k => $term_id) {

                if (rand(0, count($term_ids)) == $k) continue;
                if (rand(0, count($term_ids)) == $k) continue;
                if (rand(0, count($term_ids)) == $k) continue;

                \Themes\Findhouse\Property\Models\PropertyTerm::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $property_id
                ]);
            }
        }
        //Update Review Score
        foreach ($IDs as $service_id) {
            \Themes\Findhouse\Property\Models\Property::find($service_id)->update_service_rate();
        }

        $all = Property::query()->get();
        foreach ($all as $item){
            $item->bed = rand(3, 10);
            $item->save();
        }
    }
}
