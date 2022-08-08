<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBPinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_pins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('confinanciado')->nullable();
            $table->string('entidad')->nullable();
            $table->integer('secretaria_id')->nullable();
            $table->string('cod_sector')->nullable();
            $table->string('nombre_sector')->nullable();
            $table->string('cod_proyecto')->nullable();
            $table->string('nombre_proyecto')->nullable();
            $table->string('actividad')->nullable();
            $table->string('metas')->nullable();
            $table->string('cod_producto')->nullable();
            $table->string('nombre_producto')->nullable();
            $table->string('cod_indicador')->nullable();
            $table->string('nombre_indicador')->nullable();
            $table->string('propios')->nullable();
            $table->string('sgp')->nullable();
            $table->string('total')->nullable();
            $table->integer('vigencia_id');
            $table->timestamps();
        });

        Schema::create('solicitud_cdps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rubro_id');
            $table->string('catalogo_cpc');
            $table->string('plan_adquisiciones');
            $table->integer('bpin_id')->nullable();
            $table->integer('objeto');
            $table->timestamps();
        });

        Schema::create('actividades_solicitud_cdps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('actividad');
            $table->integer('propios')->nullable();
            $table->integer('sgp')->nullable();
            $table->integer('total')->nullable();
            $table->integer('valor_solicitar')->nullable();
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
        Schema::dropIfExists('b_pins');
        Schema::dropIfExists('solicitud_cdps');
        Schema::dropIfExists('actividades_solicitud_cdps');
    }
}
