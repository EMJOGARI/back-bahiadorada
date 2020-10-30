<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGacondominio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //->nullable()
        Schema::create('viviendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_usuario')->unsigned();
            $table->string('vivienda', 8);
            $table->timestamps();
        });

        Schema::create('cuotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_vivienda')->unsigned();
            $table->date('fe_emision');
            $table->date('fe_vencimiento');
            $table->date('fe_pago');
            $table->string('mo_cuota', 10, 2);
            $table->string('mora_cuota', 10, 2);
            $table->string('abono_cuota', 10, 2);
            $table->string('saldo_cuota', 10, 2);
            $table->string('tipo', 100);
            $table->string('status', 100);
            $table->timestamps();
        });

        Schema::create('resumenctascont', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_ctacontable');
            $table->string('nomctacontable', 100);
            $table->string('cod_ctacontable', 25);
            $table->string('mo_ctacontable_bs'); //10,2
            $table->string('mo_ctacontable_ss');
            $table->timestamps();
        });

        Schema::table('viviendas', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('cuotas', function (Blueprint $table) {
            $table->foreign('id_vivienda')->references('id')->on('viviendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('viviendas', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']);
        });
        Schema::table('cuotas', function (Blueprint $table) {
            $table->dropForeign(['id_vivienda']);
        });

        Schema::dropIfExists('viviendas');
        Schema::dropIfExists('cuotas');
        Schema::dropIfExists('resumenctascont');
    }
}
