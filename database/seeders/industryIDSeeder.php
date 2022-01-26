<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class industryIDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach(DB::table('artifactaanr_isp')->get() as $entry){
            $temp_sector_id = DB::table('isp')->where('id', '=', $entry->isp_id)->first()->sector_id;
            $temp_industry_id = DB::table('sectors')->where('id', '=', $temp_sector_id)->first()->industry_id;
            DB::table('artifactaanr_isp')->where('id', '=', $entry->id)->update(['industry_id' => DB::table('industries')->where('id', '=', $temp_industry_id)->first()->id]);
        }
        foreach(DB::table('artifactaanr_commodity')->get() as $entry){
            $temp_isp_id = DB::table('commodities')->where('id', '=', $entry->commodity_id)->first()->isp_id;
            $temp_sector_id = DB::table('isp')->where('id', '=', $temp_isp_id)->first()->sector_id;
            $temp_industry_id = DB::table('sectors')->where('id', '=', $temp_sector_id)->first()->industry_id;
            DB::table('artifactaanr_commodity')->where('id', '=', $entry->id)->update(['industry_id' => DB::table('industries')->where('id', '=', $temp_industry_id)->first()->id]);
        }
    }
}
