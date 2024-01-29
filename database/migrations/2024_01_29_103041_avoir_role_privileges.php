<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AvoirRolePrivileges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('avoirRolePrivileges', function (Blueprint $table) {
            $table->id();
            $table->string('privilege_id',50);
            $table->string('privilege_type',50);
            $table->foreign('privilege_id')->references('privilege_id')->on('privileges');
            $table->foreign('privilege_type')->references('privilege_type')->on('privileges');
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
