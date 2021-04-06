<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->insert([
            'name' => 'Agriculture',
            'user_id' => 1,
            'thumbnail' => '5dea015236480aanr_crops.jpg',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('industries')->insert([
            'name' => 'Aquatic Resources',
            'user_id' => 1,
            'thumbnail' => 'aanr_aquatic.jpg',
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('industries')->insert([
            'name' => 'Natural Resources',
            'thumbnail' => 'aanr_forestenvi.jpg',
            'user_id' => 1,
            'approved' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
