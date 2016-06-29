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
            $table->increments('id');
            $table->integer('thread_id')->unsigned()->nullable(false);
            $table->longText('content');
            $table->string('email');
            $table->string('username')->nullable(true);
            $table->enum('moderated', array(0,1))->default(0);
            $table->foreign('thread_id')->references('id')
            ->on('threads')
            ->onDelete('cascade');;
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
