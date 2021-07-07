<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('name', '* Nombre de Archivo') !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('category', '* Categoria del Archivo') !!}
        {!! Form::select('category',[
                            'Gestion Administrativa' =>'Gestion Administrativa',
                            'Talento Humano'=>'Talento Humano',
                            'Comunicados'=>'Comunicados',
                            'Normas y Reglamentos'=>'Normas y Reglamentos'],
                        null,['class'=>'form-control','placeholder'=>'Select Category']) !!}
    </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('description', '* Descripcion de archivo') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control', 'required' => 'required']) !!}
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      {!! Form::label('file', 'Documento .PDF') !!}
      {!! Form::file('file', ['class'=>'form-control']) !!}
    </div>
</div>

<div class="col-xs-12">
    {{ Form::button(
      '<i class="fa fa-save"></i> Guardar',
      [
        'type' => 'submit',
        'class' => 'btn btn-primary btn-sm',
        'disabled'=>'disabled',
        'data-toggle' => 'tooltip',
        'title' => 'Guardar'
      ]
      )}}
</div>
@push('scripts')
    <script>
        $("#file").change(function(){
            $("button").prop("disabled", this.files.length == 0);
        });
    </script>
@endpush
