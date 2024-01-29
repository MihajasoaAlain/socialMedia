<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Etre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etre', function (Blueprint $table) {
            $table->id();
            $table->string('Conversation_id',250);
            $table->string('user_id',250);
            $table->foreign('Conversation_id')->references('Conversation_id')->on('conversations');
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
