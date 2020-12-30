@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Cambiar Contraseña
@endsection

@section('contentheader_title')
    Cambiar Contraseña
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Cambiar Contraseña</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($user,['route' => ['usuarios.profile.update',encrypt($user->id)] ,'method' => 'PUT', 'id' => 'form']) !!}
                        @include('user.partials.form-pass')
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
</div>

@endsection
