<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->bigIncrements('idg');
            $table->string('nombre',25);
            $table->unsignedBigInteger('idca');
            $table->unsignedBigInteger('idc');
            $table->string('identificador');
            $table->smallInteger('activo')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idca')->references('idca')->on('carreras');
            $table->foreign('idc')->references('idc')->on('cuatrimestres');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
