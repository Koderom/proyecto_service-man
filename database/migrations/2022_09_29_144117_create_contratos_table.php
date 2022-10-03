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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('forma_pago',100);
            $table->string('tipo_tarjeta',100);
            $table->string('banco',100);
            $table->unsignedBigInteger('nro_tarjeta');
            $table->string('intervalo_cobro');
            $table->date('fecha_instalacion');
            $table->string('tipo_servicio');
            $table->timestamps();

            $table->unsignedBigInteger('administrador_id');
            $table->foreign('administrador_id')->references('id')->on('administradors')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('establecimiento_id');
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos')
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
        Schema::dropIfExists('contratos');
    }
};
