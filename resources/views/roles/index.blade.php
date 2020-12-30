@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Roles
@endsection

@section('contentheader_title')
	Roles
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Lista de Roles </h3>
						@can('role.create')
							<a href="{{ url('roles/create') }}" class="pull-right">
								{{ Form::button(
									'<i class="fa fa-plus"></i> Nuevo Rol',
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
						@include('roles.partials.list')

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
