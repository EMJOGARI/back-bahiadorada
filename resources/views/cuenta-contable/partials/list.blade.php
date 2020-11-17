@push('css')
    <link href="{{ asset('/plugins/DataTable/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<table class="table table-bordered data-table display nowrap" style="width:100%">
    <thead>
        <th width="20%">ID</th>
        <th width="20%">Nombre Cont.</th>
        <th width="20%">Codigo Cont.</th>
        <th width="20%">Monto Cont. Bs.</th>
        <th width="20%">Monto Cont. $$.</th>
    </thead>
    <tbody>
        @foreach ($datos as $dat)
            <tr>
                <td>{{ $dat->id_ctacontable }}</td>
                <td>{{ $dat->nomctacontable }}</td>
                <td>{{ $dat->cod_ctacontable }}</td>
                <td>{{ number_format($dat->mo_ctacontable_bs, 2, ',', '.') }}</td>
                <td>{{ number_format($dat->mo_ctacontable_ss, 2, ',', '.') }}</td>
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
