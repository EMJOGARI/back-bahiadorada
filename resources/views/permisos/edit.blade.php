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
                    <h3 class="box-title"> Editar Permiso</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">                    
                    {!! Form::model($permissions,['route' => ['permisos.update', encrypt($permissions->id)] ,'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'form']) !!}                    
                    {{ Form::token() }}
                         @include('permisos.partials.form')	
                    {!! Form::close() !!}                    			
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
</div>  
    
@endsection
