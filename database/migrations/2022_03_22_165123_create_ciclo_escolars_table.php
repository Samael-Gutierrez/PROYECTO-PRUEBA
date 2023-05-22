<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCicloEscolarsTable extends Migration
{
    public function up()
    {
        Schema::create('ciclo_escolars', function (Blueprint $table) {
            $table->bigIncrements('idce');
            $table->String('nombre',25);
            $table->smallInteger('activo')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('ciclo_escolars');
    }
}
