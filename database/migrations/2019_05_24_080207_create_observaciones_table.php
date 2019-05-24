<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObservacionesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('motivacion');
            $table->text('descripcion');
            $table->integer('visibilidad');
            $table->integer('tipoobservaciones_id')->unsigned();
            $table->integer('estudiantes_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tipoobservaciones_id')->references('id')->on('tipo_observaciones');
            $table->foreign('estudiantes_id')->references('id')->on('estudiantes');
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
        Schema::drop('observaciones');
    }
}
