<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plantas', function (Blueprint $table) {
            $table->foreign(['idnombre'], 'fk_plantas_nombres_plantas1')->references(['idnombre'])->on('nombres_plantas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idusuario'], 'fk_plantas_users1')->references(['idusuario'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plantas', function (Blueprint $table) {
            $table->dropForeign('fk_plantas_nombres_plantas1');
            $table->dropForeign('fk_plantas_users1');
        });
    }
}
