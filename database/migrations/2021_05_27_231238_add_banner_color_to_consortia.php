<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBannerColorToConsortia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consortia', function (Blueprint $table) {
            $table->string('banner_color')->nullable();
            $table->string('button_text')->nullable();
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
            $table->dropColumn('banner_color');
            $table->dropColumn('button_text');
        });
    }
}
