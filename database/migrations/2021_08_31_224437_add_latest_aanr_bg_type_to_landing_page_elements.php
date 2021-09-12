<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatestAanrBgTypeToLandingPageElements extends Migration
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
            
            $table->text('latest_aanr_bg')->nullable()->default('#282D30')->change();
            $table->string('latest_aanr_bg_type')->nullable()->default('1');
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
            $table->text('latest_aanr_bg')->nullable()->change();
            $table->dropColumn('latest_aanr_bg_type');
        });
    }
}
