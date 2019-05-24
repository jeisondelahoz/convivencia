<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObservacionesProcesosDisciplinariosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones_prodisciplinarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('observaciones_id')->unsigned();
            $table->integer('procesodisciplinario_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('observaciones_id')->references('id')->on('observaciones');
            $table->foreign('procesodisciplinario_id')->references('id')->on('proceso_disciplinarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('observaciones_procesos_disciplinarios');
    }
}
