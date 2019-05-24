<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAsignaturasDocentesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas_docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('year');
            $table->integer('asignaturas_id')->unsigned();
            $table->integer('docentes_id')->unsigned();
            $table->integer('grupos_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('asignaturas_id')->references('id')->on('asignaturas');
            $table->foreign('docentes_id')->references('id')->on('docentes');
            $table->foreign('grupos_id')->references('id')->on('grupos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asignaturas_docentes');
    }
}
