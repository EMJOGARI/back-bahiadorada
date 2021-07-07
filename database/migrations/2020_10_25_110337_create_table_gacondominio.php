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
        Schema::create('file', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->string('name_original');
            $table->string('category')->nullable();
            $table->string('link');
            $table->timestamps();
        });

        Schema::create('bahia-al-dia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fecha');
            $table->string('area');
            $table->string('actividad');
            $table->string('status');
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
            $table->bigInteger('id_vivienda')->unsigned();
            $table->string('cod_cuota')->default('');
            $table->string('fe_emision')->default('');       //las coloque string manejo en back las fechas
            $table->string('fe_vencimiento')->default('');   //las coloque string manejo en back las fechas
            $table->string('fe_pago')->default('');          //las coloque string manejo en back las fechas
            $table->string('mo_cuota')->default('');
            $table->string('mora_cuota')->default('');
            $table->string('abono_cuota')->default('');
            $table->string('saldo_cuota')->default('');
            $table->string('tipo', 100)->default('');
            $table->string('status', 100)->default('');
            $table->timestamps();
        });

        Schema::create('resumenctascont', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_ctacontable');
            $table->string('nomctacontable', 100);
            $table->string('cod_ctacontable', 25);
            $table->decimal('mo_ctacontable_bs',15,2); //10,2
            $table->decimal('mo_ctacontable_ss',15,2);
            $table->timestamps();
        });

        Schema::create('datamosoridad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_vivienda');
            $table->string('vivienda');
            $table->string('propietario');       //las coloque string manejo en back las fechas
            $table->string('alicuota');   //las coloque string manejo en back las fechas
            $table->string('cuota_mensual');
            $table->string('cant_ordi_pend');         //las coloque string manejo en back las fechas
            $table->string('cant_extra_pend');
            $table->string('cant_cuotas_pend');
            $table->string('cant_dias_vencidos');
            $table->string('cuotas_ordinarias');
            $table->string('cuotas_extra_ordinarias');
            $table->string('monto_deuda');
            $table->string('notas_de_credito');
            $table->timestamps();
        });

        /*Schema::table('viviendas', function (Blueprint $table) {
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
        Schema::dropIfExists('file');
        Schema::dropIfExists('bahia-al-dia');
        Schema::dropIfExists('viviendas');
        Schema::dropIfExists('cuotas');
        Schema::dropIfExists('resumenctascont');
        Schema::dropIfExists('datamosoridad');
    }
}
