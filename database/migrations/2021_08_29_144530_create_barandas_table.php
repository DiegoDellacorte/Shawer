<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barandas', function (Blueprint $table) {
            $table->id();
            $table->string('orden');
            $table->string('img_principal');
            $table->string('titulo');
            $table->string('img_uno');
            $table->string('img_dos');
            $table->text('texto');
            $table->string('img_pasamanos1')->nullable();
            $table->string('img_pasamanos2')->nullable();
            $table->string('img_pasamanos3')->nullable();
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
        Schema::dropIfExists('barandas');
    }
}
