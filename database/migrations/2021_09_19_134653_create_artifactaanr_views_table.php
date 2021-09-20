<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtifactaanrViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artifactaanr_views', function (Blueprint $table) {
            $table->increments("id");
            $table->Integer("id_artifact")->nullable();
            $table->string("title")->nullable();
            $table->string("session_id")->nullable();
            $table->string("user_id")->nullable();
            $table->string("ip")->nullable();
            $table->string("agent")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artifactaanr_views');
    }
}
