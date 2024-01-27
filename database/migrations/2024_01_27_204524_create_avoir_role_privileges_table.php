<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvoirRolePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avoir_role_privileges', function (Blueprint $table) {
            $table->id();
            $table->string('privilege_id',50);
            $table->foreign('privilege_id')->references('privilege_id')->on('privileges');
            $table->string('role_id',50);
            $table->foreign('role_id')->references('role')->on('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avoir_role_privileges');
    }
}
