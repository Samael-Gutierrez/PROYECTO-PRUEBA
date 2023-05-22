<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->bigIncrements('id_l');
            $table->string('titulo', 40);
            $table->string('subtitulo', 40);
            $table->string('lugar_p', 40);
            $table->string('año_p', 4);
            $table->string('edicion', 40);
            $table->string('paginacion', 40);
            $table->string('isbn', 40);
            $table->string('notas', 60);
            $table->string('titulo_v', 40);
            $table->string('serie', 40);
            $table->unsignedBigInteger('idca')->nullable();
            $table->unsignedBigInteger('id_e')->nullable();
            $table->unsignedBigInteger('id_t')->nullable();
            $table->unsignedBigInteger('id_a')->nullable();
            $table->string('ubicacion', 40);
            $table->string('clasificacion', 40);
            $table->string('status', 40);
            $table->smallInteger('activo')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idca')->references('idca')->on('carreras');
            $table->foreign('id_e')->references('id_e')->on('editorials');
            $table->foreign('id_t')->references('id_t')->on('temas');
            $table->foreign('id_a')->references('id_a')->on('autors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
