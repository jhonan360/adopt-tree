<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNombresPlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nombres_plantas', function (Blueprint $table) {
            $table->foreign(['idclimas'], 'fk_nombres_climas1')->references(['idclimas'])->on('climas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idtipo_planta'], 'fk_nombres_tipo_planta1')->references(['idtipo_planta'])->on('tipo_planta')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nombres_plantas', function (Blueprint $table) {
            $table->dropForeign('fk_nombres_climas1');
            $table->dropForeign('fk_nombres_tipo_planta1');
        });
    }
}
