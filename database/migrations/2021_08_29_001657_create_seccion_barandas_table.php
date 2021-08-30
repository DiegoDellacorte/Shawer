<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionBarandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion_barandas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('subtitulo');
            $table->text('texto');
            $table->string('img_uno');
            $table->string('img_dos');
            $table->string('img_principal');
            $table->text('texto_imgprincipal1');
            $table->text('texto_imgprincipal2');
            $table->string('img_soporte1')->nullable();
            $table->string('titulo_soporte1')->nullable();
            $table->string('img_soporte2')->nullable();
            $table->string('titulo_soporte2')->nullable();
            $table->string('img_soporte3')->nullable();
            $table->string('titulo_soporte3')->nullable();
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
        Schema::dropIfExists('seccion_barandas');
    }
}
