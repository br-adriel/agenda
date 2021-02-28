<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {


            $table->id();
            $table->foreignId('usuario');
            $table->foreign('usuario')->references('id')->on('users')->onDelete('cascade');
            $table->string('nome',50);
            $table->date('dtinicio');
            $table->date('dtfim');
            $table->time('hrinicio');
            $table->time('hrfim');
            $table->text('descricao');
            $table->boolean('lembrete')->default(0);
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
        Schema::dropIfExists('eventos');
    }
}
