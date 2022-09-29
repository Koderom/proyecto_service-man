<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_servicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cod_solicitud_servicio');
            $table->text('motivo');
            $table->boolean('confirmado');
            $table->dateTime('fecha_solicitud');
            $table->timestamps();

            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id')->references('id')->on('servicios');

            $table->unsignedBigInteger('establecimiento_id');
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos');

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
        Schema::dropIfExists('solicitud_servicios');
    }
};
