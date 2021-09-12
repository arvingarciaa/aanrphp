<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConsortiaIdToArtifactaanrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artifactaanr', function (Blueprint $table) {
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
        Schema::table('artifactaanr', function (Blueprint $table) {
            $table->dropForeign(['consortia_id']);
            $table->dropColumn('consortia_id');
        });
    }
}
