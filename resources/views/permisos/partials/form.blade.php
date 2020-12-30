<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('name', 'Nombre del Permiso') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre...', 'value'=>'{{ $permissions->name }}','required' => 'required']) !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('module', 'Modulo') !!}
            {!! Form::text('module', null, ['class'=>'form-control', 'placeholder'=>'Modulo...','required' => 'required']) !!}
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('description', 'Descripción') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40, 'placeholder'=>'Descripción...']) !!}
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
