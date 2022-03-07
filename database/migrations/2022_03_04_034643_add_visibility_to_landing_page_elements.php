<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisibilityToLandingPageElements extends Migration
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
            $table->Integer('industry_profile_visibility')->nullable()->default(1);
            $table->Integer('latest_aanr_visibility')->nullable()->default(1);
            $table->Integer('user_type_recommendation_visibility')->nullable()->default(1);
            $table->Integer('featured_videos_visibility')->nullable()->default(1);
            $table->Integer('featured_publications_visibility')->nullable()->default(1);
            $table->Integer('recommended_for_you_visibility')->nullable()->default(1);
            $table->Integer('consortia_members_visibility')->nullable()->default(1);
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
            $table->dropColumn('industry_profile_visibility');
            $table->dropColumn('latest_aanr_visibility');
            $table->dropColumn('user_type_recommendation_visibility');
            $table->dropColumn('featured_videos_visibility');
            $table->dropColumn('featured_publications_visibility');
            $table->dropColumn('recommended_for_you_visibility');
            $table->dropColumn('consortia_members_visibility');
        });
    }
}
