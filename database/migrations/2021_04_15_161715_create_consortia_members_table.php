<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsortiaMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consortia_members', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('name', 255);
            $table->char('acronym', 30)->nullable();
            $table->text('profile')->nullable();
            $table->char('contact_name', 150)->nullable();
            $table->text('contact_details')->nullable();
            $table->char('website', 200)->nullable();
            $table->unsignedBigInteger('consortia_id');
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
        Schema::table('consortia_members', function($table){
            $table->dropForeign(['consortia_id']);
            $table->dropColumn('consortia_id');
        });
        Schema::dropIfExists('consortia_members');
    }
}
