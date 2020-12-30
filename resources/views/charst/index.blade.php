@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Cuenta Contable
@endsection

@section('contentheader_title')
    Cuenta Contable
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">GRAFICO</h3>
					</div>
					<div class="box-body">
                        {!! $chart->container() !!}

                        {!! $chart->script() !!}
					</div>
					<!-- /.box-body -->
				</div>
                <!--
                    ID. VIVIENDA
VIVIENDA
PROPIETARIO
ALICUOTA
CUOTA MENSULA
CANT. ORDI. PEND.
CANT. EXTRA. PEND.
CANT. CUOTAS PEND.
CANT. DIAS VENCIDOS
CUOTAS ORDINARIAS
CUOTAS EXTRA ORDINARIAS
MONTO DEUDA
NOTAS DE CREDITOS

/.box -->

			</div>
		</div>
	</div>
@endsection
