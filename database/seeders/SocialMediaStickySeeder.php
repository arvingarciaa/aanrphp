<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SocialMediaStickySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_media_sticky')->insert([
            'name' => 'PCAARRD',
            'image' => 'TRr6O4s.png',
            'link' => 'http://www.pcaarrd.dost.gov.ph/home/portal/',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('social_media_sticky')->insert([
            'name' => 'Facebook',
            'image' => null,
            'link' => 'https://www.facebook.com/PCAARRD/',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('social_media_sticky')->insert([
            'name' => 'Twitter',
            'image' => null,
            'link' => 'https://twitter.com/dostpcaarrd/',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('social_media_sticky')->insert([
            'name' => 'YouTube',
            'image' => null,
            'link' => 'https://www.youtube.com/c/DOSTPCAARRD/videos',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('social_media_sticky')->insert([
            'name' => 'Email',
            'image' => null,
            'link' => 'a.cabrera@pcaarrd.dost.gov.ph/',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('social_media_sticky')->insert([
            'name' => 'Survey Form',
            'image' => null,
            'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSccdMrmX86mEkXGzui_hgqwpUaVPWln6lNsN8d4afQHp7c1oQ/viewform?usp=sf_link',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
