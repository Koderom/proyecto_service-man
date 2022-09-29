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
            $table->dateTime('fecha_hora_marcado');
            $table->string('estado',50);
            $table->timestamps();

            $table->unsignedBigInteger('trabajador_id');
            $table->foreign('trabajador_id')->references('id')->on('trabajadors');

            $table->unsignedBigInteger('solicitud_servicio_id');
            $table->foreign('solicitud_servicio_id')->references('id')->on('solicitud_servicios');
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
