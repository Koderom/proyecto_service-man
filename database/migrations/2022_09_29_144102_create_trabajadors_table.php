<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadors', function (Blueprint $table) {
            $table->id();
            $table->string('nacionalidad',100);
            $table->string('profesion',150);
            $table->unsignedBigInteger('nro_registro_profecional');
            $table->string('grado_academico',120);
            $table->timestamps();

            $table->unsignedBigInteger('turno_id');
            $table->foreign('turno_id')->references('id')->on('turnos');

            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadors');
    }
};
