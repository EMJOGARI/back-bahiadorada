@push('css')
    <link href="{{ asset('/plugins/DataTable/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<table class="table table-bordered data-table">
    <thead>
        <th width="20%">Fecha</th>
        <th width="20%">Área</th>
        <th width="60%">Actividad</th>
    </thead>
    <tbody>
        @foreach ($datos as $dat)
            <tr>
                <td class="text-center">{{ $dat->fecha }}</td>
                <td>{{ $dat->area }}</td>
                <td class="text-center">{{ $dat->actividad }}</td>                
            </tr>
        @endforeach
    </tbody>
</table>

@push('scripts')
<script src="{{ asset('/plugins/DataTable/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var table = $('.data-table').DataTable( {
            fixedHeader: true
        } );
    } );
</script>
@endpush
