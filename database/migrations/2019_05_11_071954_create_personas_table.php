<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_documentos_id')->unsigned();
            $table->string('documento');
            $table->string('primerNombre');
            $table->string('segundoNombre');
            $table->string('primerApellido');
            $table->string('segundoApellido');
            $table->date('fechaNacimiento');
            $table->string('telefonoFijo');
            $table->string('telefonoCelular');
            $table->string('direccion');
            $table->integer('users_id')->unsigned();
            $table->integer('municipios_id')->unsigned();
            $table->softDeletes();
            $table->foreign('tipo_documentos_id')->references('id')->on('tipo_documentos');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('municipios_id')->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personas');
    }
}
