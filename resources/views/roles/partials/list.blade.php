@push('css')
    <link href="{{ asset('/plugins/DataTable/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<table class="table table-bordered data-table display nowrap" style="width:100%">
    <thead>
        <th width="10%">ID</th>
        <th width="30%">Rol</th>
        <th width="40%">Descripción</th>
        <th width="20%">Acciones</th>
    </thead>
    <tbody>
        @foreach ($roles as $rol)
            <tr>
                <td>{{ $rol->id }}</td>
                <td>{{ $rol->name }}</td>
                <td>{{ $rol->description }}</td>
                <td class="text-center">
                    @can('role.update')
                        <a href="{{ URL::action('RolesController@edit',encrypt($rol->id)) }}">
                            {{ Form::button(
                                '<i class="fa fa-edit"></i>',
                                    [
                                        'type' => 'submit',
                                        'class' => 'btn btn-primary btn-sm',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'Editar'
                                    ]
                            )}}
                        </a>
                    @endcan
                    @can('role.delete')
                        <a href="#"
                            data-target="#modal-delete-{{ $rol->id }}"
                            data-toggle="modal" >
                            {{ Form::button(
                                '<i class="fa fa-trash"></i>',
                                    [
                                        'class' => 'btn btn-warning btn-sm',
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

@foreach ($roles as $rol)
    <div class="modal modal-warning fade" id="modal-delete-{{ $rol->id }}">
        {!!  Form::open(['method'=>'delete', 'route'=>['roles.destroy', encrypt($rol->id)]])  !!}
            {{  Form::token() }}
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                <h4 class="modal-title">Eliminar Rol</h4>
                        </div>
                        <div class="modal-body">
                            <p>Confirme si desea Eliminar el rol <strong>{{ $rol->name }}</strong></p>
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
