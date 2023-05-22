<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdministradorCarrera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrador_carrera', function (Blueprint $table) {
            $table->bigIncrements('idadminca');
            $table->unsignedBigInteger('idadmin');
            $table->unsignedBigInteger('idca');
            $table->softDeletes();
            $table->timestamps(); 

            $table->foreign('idca')->references('idca')->on('carreras');
            $table->foreign('idadmin')->references('idadmin')->on('administradores_plataforma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('admiistrador_carrera');
    }
}
