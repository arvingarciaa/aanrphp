<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixContentAndSubcontentTypeInArtifactaanrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artifactaanr', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->dropColumn('subcontent_id');
            $table->unsignedBigInteger('content_id')->nullable();
            $table->foreign('content_id')->references('id')->on('content')->onDelete('cascade');
            $table->unsignedBigInteger('contentsubtype_id')->nullable();
            $table->foreign('contentsubtype_id')->references('id')->on('content_subtypes')->onDelete('cascade');
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
            $table->dropForeign(['content_id']);
            $table->dropColumn('content_id');
            $table->dropForeign(['contentsubtype_id']);
            $table->dropColumn('contentsubtype_id');
            $table->char('content', 100)->nullable();
            $table->integer('subcontent_id')->nullable();
        });
    }
}
