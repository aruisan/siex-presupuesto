<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramaMgasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_programa_mgas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('codigo', 50)->nullable();
            $table->String('descripcion', 400)->nullable();
            $table->String('sector', 400)->nullable();
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
        Schema::dropIfExists('pre_programa_mgas');
    }
}
