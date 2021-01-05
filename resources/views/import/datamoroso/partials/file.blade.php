<div class="col-sm-6 col-xs-12">
    <div class="form-group">
      {!! Form::label('file', 'Data Moroso .CSV') !!}
      {!! Form::file('file', ['class'=>'form-control']) !!}

    </div>
    {{ Form::button(
      '<i class="fa fa-save"></i> Guardar',
      [
        'type' => 'submit',
        'class' => 'btn btn-primary btn-sm disabel',
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
