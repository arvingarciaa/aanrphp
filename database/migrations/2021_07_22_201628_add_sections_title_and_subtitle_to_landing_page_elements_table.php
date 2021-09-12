<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSectionsTitleAndSubtitleToLandingPageElementsTable extends Migration
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

            $table->string('industry_profile_header')->default('Explore AANR Industry Profile')->nullable();
            $table->string('industry_profile_subheader')->default('Distribusyon ng Nilalaman kada Industriya.')->nullable();
            $table->string('latest_aanr_header')->default('Latest in agriculture, aquatic, and natural resources')->nullable();
            $table->string('latest_aanr_subheader')->default('Pinakabagong nilalaman tungkol sa agrikultura, yamang tubig, at likas na yaman.')->nullable();
            $table->string('user_type_recommendation_header')->default('Need help? Here’s what you can find if you are…')->nullable();
            $table->string('user_type_recommendation_subheader')->default('Mga nirerekomenda na publikasyon kung ikaw ay nasa gobyerno, estudyante, o mananaliksik.')->nullable();
            $table->string('featured_publications_header')->default('Featured Publications')->nullable();
            $table->string('featured_publications_subheader')->default('Tampok na mga nailathala sa agrikultura, yamang tubig, at likas na yaman.')->nullable();
            $table->string('featured_videos_header')->default('Featured Videos')->nullable();
            $table->string('featured_videos_subheader')->default('Tampok na mga bidyo tungkol sa agrikultura, yamang tubig, at likas na yaman.')->nullable();
            $table->string('recommended_for_you_header')->default('Recommended for you')->nullable();
            $table->string('recommended_for_you_subheader')->default('Alamin ang iba’t-ibang rekomendasyon base sa iyong hinahanap.')->nullable();
            $table->string('consortia_members_header')->default('Consortia Members')->nullable();
            $table->string('consortia_members_subheader')->default('Kilalanin ang mga miyembro ng consortium sa bawat rehiyon.')->nullable();
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
            $table->dropColumn('industry_profile_header');
            $table->dropColumn('industry_profile_subheader');
            $table->dropColumn('latest_aanr_header');
            $table->dropColumn('latest_aanr_subheader');
            $table->dropColumn('user_type_recommendation_header');
            $table->dropColumn('user_type_recommendation_subheader');
            $table->dropColumn('featured_publications_header');
            $table->dropColumn('featured_publications_subheader');
            $table->dropColumn('featured_videos_header');
            $table->dropColumn('featured_videos_subheader');
            $table->dropColumn('recommended_for_you_header');
            $table->dropColumn('recommended_for_you_subheader');
            $table->dropColumn('consortia_members_header');
            $table->dropColumn('consortia_members_subheader');
        });
    }
}
