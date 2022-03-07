<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorAffiliationToArtifactaanr extends Migration
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
            $table->String('author_affiliation')->nullable();
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
            $table->dropColumn('author_affiliation');
        });
    }
}
