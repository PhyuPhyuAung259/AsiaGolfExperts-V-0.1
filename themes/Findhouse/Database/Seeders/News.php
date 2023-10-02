<?php

namespace Themes\Findhouse\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Media\Models\MediaFile;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\Tag;

class News extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('core_settings')->insert(
            [
                [
                    'name' => 'news_page_list_title',
                    'val' => 'News',
                    'group' => "news",
                ],
                [
                    'name' => 'news_page_list_banner',
                    'val' => MediaFile::findMediaByName("news-banner")->id,
                    'group' => "news",
                ],
                [
                    'name' => 'news_sidebar',
                    'val' => '[
                        {"title":null,"content":null,"type":"search_form"},
                        {"title":"Featured Listings","content":null,"type":"featured_listings"},
                        {"title":"Categories","content":null,"type":"category"},
                        {"title":"Tags","content":null,"type":"tag"}
                    ]',
                    'group' => "news",
                ],
            ]
        );

        $list_categories = [
            ['name' => 'Apartment', 'slug' => 'apartment', 'status' => 'publish']
            , ['name' => 'Condo', 'slug' => 'condo', 'status' => 'publish']
            , ['name' => 'Family House', 'slug' => 'family-house', 'status' => 'publish']
            , ['name' => 'Modern Villa', 'slug' => 'modern-villa', 'status' => 'publish']
            , ['name' => 'Town House', 'slug' => 'town-house', 'status' => 'publish']
        ];
        foreach ($list_categories as $category) {
            $row = new NewsCategory($category);
            $row->save();
        }
        $list_tags = [
            ['name' => 'Apartment', 'slug' => 'apartment'],
            ['name' => 'Real Estate', 'slug' => 'real-estate'],
            ['name' => 'Estate', 'slug' => 'estate'],
            ['name' => 'Luxury', 'slug' => 'luxury'],
            ['name' => 'Real', 'slug' => 'real'],
        ];
        foreach ($list_tags as $tag) {
            $row = new Tag($tag);
            $row->save();
        }


        DB::table('core_news_tag')->insert([
            [
                'news_id' => 1,
                'tag_id' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'news_id' => 2,
                'tag_id' => 2,
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);


        DB::table('core_news')->insert([
            'title' => 'Redfin Ranks the Most Competitive Neighborhoods of 2020',
            'slug' => Str::slug('Redfin Ranks the Most Competitive Neighborhoods of 2020', '-'),
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin. Donec non odio neque. Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.',
            'status' => "publish",
            'cat_id' => rand(1, 4),
            'image_id' => MediaFile::findMediaByName("news-" . rand(1, 3))->id,
            'author_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_news')->insert([
            'title' => 'Pure Luxe in Punta Mita',
            'slug' => Str::slug('Pure Luxe in Punta Mita', '-'),
            'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
            'status' => "publish",
            'cat_id' => rand(1, 4),
            'image_id' => MediaFile::findMediaByName("news-" . rand(1, 3))->id,
            'author_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_news')->insert([
            'title' => 'All Aboard the Rocky Mountaineer',
            'slug' => Str::slug('All Aboard the Rocky Mountaineer', '-'),
            'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
            'status' => "publish",
            'cat_id' => rand(1, 4),
            'image_id' => MediaFile::findMediaByName("news-" . rand(1, 3))->id,
            'author_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_news')->insert([
            'title' => 'City Spotlight: Philadelphia',
            'slug' => Str::slug('City Spotlight: Philadelphia', '-'),
            'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
            'status' => "publish",
            'cat_id' => rand(1, 4),
            'image_id' => MediaFile::findMediaByName("news-" . rand(1, 3))->id,
            'author_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_news')->insert([
            'title' => 'Tiptoe through the Tulips of Washington',
            'slug' => Str::slug('Tiptoe through the Tulips of Washington', '-'),
            'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
            'status' => "publish",
            'cat_id' => rand(1, 4),
            'image_id' => MediaFile::findMediaByName("news-" . rand(1, 3))->id,
            'author_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_news')->insert([
            'title' => 'A Seaside Reset in Laguna Beach',
            'slug' => Str::slug('A Seaside Reset in Laguna Beach', '-'),
            'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
            'status' => "publish",
            'cat_id' => rand(1, 4),
            'image_id' => MediaFile::findMediaByName("news-" . rand(1, 3))->id,
            'author_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_news')->insert([
            'title' => 'America  National Parks with Denver',
            'slug' => Str::slug('America  National Parks with Denver', '-'),
            'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
            'status' => "publish",
            'cat_id' => rand(1, 4),
            'image_id' => MediaFile::findMediaByName("news-" . rand(1, 3))->id,
            'author_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('core_news')->insert([
            'title' => 'Morning in the Northern sea',
            'slug' => Str::slug('Morning in the Northern sea', '-'),
            'content' => ' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>
    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',
            'status' => "publish",
            'cat_id' => rand(1, 4),
            'image_id' => MediaFile::findMediaByName("news-" . rand(1, 3))->id,
            'author_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
