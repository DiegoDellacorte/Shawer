<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVanitoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanitories', function (Blueprint $table) {
            $table->id();
            $table->string('orden');
            $table->string('img_principal');
            $table->string('titulo');
            $table->text('texto');
            $table->string('img_uno');
            $table->string('img_dos');
            $table->longText('tabla')->nullable();
            $table->longText('tabla2')->nullable();
            $table->boolean('destacado')->nullable();
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
        Schema::dropIfExists('vanitories');
    }
}
