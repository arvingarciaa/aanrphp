<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommodityViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity_views', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->Integer("id_commodity")->nullable();
            $table->string("name")->nullable();
            $table->string("session_id")->nullable();
            $table->string("user_id")->nullable();
            $table->string("ip")->nullable();
            $table->string("agent")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commodity_views');
    }
}
