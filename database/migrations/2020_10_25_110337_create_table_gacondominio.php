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
        Schema::create('bahia-al-dia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fecha');
            $table->string('area');
            $table->string('actividad');
            $table->timestamps();
        });

        Schema::create('viviendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_usuario');//->unsigned();
            $table->bigInteger('id_vivienda');
            $table->string('vivienda', 8);
            $table->timestamps();
        });

        Schema::create('cuotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_vivienda');//->unsigned();
            $table->string('vivienda');
            $table->string('fe_emision');       //las coloque string manejo en back las fechas
            $table->string('fe_vencimiento');   //las coloque string manejo en back las fechas
            $table->string('fe_pago');          //las coloque string manejo en back las fechas
            $table->string('mo_cuota');
            $table->string('mora_cuota');
            $table->string('abono_cuota');
            $table->string('saldo_cuota');
            $table->string('tipo', 100);
            $table->string('status', 100);
            $table->timestamps();
        });

        Schema::create('resumenctascont', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_ctacontable');
            $table->string('nomctacontable', 100);
            $table->string('cod_ctacontable', 25);
            $table->decimal('mo_ctacontable_bs',10,2); //10,2
            $table->decimal('mo_ctacontable_ss',10,2);
            $table->timestamps();
        });

       /* Schema::table('viviendas', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('cuotas', function (Blueprint $table) {
            $table->foreign('id_vivienda')->references('id')->on('viviendas')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('viviendas', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']);
        });
        Schema::table('cuotas', function (Blueprint $table) {
            $table->dropForeign(['id_vivienda']);
        });*/

        Schema::dropIfExists('bahia-al-dia');
        Schema::dropIfExists('viviendas');
        Schema::dropIfExists('cuotas');
        Schema::dropIfExists('resumenctascont');
    }
}
