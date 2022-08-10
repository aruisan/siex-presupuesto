<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_rubros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('valor');
            $table->integer('dependencia_id');
            $table->integer('vigencia_id');
            $table->integer('pub_presupuesto_id');
            $table->integer('cpc_id');
            $table->integer('tipo_de_norma_id');
            $table->integer('fuente_de_financiacion_id');
            $table->integer('tercero_id');
            $table->integer('politica_publica_id');
            $table->integer('seccion_presupuestal_id');
            // $table->integer('vigencia_gasto_id');
            $table->integer('sector_id');
            $table->integer('programa_mga_id');
            $table->integer('producto_mga_id');
            $table->integer('situacion_de_fondo_id');
            $table->integer('seccion_presupuestal_adicional_id');
            $table->integer('detalle_sectorial_id');
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
        Schema::dropIfExists('pre_rubros');
    }
}
