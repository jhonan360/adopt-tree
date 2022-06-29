<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('multimedia', function (Blueprint $table) {
            $table->foreign(['idplantas'], 'fk_multimedia_plantas1')->references(['idplantas'])->on('plantas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('multimedia', function (Blueprint $table) {
            $table->dropForeign('fk_multimedia_plantas1');
        });
    }
}
