<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndustryProfileLogosToLandingPageElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_page_elements', function (Blueprint $table) {
            //
            $table->text('industry_profile_agri_bg')->nullable();
            $table->text('industry_profile_agri_icon')->nullable();
            $table->text('industry_profile_aqua_bg')->nullable();
            $table->text('industry_profile_aqua_icon')->nullable();
            $table->text('industry_profile_natural_bg')->nullable();
            $table->text('industry_profile_natural_icon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_page_elements', function (Blueprint $table) {
            //
            $table->dropColumn('industry_profile_agri_bg');
            $table->dropColumn('industry_profile_agri_icon');
            $table->dropColumn('industry_profile_aqua_bg');
            $table->dropColumn('industry_profile_aqua_icon');
            $table->dropColumn('industry_profile_natural_bg');
            $table->dropColumn('industry_profile_natural_icon');
        });
    }
}
