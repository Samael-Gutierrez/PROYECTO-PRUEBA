<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('id_p');
            $table->unsignedBigInteger('idu')->nullable();
            $table->date('fecha_p');
            $table->string('observacion_p', 40);
            $table->date('fecha_dev');
            $table->string('observacion_dev', 40);
            $table->unsignedBigInteger('id_l')->nullable();
            $table->string('tipo_p', 40);
            $table->string('status', 40);
            $table->smallInteger('activo')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idu')->references('idu')->on('usuarios');
            $table->foreign('id_l')->references('id_l')->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
