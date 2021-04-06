<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'superadmin',
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
            'email' => 'superadmin@gmail.com',
            'user_level' => 5,
            'password' => bcrypt('password')
        ]);
    }
}
