<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvoirUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avoir_user_roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('role_id',50);
            $table->foreign('role_id')->references('role_id')->on('role');
            $table->string('user_id',250);
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avoir_user_roles');
    }
}
