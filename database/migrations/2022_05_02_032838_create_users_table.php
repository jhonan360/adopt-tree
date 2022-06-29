<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('idusuario', true);
            $table->integer('idtipo_usuario')->index('fk_users_tipo_usuario1_idx');
            $table->string('tipo_documento', 2)->comment('ENUM(\'CC\', \'CE\')');
            $table->string('cedula', 20)->unique('cedula_UNIQUE');
            $table->string('nombre', 45);
            $table->string('apellido', 45);
            $table->string('email', 100)->unique('email_UNIQUE');
            $table->string('password');
            $table->string('telefono', 45);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
