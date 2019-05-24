<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePadresEstudiantesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padres_estudiantes', function (Blueprint $table) {
            $table->integer('padres_id')->unsigned();
            $table->integer('estudiantes_id')->unsigned();
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('padres_id')->references('id')->on('padres');
            $table->foreign('estudiantes_id')->references('id')->on('estudiantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('padres_estudiantes');
    }
}
