<div class="modal fade" id="modal-delete-{{ $med->id_medico }}">
    <div class="modal-dialog">
    <form action="{{ route('medico.destroy', $med->id_medico) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar medico</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseas eliminar el medico {{ $med->nombre }}</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline-light">Eliminar</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </form>
    <!-- /.modal-dialog -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->