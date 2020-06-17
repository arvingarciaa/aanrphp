<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSliderContainerToggleColumnToLandingPageElements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_page_elements', function (Blueprint $table) {
            $table->text('slider_container_toggle')->nullable();
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
            $table->dropColumn('slider_container_toggle');
        });
    }
}
