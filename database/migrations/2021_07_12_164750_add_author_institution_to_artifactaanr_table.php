<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorInstitutionToArtifactaanrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artifactaanr', function (Blueprint $table) {
            
            $table->text('author_institution')->nullable();
            $table->text('title')->change();
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

            $table->char('title', 100)->change();
            $table->dropColumn('author_institution');
        });
    }
}
