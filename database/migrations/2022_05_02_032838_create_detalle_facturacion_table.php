<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleFacturacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_facturacion', function (Blueprint $table) {
            $table->integer('iddetalle_facturacion', true);
            $table->decimal('precio', 19, 6);
            $table->integer('idplantas')->index('fk_detalle_facturacion_plantas1_idx');
            $table->integer('idfacturacion')->index('fk_detalle_facturacion_facturacion1_idx');
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
        Schema::dropIfExists('detalle_facturacion');
    }
}
