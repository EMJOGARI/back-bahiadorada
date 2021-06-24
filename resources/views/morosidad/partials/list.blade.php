@push('css')
    <link href="{{ asset('/plugins/DataTable/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<table class="table table-bordered data-table display nowrap" style="width:100%">
    <thead>
        <th>Vivienda</th>
        <th>Alicuota</th>
        <th>Cuota Mensual</th>
        <th>Ordinarias Pend.</th>
        <th>Extra Pend.</th>
        <th>Cuotas Pend.</th>
        <th>Dias Vencidos</th>
        <th>Cuotas Ordi.</th>
        <th>Cuotas Extras</th>
        <th>Monto Deuda</th>
        <th>NC</th>
    </thead>
    <tbody>
        @foreach ($datos as $dat)
           @if ($dat->cant_dias_vencidos <= 0)
            <tr style="background: rgb(13, 132, 237, 0.8)">
        @elseif ($dat->cant_dias_vencidos > 0 && $dat->cant_dias_vencidos <= 60)
            <tr style="background: rgb(247, 244, 25, 0.8)">
        @elseif ($dat->cant_dias_vencidos > 60 && $dat->cant_dias_vencidos <= 90)
            <tr style="background: rgb(241, 131, 14, 0.8)">
        @elseif ($dat->cant_dias_vencidos > 90)
            <tr style="background: rgb(241, 14, 14, 0.8)">
        @endif
                <td>{{ $dat->vivienda }}</td>
                <td>{{ $dat->alicuota }}</td>
                <td>{{ $dat->cuota_mensual }}</td>
                <td>{{ $dat->cant_ordi_pend }}</td>
                <td>{{ $dat->cant_extra_pend }}</td>
                <td>{{ $dat->cant_cuotas_pend }}</td>
                <td>{{ $dat->cant_dias_vencidos }}</td>
                <td>{{ $dat->cuotas_ordinarias }}</td>
                <td>{{ $dat->cuotas_extra_ordinarias }}</td>
                <td>{{ $dat->monto_deuda }}</td>
                <td>{{ $dat->notas_de_credito }}</td>
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
