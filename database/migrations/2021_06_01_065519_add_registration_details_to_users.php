<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegistrationDetailsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('organization')->nullable();
            $table->string('last_name')->nullable();
            $table->dropColumn('name');
            $table->string('first_name')->nullable();
            $table->Integer('role')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('birthdate');
            $table->dropColumn('contact_number');
            $table->dropColumn('region');
            $table->dropColumn('city');
            $table->dropColumn('zip_code');
            $table->dropColumn('organization');
            $table->dropColumn('last_name');
            $table->dropColumn('first_name');
            $table->string('name');
            $table->dropColumn('role');
        });
    }
}
