@push('css')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.css') }}">
@endpush

{!! Form::open(array('url'=>'estado-cuenta', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search' )) !!}
    <div class="input-group">
        <select name="livingplace" id="livingplace" class="form-control select2">
                <option value="">Seleccioné una Vivienda</option>
           @foreach($living as $liv)
                <option value="{{ $liv->vivienda }}">{{ $liv->vivienda.' - '.$liv->name }}</option>
            @endforeach
        </select>
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
        </span>
    </div>
{{ Form::close() }}

@push('scripts')
<script src="{{ asset('plugins/select2/select2.js') }}"></script>
<script>
    $('.select2').select2();
</script>
@endpush
