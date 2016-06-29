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
            $table->increments('id');
            $table->string('title')->unique()->nullable(false);
            $table->string('tUrl')->nullable(false)->unique();
            $table->longText('content');
            $table->string('name')->nullable(true);
            $table->string('email');
            $table->enum('moderated', array(0,1))->default(0);
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
