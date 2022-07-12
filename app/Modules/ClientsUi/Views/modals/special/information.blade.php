<div class="modal fade" id="modals-edit_info_spec"  role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action="{{route('admin.client-profile.update-special-info',['client'=>$client->id])}}"
                  method="POST" id="product-form">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Modifier les informations principales</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-header">

                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="mb-1">Nom</label> <b class="text-danger">*</b>
                                    <input
                                        required

                                        type="text"
                                        class="form-control"
                                        id="last_name"
                                        name="last_name"
                                        placeholder=""
                                        aria-label=""

                                    />
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="mb-1">Prénom</label> <b class="text-danger">*</b>
                                    <input
                                        required

                                        type="text"
                                        class="form-control"
                                        id="first_name"
                                        name="first_name"
                                        placeholder=""
                                        aria-label=""

                                    />
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="mb-1">Wilaya</label> <b class="text-danger">*</b>
                                    <select name="wilaya" id="wilaya" class="form-control" required>
                                        @foreach ($wilayas as $wilaya)
                                            <option value="{{$wilaya->name}}" data-id="{{$wilaya->id}}" >{{$wilaya->id .' - '. $wilaya->name}}</option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="form-group col-sm-12 col-md-6 ">
                                    <label class="mb-1">Commune</label> <b class="text-danger">*</b>
                                    <select name="commune_id" id="commune_id" class="form-control" required>
{{--                                        @if($client->commune_id)--}}
{{--                                        <option value="{{$client->commune_id}}" selected>{{$client->commune->name}}</option>--}}
{{--                                            @endif--}}
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="mb-1">Numéro de téléphone</label> <b class="text-danger">*</b>
                                    <input
                                        required
                                        type="tel"

                                        class="form-control phone-input"
                                        id="phone"
                                        name="phone"
                                        placeholder=""
                                        aria-label=""

                                    />
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="mb-1">Email</label> <b class="text-danger">*</b>
                                    <input
                                        required
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email"
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
                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-phone-send ">Modifier</button>
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

