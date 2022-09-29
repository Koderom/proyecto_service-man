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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('primer_apellido',100);
            $table->string('segundo_apellido',100);
            $table->unsignedBigInteger('cedula_identidad');
            $table->unsignedBigInteger('celular');
            $table->string('email',200);
            $table->char('sexo',1);
            $table->date('fecha_nacimiento');
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
