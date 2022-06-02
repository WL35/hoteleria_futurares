<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('reservaciones', function (Blueprint $table) {
            $table->id('res_id');
            $table->integer('res_adultos');
            $table->integer('res_niños');
            $table->integer('res_noches');
            $table->date('res_f_llegada');
            $table->date('res_f_salida');
            $table->integer('res_total');
            $table->integer('res_estado');
            $table->foreignId('cli_id')->references('cli_id')->on('clientes');
              $table->foreignId('hab_id')->references('hab_id')->on('habitaciones');
              $table->foreignId('usu_id')->references('usu_id')->on('users');  
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
        //
    }
}
