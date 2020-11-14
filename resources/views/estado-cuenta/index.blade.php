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
						<h3 class="box-title">Cuotas - Saldo Pendiente: {{ $pendiente }}</h3>
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
