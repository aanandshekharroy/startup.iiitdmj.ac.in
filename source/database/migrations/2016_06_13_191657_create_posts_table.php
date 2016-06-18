<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            //
            $table->increments('pId');
            $table->integer('tId')->unsigned()->nullable(false);
            $table->integer('id')->unsigned()->nullable(false);
            $table->longText('content');
            $table->foreign('tId')->references('tId')->on('threads');
            $table->foreign('id')->references('id')->on('users');
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
        Schema::table('posts', function (Blueprint $table) {
            //
            Schema::dropIfExists('posts');
        });
    }
}
