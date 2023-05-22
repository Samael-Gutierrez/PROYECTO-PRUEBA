<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->bigIncrements('idca');
            $table->String('nombre',50);
            $table->smallInteger('activo')->default(1);
            $table->softDeletes();
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('carreras');
    }
}
