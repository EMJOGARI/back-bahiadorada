<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			{!! Form::label('name', '* Nombre') !!}
			{!! Form::text('name', null, ['class'=>'form-control', 'value'=>'{{ $usuario->nombre }}', 'required' => 'required']) !!}
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			{!! Form::label('email', '* E-mail') !!}
			{!! Form::email('email', null, ['class'=>'form-control', 'value'=>'{{ $usuario->email }}', 'required' => 'required']) !!}
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			{!! Form::label('password', 'Nuevo password') !!}
			{!! Form::password('password', ['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			{{ Form::button(
				'<i class="fa fa-save"></i> Guardar',
				[
				'type' => 'submit',
				'class' => 'btn btn-primary btn-sm',
				'data-toggle' => 'tooltip',
				'title' => 'Guardar'
				]
				)}}
				{{ Form::button(
					'<i class="fa fa-close"></i> Cancelar',
					[
					'onclick'=>'history.back()',
					'type' => 'reset',
					'class' => 'btn btn-danger btn-sm',
					'data-toggle' => 'tooltip',
					'title' => 'Cancelar'
					]
					)}}
				</div>
			</div>
		</div>

@push('scripts')
<script src="{{ asset('js/validator.js') }}"></script>
<script>
    /** Referencia http://1000hz.github.io/bootstrap-validator/ */
    $('#form').validator()
</script>
@endpush
