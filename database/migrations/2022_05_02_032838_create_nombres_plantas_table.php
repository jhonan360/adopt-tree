<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNombresPlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nombres_plantas', function (Blueprint $table) {
            $table->integer('idnombre', true);
            $table->integer('idtipo_planta')->index('fk_nombres_tipo_planta1_idx');
            $table->integer('idclimas')->index('fk_nombres_climas1_idx');
            $table->string('nombre_cientifico', 45);
            $table->string('nombre_comun', 45);
            $table->text('detalle')->nullable();
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
        Schema::dropIfExists('nombres_plantas');
    }
}
