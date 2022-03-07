<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FooterLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footer_links')->insert([
            'name' => 'DOST PCAARRD',
            'link' => 'http://www.pcaarrd.dost.gov.ph/home/portal/',
            'position' => 5,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('footer_links')->insert([
            'name' => 'About Us',
            'link' => '/about',
            'position' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('footer_links')->insert([
            'name' => 'FIESTA',
            'link' => 'www.fiesta.aanr.ph',
            'position' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('footer_links')->insert([
            'name' => 'Technology',
            'link' => 'www.techdashboard.aanr.ph',
            'position' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('footer_links')->insert([
            'name' => 'Community',
            'link' => 'www.community.aanr.ph',
            'position' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
