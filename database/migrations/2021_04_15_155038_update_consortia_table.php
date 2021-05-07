<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConsortiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consortia', function (Blueprint $table) {
            $table->char('region', 30)->nullable();
            $table->text('profile')->nullable();
            $table->char('contact_name', 150)->nullable();
            $table->text('contact_details')->nullable();
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
            $table->dropColumn('region');
            $table->dropColumn('profile');
            $table->dropColumn('contact_name');
            $table->dropColumn('contact_details');
        });
    }
}
