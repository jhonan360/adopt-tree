<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bitacora', function (Blueprint $table) {
            $table->foreign(['idplantas'], 'fk_bitacora_plantas1')->references(['idplantas'])->on('plantas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idusuario'], 'fk_bitacora_users1')->references(['idusuario'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bitacora', function (Blueprint $table) {
            $table->dropForeign('fk_bitacora_plantas1');
            $table->dropForeign('fk_bitacora_users1');
        });
    }
}
