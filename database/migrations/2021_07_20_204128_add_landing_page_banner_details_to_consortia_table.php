<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLandingPageBannerDetailsToConsortiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consortia', function (Blueprint $table) {
            //
            $table->string('landing_page_link')->nullable();
            $table->text('landing_page_welcome_message')->nullable();
            $table->string('landing_page_banner_color')->nullable();
            $table->string('landing_page_button_text')->nullable();
            $table->string('landing_page_button_text_color')->nullable();;
            $table->string('landing_page_button_color')->nullable();
            $table->integer('landing_page_is_gradient')->default(1)->nullable();
            $table->string('landing_page_gradient_first')->default('#ffffff')->nullable();
            $table->string('landing_page_gradient_second')->default('#f89c0e')->nullable();
            $table->string('landing_page_gradient_direction')->default('ltr')->nullable();
            $table->string('landing_page_welcome_text_color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consortia', function (Blueprint $table) {
            //
            $table->dropColumn('landing_page_link');
            $table->dropColumn('landing_page_welcome_message');
            $table->dropColumn('landing_page_banner_color');
            $table->dropColumn('landing_page_button_text');
            $table->dropColumn('landing_page_button_text_color');
            $table->dropColumn('landing_page_button_color');
            $table->dropColumn('landing_page_is_gradient');
            $table->dropColumn('landing_page_gradient_first');
            $table->dropColumn('landing_page_gradient_second');
            $table->dropColumn('landing_page_gradient_direction');
            $table->dropColumn('landing_page_welcome_text_color');
        });
    }
}
