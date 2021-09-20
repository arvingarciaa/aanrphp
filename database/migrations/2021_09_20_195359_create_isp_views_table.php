<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIspViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isp_views', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->Integer("id_isp")->nullable();
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
        Schema::dropIfExists('isp_views');
    }
}
