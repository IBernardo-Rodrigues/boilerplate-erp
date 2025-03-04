<div class="modal modal-confirm-delete" id="modal-confirm-delete" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <span class="material-icons">
                    warning
                </span>
                <h4>Deseja mesmo excluir este registro?</h4>
                <p>Sera excluído para sempre!</p>

                <div class="d-flex justify-content-end gap-3 mt-5">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>