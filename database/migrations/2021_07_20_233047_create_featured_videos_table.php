<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_videos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('link')->nullable();
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
        Schema::table('featured_videos', function (Blueprint $table) {
            //
            $table->dropForeign(['consortia_id']);
            $table->dropColumn('consortia_id');
        });
        Schema::dropIfExists('featured_videos');
    }
}
