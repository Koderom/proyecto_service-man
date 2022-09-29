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
        Schema::create('nota_servicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cod_nota_servicio');
            $table->text('detalle');
            $table->dateTime('fecha_hora_finalizacion');
            $table->timestamps();

            $table->unsignedBigInteger('orden_trabajo_id');
            $table->foreign('orden_trabajo_id')->references('id')->on('orden_trabajos');

            $table->unsignedBigInteger('trabajador_id');
            $table->foreign('trabajador_id')->references('id')->on('trabajadors');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_servicios');
    }
};
