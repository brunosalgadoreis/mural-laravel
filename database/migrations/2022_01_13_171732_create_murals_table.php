<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('murals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->string('operacao_id');
            $table->foreign('operacao_id')->references('id')->on('operacaos');
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
        Schema::dropIfExists('murals');
    }
}
