@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Archivos
@endsection

@section('contentheader_title')
    Lista de Archivos
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-body">
						@include('pdf.partials.list')

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
