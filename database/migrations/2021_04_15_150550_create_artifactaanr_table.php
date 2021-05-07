<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtifactaanrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artifactaanr', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('title', 100);
            $table->date('date_published')->nullable();
            $table->text('description')->nullable();
            $table->char('content', 100)->nullable();
            $table->integer('subcontent_id')->nullable();
            $table->char('link', 255)->nullable();
            $table->unsignedBigInteger('industry_id');
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
            $table->char('imglink', 255)->nullable();
            $table->char('author', 255)->nullable();
            $table->text('keywords')->nullable();
            $table->boolean('gad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artifactaanr', function($table){
            $table->dropForeign(['industry_id']);
            $table->dropColumn('industry_id');
        });
        Schema::dropIfExists('artifactaanr');
    }
}
