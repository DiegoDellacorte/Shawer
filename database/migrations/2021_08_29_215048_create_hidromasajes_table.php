<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHidromasajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hidromasajes', function (Blueprint $table) {
            $table->id();
            $table->string('orden');
            $table->string('img_principal');
            $table->string('titulo');
            $table->string('img_uno');
            $table->string('img_dos');
            $table->longText('tabla')->nullable();
            $table->text('texto');
            $table->boolean('destacado')->default(false);
            $table->string('orden_destacado')->nullable();
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
        Schema::dropIfExists('hidromasajes');
    }
}
