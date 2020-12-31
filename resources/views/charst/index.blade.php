@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Cuenta Contable
@endsection

@section('contentheader_title')
    Cuenta Contable
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Morosos</h3>
					</div>
					<div class="box-body">
                        {!! $chart->container() !!}

                        {!! $chart->script() !!}
					</div>
					<!-- /.box-body -->
				</div>
                <!-- /.box -->
			</div>
		</div>
	</div>
@endsection
