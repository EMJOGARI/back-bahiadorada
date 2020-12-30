@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Viviendas
@endsection

@section('contentheader_title')
    Resumen
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $user->name }} </h3>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-body">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Vivienda</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                    <input type="text" class="form-control" value="{{ $vivienda->vivienda }}" disabled>
                                </div>
                             </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>E-mail</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-12">
				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
                    <h3 class="box-title">Cuotas - Saldo Pendiente: {{ $pendiente }}</h3>
					</div>
					<div class="box-body">
						@include('viviendas.partials.list-ctacon')
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>








        </div>
    </div>
@endsection
