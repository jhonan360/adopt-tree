<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuimicosHasBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quimicos_has_bitacora', function (Blueprint $table) {
            $table->integer('id_quimico_bitacora', true);
            $table->integer('idquimico')->index('fk_quimicos_has_bitacora_quimicos1_idx');
            $table->integer('idbitacora')->index('fk_quimicos_has_bitacora_bitacora1_idx');
            $table->integer('idmedidas')->nullable()->index('fk_quimicos_has_bitacora_medidas1_idx');
            $table->decimal('cantidad', 10, 0)->nullable();
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
        Schema::dropIfExists('quimicos_has_bitacora');
    }
}
