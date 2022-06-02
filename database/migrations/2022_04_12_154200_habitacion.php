<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Habitacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('habitaciones', function (Blueprint $table) {
            $table->id('hab_id');
            
            $table->string('hab_detalle');
            $table->integer('hab_estado');
            $table->foreignId('tip_id')->references('tip_id')->on('tipo');
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
                 Schema::dropIfExists('habitacion');
    }
}
