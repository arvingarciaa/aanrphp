<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTextAlignAndButtonTextColumnsToLandingPageSliders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_page_sliders', function (Blueprint $table) {
            $table->text('caption_align')->nullable();
            $table->text('button_text')->nullable();
            $table->text('button_color')->nullable();
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
            $table->dropColumn('caption_align');
            $table->dropColumn('button_text');
            $table->dropColumn('button_color');
        });
    }
}
