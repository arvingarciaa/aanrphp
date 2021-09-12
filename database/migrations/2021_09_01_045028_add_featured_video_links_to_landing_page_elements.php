<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturedVideoLinksToLandingPageElements extends Migration
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
            $table->string('featured_video_link_1')->nullable()->default('https://www.youtube.com/embed/7ouQh5WWXJ0');
            $table->string('featured_video_link_2')->nullable();
            $table->string('featured_video_link_3')->nullable();
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
            $table->dropColumn('featured_video_link_1');
            $table->dropColumn('featured_video_link_2');
            $table->dropColumn('featured_video_link_3');
        });
    }
}
