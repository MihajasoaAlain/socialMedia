<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faires', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 250);
            $table->foreign('user_id')->references('user_id')->on('users');
            
            $table->string('reaction_id', 50);
            $table->foreign('reaction_id')->references('reaction_id')->on('reactions');
            
            $table->string('post_id', 50);
            $table->foreign('post_id')->references('post_id')->on('posts');
            
            
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
        Schema::dropIfExists('faires');
    }
}
