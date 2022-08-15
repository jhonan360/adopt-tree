<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantas', function (Blueprint $table) {
            $table->integer('idplantas', true);
            $table->integer('idusuario')->nullable()->index('fk_plantas_users1_idx');
            $table->integer('idnombre')->index('fk_plantas_nombres_plantas1_idx');
            $table->string('nombre', 45)->nullable();
            $table->text('mensaje')->nullable();
            $table->dateTime('fecha_ingreso');
            $table->dateTime('fecha_adopcion')->nullable();
            $table->string('latitud', 100)->nullable();
            $table->string('longitud', 100)->nullable();
            $table->decimal('precio_mensaulidad', 19, 6)->nullable();
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
        Schema::dropIfExists('plantas');
    }
}
