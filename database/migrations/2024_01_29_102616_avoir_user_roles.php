<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AvoirUserRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avoirUserRoles', function (Blueprint $table) {
        $table->id();
        $table->string('role_id',50);
        $table->string('user_id',250);
        $table->foreign('role_id')->references('role_id')->on('roles');
        $table->foreign('user_id')->references('user_id')->on('users');
        //
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
    }
}
