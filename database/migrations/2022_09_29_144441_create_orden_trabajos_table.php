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
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cod_orden_trabajo');
            $table->dateTime('fecha_hora_marcado')->nullable();
            $table->date('dia_programado');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('estado',50);
            $table->timestamps();

            $table->unsignedBigInteger('trabajador_id')->nullable();
            $table->foreign('trabajador_id')->references('id')->on('trabajadors')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('solicitud_servicio_id');
            $table->foreign('solicitud_servicio_id')->references('id')->on('solicitud_servicios')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_trabajos');
    }
};
