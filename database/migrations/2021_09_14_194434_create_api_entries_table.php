<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_entries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('link')->nullable();
            $table->text('description')->nullable();
            $table->Integer('frequency')->nullable()->default(24);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_entries');
    }
}
