<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBannerColorsToConsortiaMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consortia_members', function (Blueprint $table) {
            $table->integer('is_gradient')->default(1)->nullable();
            $table->string('gradient_first')->default('#ffffff')->nullable();
            $table->string('gradient_second')->default('#f89c0e')->nullable();
            $table->string('gradient_direction')->default('ltr')->nullable();
            $table->string('banner_color')->default('#ffffff')->nullable();
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
        Schema::table('consortia_members', function (Blueprint $table) {
            $table->dropColumn('is_gradient');
            $table->dropColumn('gradient_first');
            $table->dropColumn('gradient_second');
            $table->dropColumn('gradient_direction');
            $table->dropColumn('banner_color');
            $table->dropColumn('button_text');
        });
    }
}
