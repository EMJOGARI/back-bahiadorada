@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Importar Datos Vivienda
@endsection

@section('contentheader_title')
    Importar  Datos Vivienda
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Importar Datos Vivienda</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['route' => ['import.vivienda.csv'],'enctype' => 'multipart/form-data', 'id' => 'form']) !!}
                    {{ Form::token() }}
                        @include('import.vivienda.partials.file')
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
</div>

@endsection