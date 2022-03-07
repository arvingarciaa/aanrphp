<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FooterInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('footer_info')->insert([
            'about' => 'KM4AANR.ph is an online database dedicated to Agriculture, Aquatic and Natural Resources news, updates, and content from different platforms. This project is funded by DOST-PCAARRD',
            'phone_number' => '(+63 49) 554 9670',
            'address' => 'Paseo de Valmayor, Timugan, Economic Garden Los Baños, Laguna 4030 Philippines',
            'email' => 'km4aanr@gmail.com',
            'fb_link' => 'https://www.facebook.com/PCAARRD/',
            'twitter_link' => 'https://twitter.com/dostpcaarrd/',
            'instagram_link' => 'https://www.instagram.com/dostpcaarrd/',
            'youtube_link' => 'https://www.youtube.com/c/DOSTPCAARRD/videos',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
