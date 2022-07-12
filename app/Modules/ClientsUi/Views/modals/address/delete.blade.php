<div class="modal fade" id="modals-delete-client-address" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="form-delete-client-address" method="POST">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Archiver une adresse</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>êtes-vous sûr de archiver cette adresse ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function DeleteAddress(id) {


        var url_change_delete_form = '{{ route("admin.client-address.delete",":client_address") }}';

        url_change_delete_form = url_change_delete_form.replace(':client_address', id);

        $('#form-delete-client-address').attr('action', url_change_delete_form);

    }
</script>
