<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSituacionDeFondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_situacion_de_fondos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('codigo', 50)->nullable();
            $table->String('descripcion', 400)->nullable();
            $table->integer('vigencia_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_situacion_de_fondos');
    }
}
