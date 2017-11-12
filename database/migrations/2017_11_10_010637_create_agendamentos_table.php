<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('auditorio_id')->unsigned();
            $table->foreign('auditorio_id')->references('id')->on('auditorios')->onDelete('cascade');
            $table->date('dataAgendamento')->nullable();
            $table->string('manha')->default('nao');
            $table->string('tarde')->default('nao');
            $table->string('noite')->default('nao');
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
        Schema::dropIfExists('agendamentos');
    }
}
