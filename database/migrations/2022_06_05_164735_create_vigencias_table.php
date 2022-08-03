<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVigenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_vigencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vigencia');
            $table->enum('tipo', ['1', '0']);
            $table->string('n_decreto')->nullable();
            $table->string('ruta')->nullable();
            $table->date('fecha')->nullable();
            $table->integer('presupuesto_inicial')->default(0);
            $table->integer('owner_id')->nullable();//cambie a nullable para probar
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
        Schema::dropIfExists('pre_vigencias');
    }
}
