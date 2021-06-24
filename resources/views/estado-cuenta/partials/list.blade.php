@push('css')
    <link href="{{ asset('/plugins/DataTable/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<table class="table table-bordered data-table display nowrap" style="width:100%">
    <thead>
        <th>Vivienda</th>
        {{--<th>Fecha Emi.</th>--}}
        <th>Fecha Ven.</th>
        <th>Fecha Pago</th>
        <th>Cuota</th>
        {{--<th>Mora</th>--}}
        <th>Saldo</th>
        <th>Tipo</th>
        <th>Status</th>
    </thead>
    <tbody>
        @foreach ($datos as $dat)
            <tr>
                <td>{{ $dat->vivienda }}</td>
                {{-- <td>{{ $dat->fe_emision }}</td>--}}
                <td>{{ $dat->fe_vencimiento }}</td>
                <td>{{ $dat->fe_pago }}</td>
                <td>{{ $dat->mo_cuota }}</td>
                {{--<td>{{ $dat->mora_cuota }}</td>--}}
                <td>{{ $dat->saldo_cuota }}</td>
                <td>{{ $dat->tipo }}</td>
                {{--<td>{{ $dat->status }}</td> --}}
                
                @if ($dat->status == 'PENDIENTE')
                    <td>
                        <span class="badge bg-red">{{ $dat->status }}</span>
                    </td>
                @else
                    <td>
                        <span class="badge bg-light-blue">{{ $dat->status }}</span>
                    </td>
                @endif
               
                
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
