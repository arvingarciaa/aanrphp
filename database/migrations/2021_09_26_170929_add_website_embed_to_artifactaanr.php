<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWebsiteEmbedToArtifactaanr extends Migration
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
            $table->text('embed_link')->nullable();
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
            $table->dropColumn('embed_link');
        });
    }
}
