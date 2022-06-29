<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('operation_id');
            $table->foreign('operation_id')->references('id')->on('operations');
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('post');
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
        Schema::dropIfExists('walls');
    }
}
