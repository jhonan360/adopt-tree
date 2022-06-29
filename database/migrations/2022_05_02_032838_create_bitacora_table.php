<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->integer('idbitacora', true);
            $table->integer('idusuario')->index('fk_bitacora_users1_idx');
            $table->integer('idplantas')->index('fk_bitacora_plantas1_idx');
            $table->time('hora_riego')->nullable();
            $table->tinyInteger('poda')->nullable();
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
        Schema::dropIfExists('bitacora');
    }
}
