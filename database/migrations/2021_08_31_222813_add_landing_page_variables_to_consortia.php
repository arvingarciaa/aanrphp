<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLandingPageVariablesToConsortia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consortia', function (Blueprint $table) {
            $table->string('latest_aanr_header')->default('Latest in agriculture, aquatic, and natural resources')->nullable();
            $table->string('latest_aanr_subheader')->default('Pinakabagong nilalaman tungkol sa agrikultura, yamang tubig, at likas na yaman.')->nullable();
            $table->string('featured_publications_header')->default('Featured Publications')->nullable();
            $table->string('featured_publications_subheader')->default('Tampok na mga nailathala sa agrikultura, yamang tubig, at likas na yaman.')->nullable();
            $table->string('featured_videos_header')->default('Featured Videos')->nullable();
            $table->string('featured_videos_subheader')->default('Tampok na mga bidyo tungkol sa agrikultura, yamang tubig, at likas na yaman.')->nullable();
            $table->string('consortia_members_header')->default('Consortia Members')->nullable();
            $table->string('consortia_members_subheader')->default('Kilalanin ang mga miyembro ng consortium sa bawat rehiyon.')->nullable();
            $table->string('recommended_for_you_bg')->nullable()->default('#282D30');
            $table->Integer('recommended_for_you_bg_type')->nullable()->default('1');
            $table->string('latest_aanr_bg')->nullable()->default('#282D30');
            $table->string('latest_aanr_bg_type')->nullable()->default('1');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consortia', function (Blueprint $table) {
            //
            $table->dropColumn('latest_aanr_header');
            $table->dropColumn('latest_aanr_subheader');
            $table->dropColumn('featured_publications_header');
            $table->dropColumn('featured_publications_subheader');
            $table->dropColumn('featured_videos_header');
            $table->dropColumn('featured_videos_subheader');
            $table->dropColumn('consortia_members_header');
            $table->dropColumn('consortia_members_subheader');
            $table->dropColumn('recommended_for_you_bg');
            $table->dropColumn('recommended_for_you_bg_type');
            $table->dropColumn('latest_aanr_bg');
            $table->dropColumn('latest_aanr_bg_type');
        });
    }
}
