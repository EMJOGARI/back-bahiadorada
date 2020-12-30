@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Importar Estado de Cuenta
@endsection

@section('contentheader_title')
    Importar Estado de Cuenta
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Importar Estado de Cuenta</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['route' => ['import.edocta.csv'],'enctype' => 'multipart/form-data', 'id' => 'form']) !!}
                    {{ Form::token() }}
                        @include('import.edocta.partials.file')
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
</div>

@endsection