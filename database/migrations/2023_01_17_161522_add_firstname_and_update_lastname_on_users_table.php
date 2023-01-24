<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFirstnameAndUpdateLastnameOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'lastname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('firstname');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('lastname', 'name');
        });
    }
}
