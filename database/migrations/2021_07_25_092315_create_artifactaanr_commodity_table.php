<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtifactaanrCommodityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artifactaanr_commodity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
  
            $table->bigInteger('artifactaanr_id')->unsigned();
            $table->foreign('artifactaanr_id')->references('id')->on('artifactaanr')->onDelete('cascade');

            $table->bigInteger('commodity_id')->unsigned();
            $table->foreign('commodity_id')->references('id')->on('commodities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artifactaanr_commodity', function($table){
            $table->dropForeign(['artifactaanr_id']);
            $table->dropColumn('artifactaanr_id');
            $table->dropForeign(['commodity_id']);
            $table->dropColumn('commodity_id');
        });
        Schema::dropIfExists('artifactaanr_commodity');
    }
}
