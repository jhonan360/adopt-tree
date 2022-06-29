<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToQuimicosHasBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quimicos_has_bitacora', function (Blueprint $table) {
            $table->foreign(['idbitacora'], 'fk_quimicos_has_bitacora_bitacora1')->references(['idbitacora'])->on('bitacora')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idquimico'], 'fk_quimicos_has_bitacora_quimicos1')->references(['idquimico'])->on('quimicos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idmedidas'], 'fk_quimicos_has_bitacora_medidas1')->references(['idmedidas'])->on('medidas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quimicos_has_bitacora', function (Blueprint $table) {
            $table->dropForeign('fk_quimicos_has_bitacora_bitacora1');
            $table->dropForeign('fk_quimicos_has_bitacora_quimicos1');
            $table->dropForeign('fk_quimicos_has_bitacora_medidas1');
        });
    }
}
