<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTabl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            //
            $table->increments('tId');
            $table->string('title')->unique()->nullable(false);
            // $table->integer('gId')->unsigned()->nullable(false);
            $table->string('tUrl')->nullable(false)->unique();
            $table->longText('content');
            $table->integer('id')->unsigned()->nullable(true);
            $table->foreign('id')->references('id')->on('users');
            // $table->foreign('gId')->references('gId')->on('groups');
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
        Schema::table('threads', function (Blueprint $table) {
            //
            Schema::dropIfExists('threads');
        });
    }
}
