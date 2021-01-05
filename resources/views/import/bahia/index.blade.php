@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Importar Bahia al Dia
@endsection

@section('contentheader_title')
    Importar Bahia al Dia
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <!--h3 class="box-title"> Importar Cuenta Contable</h3-->
                </div>
                <div class="box-body">
                    {!! Form::open(['route' => ['import.bahia.csv'],'enctype' => 'multipart/form-data', 'id' => 'form']) !!}
                    {{ Form::token() }}
                        @include('import.bahia.partials.file')
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
</div>

@endsection
