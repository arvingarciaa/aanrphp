<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingPageElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_page_elements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('top_banner')->default('5fc4a4e47e2245f8e4707e22c95e61ed578253bkm4aanr_lg_3_REVISED.png');
            $table->text('header_logo')->default('pcaarrd-logo-invert.png');
            $table->text('slider_container_toggle')->default(1);
            $table->Integer('landing_page_item_carousel')->default(1);
            $table->Integer('landing_page_item_social_media_button')->default(1);
            $table->Integer('landing_page_item_search_bar')->default(1);
            $table->Integer('landing_page_item_latest_in_aanr')->default(1);
            $table->Integer('landing_page_item_consortia')->default(1);
            $table->Integer('landing_page_item_explore_aanr')->default(1);
            $table->Integer('landing_page_item_need_help')->default(1);
            $table->Integer('landing_page_item_elib_publication')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landing_page_elements');
    }
}
