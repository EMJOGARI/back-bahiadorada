@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection

@section('contentheader_title')
	Usuarios
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Lista Usuario </h3>
						@can('user.create')
							<a href="{{ url('usuarios/create') }}" class="pull-right">
								{{ Form::button(
									'<i class="fa fa-plus"></i> Nuevo Usuario',
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
						@include('usuarios.partials.list')
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
