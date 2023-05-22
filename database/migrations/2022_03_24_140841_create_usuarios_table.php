<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('idu');
            $table->String('matricula',15);
            $table->text('foto')->nullable();
            $table->String('nombre',25);
            $table->String('apellido_paterno',25);
            $table->String('apellido_materno',25);
            $table->String('email',60);
            $table->String('password',60);
            $table->smallInteger('activo')->default(1);
            $table->char('sexo',1);
            $table->unsignedBigInteger('idtu');
            $table->unsignedBigInteger('idg')->nullable();
            $table->unsignedBigInteger('idce')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idtu')->references('idtu')->on('tipo_de_usuarios');
            $table->foreign('idg')->references('idg')->on('grupos');
            $table->foreign('idce')->references('idce')->on('ciclo_escolars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
