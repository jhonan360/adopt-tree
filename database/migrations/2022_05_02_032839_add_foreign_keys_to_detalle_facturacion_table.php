<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetalleFacturacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_facturacion', function (Blueprint $table) {
            $table->foreign(['idfacturacion'], 'fk_detalle_facturacion_facturacion1')->references(['idfacturacion'])->on('facturacion')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['idplantas'], 'fk_detalle_facturacion_plantas1')->references(['idplantas'])->on('plantas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_facturacion', function (Blueprint $table) {
            $table->dropForeign('fk_detalle_facturacion_facturacion1');
            $table->dropForeign('fk_detalle_facturacion_plantas1');
        });
    }
}
