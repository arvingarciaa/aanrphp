<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoToLandingPageSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_page_sliders', function (Blueprint $table) {
            //
            $table->unsignedInteger('is_video')->default(0)->nullable();
            $table->string('video_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_page_sliders', function (Blueprint $table) {
            //
            $table->dropColumn('is_video');
            $table->dropColumn('video_link');
        });
    }
}
