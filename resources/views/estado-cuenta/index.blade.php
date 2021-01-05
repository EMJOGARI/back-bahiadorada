@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Estado de Cuenta
@endsection

@section('contentheader_title')
    Estado de Cuenta
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<div class="row">
							<div class="col-xs-12 col-md-4">
								<h3 class="box-title">Cuotas - Saldo Pendiente: {{ $pendiente }}</h3>
							</div>
							<div class="col-xs-12 col-md-8">
								<h5>A.- Las cuotas ordinarias solo se pagarán en dólares efectivos o transferencia.</h5>
								<h5>B.- Para el pago de su saldo pendiente debe regirse la tasa del día del Banco Central de Venezuela.</h5>
                            </div>
                            <div class="col-xs-12 col-md-4">
								@include('estado-cuenta.partials.search')
							</div>
						</div>
					</div>
					<div class="box-body">
						@include('estado-cuenta.partials.list')
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
