<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtifactaanrIspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artifactaanr_isp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('artifactaanr_id')->unsigned();
            $table->foreign('artifactaanr_id')->references('id')->on('artifactaanr');

            $table->bigInteger('isp_id')->unsigned();
            $table->foreign('isp_id')->references('id')->on('isp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artifactaanr_isp', function($table){
            $table->dropForeign(['artifactaanr_id']);
            $table->dropColumn('artifactaanr_id');
            $table->dropForeign(['isp_id']);
            $table->dropColumn('isp_id');
        });
        Schema::dropIfExists('artifactaanr_isp');
    }
}
