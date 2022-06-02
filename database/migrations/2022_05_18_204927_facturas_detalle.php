<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FacturasDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_detalle', function (Blueprint $table) {
            $table->id('fad_id');
            $table->foreignId('fac_id')->references('fac_id')->on('facturas');
            $table->foreignId('hab_id')->references('hab_id')->on('habitaciones');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas_detalle');
    }
}
