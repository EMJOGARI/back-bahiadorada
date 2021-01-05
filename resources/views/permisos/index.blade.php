@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Permisos
@endsection

@section('contentheader_title')
	Permisos
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Lista de Permisos </h3>
						@can('permission.create')
							<a href="{{ url('permisos/create') }}" class="pull-right">
								{{ Form::button(
									'<i class="fa fa-plus"></i> Nuevo Permiso',
										[
											'type' => 'submit',
											'class' => 'btn btn-primary btn-sm',
											'data-toggle' => 'tooltip',
											'title' => 'Nuevo'
										]
								)}}
							</a>
						@endcan
					</div>
					<div class="box-body">
						@include('permisos.partials.list')

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
