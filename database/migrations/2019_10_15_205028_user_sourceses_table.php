<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserSourcesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sources', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('source_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });
        Schema::table('user_sources', function($table) {
            $table->foreign('source_id')->references('id')->on('sources');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_sources');
    }
}
