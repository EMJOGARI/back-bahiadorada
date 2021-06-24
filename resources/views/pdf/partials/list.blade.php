@push('css')
    <link href="{{ asset('/plugins/DataTable/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<table class="table table-bordered data-table display nowrap" style="width:100%">
    <thead>
        <th width="30%">Nombre</th>
        <th width="30%">Descripcion</th>
        <th width="20%">Fecha</th>
        <th width="20%">Opciones</th>
    </thead>
    <tbody>
        @foreach ($data as $dat)
            <tr>
                <td class="text-center">{{ $dat->name }}</td>
                <td>{{ $dat->description }}</td>
                <td class="text-center">{{ $dat->created_at }}</td>
                <td>
                    <a class="btn btn-social-icon btn-instagram" href="{{-- Storage::url($dat->link) --}}{{asset('storage/app/public/'.$dat->link)}}" target="_blank">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
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
