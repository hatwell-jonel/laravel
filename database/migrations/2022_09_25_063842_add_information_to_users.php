<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInformationToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('account_id')->after('user_level');
            $table->string('firstname')->after('account_id');
            $table->string('middlename')->after('firstname');
            $table->string('lastname')->after('middlename');
            $table->string('gender')->after('lastname');
            $table->string('birthplace')->after('gender');
            $table->string('birthdate')->after('birthplace');
            $table->string('contact')->after('birthdate');
            $table->string('address')->after('contact');
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
            $table->dropColumn('account_id');
            $table->dropColumn('firstname');
            $table->dropColumn('middlename');
            $table->dropColumn('lastname');
            $table->dropColumn('gender');
            $table->dropColumn('birthplace');
            $table->dropColumn('birthdate');
            $table->dropColumn('contact');
            $table->dropColumn('address');
        });
    }
}
