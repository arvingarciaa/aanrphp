<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSubtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_subtypes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('name', 50);
            $table->unsignedBigInteger('content_id');
            $table->foreign('content_id')->references('id')->on('content')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content_subtypes', function($table){
            $table->dropForeign(['content_id']);
            $table->dropColumn('content_id');
        });
        Schema::dropIfExists('content_subtype');
    }
}
