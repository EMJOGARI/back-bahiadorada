{!! Form::open(array('url'=>'estado-cuenta', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search' )) !!}
    <div class="input-group">
        <select name="cliente" id="cliente" class="form-control selectpicker" data-live-search="true">
                <option value="">Seleccioné una Vivienda</option>
           @foreach($living as $liv)
                <option value="{{ $liv->id_user }}">{{ $liv->vivienda }}</option>
            @endforeach
        </select>
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
        </span>
    </div>
{{ Form::close() }}
