<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixGradientDirectionOnConsortiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consortia', function (Blueprint $table) {
            //
            $table->string('landing_page_gradient_direction')->default('to right')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('consortia', function (Blueprint $table) {
            $table->string('landing_page_gradient_direction')->default('ltr')->nullable()->change();
        });
    }
}
