@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Morosidad
@endsection

@section('contentheader_title')

@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">MOROSIDAD</h3>
                    </div>
                        <dir class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="box-body">
                                    {!! $chart->container() !!}
                                    {!! $chart->script() !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <div class="box-body">
                                    {!! $chart_2->container() !!}
                                    {!! $chart_2->script() !!}
                                </div>
                            </div>
                        </dir>
					<!-- /.box-body -->
				</div>
                <!-- /.box -->
            </div>{{--
            <div class="col-md-6">
				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Morosos</h3>
					</div>
					<div class="box-body">
                        {!! $chart_2->container() !!}

                        {!! $chart_2->script() !!}
					</div>
					<!-- /.box-body -->
				</div>
                <!-- /.box -->
			</div>--}}
		</div>
	</div>
@endsection
