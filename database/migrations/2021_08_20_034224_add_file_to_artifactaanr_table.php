<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileToArtifactaanrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artifactaanr', function (Blueprint $table) {
            //
            $table->text('file')->nullable();
            $table->text('file_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artifactaanr', function (Blueprint $table) {
            //
            $table->dropColumn('file_type');
            $table->dropColumn('file');
        });
    }
}
