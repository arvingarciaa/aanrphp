<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConsortiaToLandingPageElementsTable extends Migration
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
            $table->unsignedInteger('is_consortia')->default(0)->nullable();
            $table->unsignedBigInteger('consortia_id')->nullable();
            $table->foreign('consortia_id')->references('id')->on('consortia')->onDelete('cascade');
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
            $table->dropColumn('is_consortia');
            $table->dropForeign(['consortia_id']);
            $table->dropColumn('consortia_id');
        });
    }
}
