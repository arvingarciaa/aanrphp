<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndutryProfileTextToLandingPageElements extends Migration
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
            $table->longtext('agriculture_profile')->nullable();
            $table->longtext('aquatic_profile')->nullable();
            $table->longtext('natural_profile')->nullable();
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
            $table->dropColumn('agriculture_profile');
            $table->dropColumn('aquatic_profile');
            $table->dropColumn('natural_profile');
        });
    }
}
