@push('css')
    <link href="{{ asset('/plugins/DataTable/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<table class="table table-bordered data-table display nowrap" style="width:100%">
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
        var table = $('.data-table').DataTable({
                fixedHeader: true,
                //responsive: true
                responsive:{
                    details:{
                        display: $.fn.dataTable.Responsive.display.modal( {
                            header: function ( row ) {
                                var data = row.data();
                                return 'Details for '+data[0]+' '+data[1];
                            }
                        } ),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                    }
                }
            });
    });
</script>
@endpush
