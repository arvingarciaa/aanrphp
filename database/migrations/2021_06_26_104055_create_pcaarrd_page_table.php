<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcaarrdPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcaarrd_page', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('profile')->nullable();
            $table->char('contact_name', 150)->nullable();
            $table->text('contact_details')->nullable();
            $table->string('short_name', 255)->default('DOST-PCAARRD');
            $table->string('full_name', 350)->default('The Philippine Council for Agriculture, Aquatic, and Natural Resources Research and Development');
            $table->text('thumbnail')->nullable();
            $table->string('link')->nullable();
            $table->text('welcome_message')->nullable();
            $table->string('welcome_text_color')->nullable();
            $table->string('button_color')->nullable();
            $table->string('button_text_color')->nullable();
            $table->integer('is_gradient')->default(0);
            $table->string('gradient_first')->nullable();
            $table->string('gradient_second')->nullable();
            $table->string('gradient_direction')->nullable();
            $table->string('banner_color')->nullable();
            $table->string('button_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pcaarrd_page');
    }
}
