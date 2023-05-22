<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradoresPlataformaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradores_plataforma', function (Blueprint $table) {
            $table->bigIncrements('idadmin');
            $table->string('titulo', 20);
            $table->text('foto');
            $table->string('nombre', 25);
            $table->string('apellido_paterno', 25);
            $table->string('apellido_materno', 25);
            $table->string('email', 60)->unique();
            $table->string('password', 60);
            $table->smallInteger('activo')->default(1);
            $table->unsignedBigInteger('ida')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('ida')->references('ida')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administradores_plataforma');
    }
}
