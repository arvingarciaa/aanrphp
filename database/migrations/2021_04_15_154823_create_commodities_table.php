<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommoditiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('name', 100);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('isp_id');
            $table->foreign('isp_id')->references('id')->on('isp')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commodities', function($table){
            $table->dropForeign(['isp_id']);
            $table->dropColumn('isp_id');
        });
        Schema::dropIfExists('commodities');
    }
}
