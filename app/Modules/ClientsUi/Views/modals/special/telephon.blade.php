<div class="modal fade" id="modals-edit_tele_spec" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action="{{route('admin.client-profile.update-special-tele',['client'=>$client->id])}}"
                  method="POST" id="product-form">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Modifier un téléphone</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-header">

                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="mb-1">Numéro de téléphone</label>
                                    <input
                                        required
                                        value="{{$client->phone}}"
                                        type="tel"
                                        onkeypress="return onlyNumberKey(event)"
                                        class="form-control"
                                        id="phone"
                                        name="phone"
                                        placeholder=""
                                        aria-label=""

                                    />
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .card .card-header h5:after {

        display: none !important;

    }
</style>

<script>
    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
