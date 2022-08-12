<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_registros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->date('fecha_expedicion');
            $table->string('ruta');
            $table->integer('valor');
            $table->integer('saldo');
            $table->integer('valor_total');
            $table->integer('persona_id');
            $table->integer('secretaria_id')->nullable();
            $table->date('secretaria_fecha')->nullable();
            $table->string('observacion')->nullable();
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
        Schema::dropIfExists('pre_registros');
    }
}
