@push('css')
    <link href="{{ asset('/plugins/DataTable/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<table class="table table-bordered data-table display nowrap" style="width:100%">
    <thead>
        <th width="20%">Nombre</th>
        <th width="20%">Descripcion</th>
        <th width="20%">Categoria</th>
        <th width="20%">Fecha</th>
        <th width="20%">Opciones</th>
    </thead>
    <tbody>
        @foreach ($data as $dat)
            <tr>
                <td>{{ $dat->name }}</td>
                <td>{{ $dat->description }}</td>
                <td>{{ $dat->category }}</td>
                <td>{{ $dat->created_at }}</td>
                <td>
                    <a href="{{asset('storage/app/public/'.$dat->link)}}" target="_blank">
                        {{ Form::button(
                            '<i class="fa fa-eye"></i>',
                                [
                                    'class' => 'btn btn-social-icon btn-instagram',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Eliminar'
                                ]
                            )
                        }}
                    </a>
                    @can('files-and-document.delete')
                        <a href="#"
                            data-target="#modal-delete-{{ $dat->id }}"
                            data-toggle="modal" >
                            {{ Form::button(
                                '<i class="fa fa-trash"></i>',
                                    [
                                        'class' => 'btn btn-social-icon btn-warning',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'Eliminar'
                                    ]
                            )}}
                        </a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@foreach ($data as $dat)
    <div class="modal modal-warning fade" id="modal-delete-{{ $dat->id }}">
        {!!  Form::open(['method'=>'delete', 'route'=>['files-and-document.destroy', encrypt($dat->id)]])  !!}
            {{  Form::token() }}
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                <h4 class="modal-title">Eliminar Archivo</h4>
                        </div>
                        <div class="modal-body">
                            <p>Confirme si desea Eliminar el Archivo <strong>{{ $dat->name }}</strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline">Eliminar</button>
                        </div>
                    </div>
                <!-- /.modal-content -->
                </div>
        {!!  Form::close() !!}
        <!-- /.modal-dialog -->
    </div>
@endforeach

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
