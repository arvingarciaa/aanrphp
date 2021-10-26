<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HeaderLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('header_links')->insert([
            'name' => 'Home',
            'link' => '/',
            'position' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('header_links')->insert([
            'name' => 'About Us',
            'link' => '/about',
            'position' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('header_links')->insert([
            'name' => 'FIESTA',
            'link' => 'fiesta.aanr.ph',
            'position' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('header_links')->insert([
            'name' => 'Technology',
            'link' => 'techdashboard.aanr.ph',
            'position' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('header_links')->insert([
            'name' => 'Community',
            'link' => 'community.aanr.ph',
            'position' => 5,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
