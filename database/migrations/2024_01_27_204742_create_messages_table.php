<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('message_id',50)->unique();
            $table->text('message_content');
            $table->date('message_date');
            $table->string('user_id',250);
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('conversation_id',250);
            $table->foreign('conversation_id')->references('conversation_id')->on('conversations');
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
        Schema::dropIfExists('messages');
    }
}
