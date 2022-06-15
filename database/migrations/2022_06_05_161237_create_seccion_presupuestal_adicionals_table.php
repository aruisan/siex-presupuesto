<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionPresupuestalAdicionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_seccion_presupuestal_adicionales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('codigo', 50)->nullable();
            $table->String('descripcion', 400)->nullable();
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
        Schema::dropIfExists('pre_seccion_presupuestal_adicionales');
    }
}
