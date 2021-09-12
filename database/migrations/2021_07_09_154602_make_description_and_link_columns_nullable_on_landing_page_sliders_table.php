<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeDescriptionAndLinkColumnsNullableOnLandingPageSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('landing_page_sliders', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
            $table->text('link')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('landing_page_sliders', function (Blueprint $table) {
            $table->text('link')->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
        });
    }
}
