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
                    <h3 class="box-title"> Editar Usuarios</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($usuario,['route' => ['usuarios.update',encrypt($usuario->id)] ,'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'form']) !!}                    
                    {{ Form::token() }}
                        @include('usuarios.partials.form')
                    {!! Form::close() !!}			
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
</div>  
    
@endsection
@push('scripts')
<script src="{{ asset('js/validator.js') }}"></script>
<script>
  /** Referencia http://1000hz.github.io/bootstrap-validator/ */
  $('#form').validator()
</script>
@endpush
