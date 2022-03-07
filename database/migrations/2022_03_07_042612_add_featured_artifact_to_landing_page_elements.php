<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturedArtifactToLandingPageElements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_page_elements', function (Blueprint $table) {
            //
            $table->Integer('featured_artifact_id_1')->nullable();
            $table->Integer('featured_artifact_id_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_page_elements', function (Blueprint $table) {
            //
            $table->dropColumn('featured_artifact_id_1');
            $table->dropColumn('featured_artifact_id_2');
        });
    }
}
