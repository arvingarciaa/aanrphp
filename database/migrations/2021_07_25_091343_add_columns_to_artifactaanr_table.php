<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToArtifactaanrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artifactaanr', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('consortia_member_id')->nullable();
            $table->foreign('consortia_member_id')->references('id')->on('consortia_members')->onDelete('cascade');
            $table->time('event_time')->default('00:00:00');
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
            //
            $table->dropForeign(['consortia_member_id']);
            $table->dropColumn('consortia_member_id');
            $table->dropColumn('event_time');
        });
    }
}
