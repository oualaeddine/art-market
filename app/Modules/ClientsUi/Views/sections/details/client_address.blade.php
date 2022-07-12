
{{--@include('ClientsUi::modals.file.edit')--}}


    <div class="{{-- card-block --}} table-border-style">

        <table class="table table-inverse" id="clients_address_table">
            <thead>
            <tr>
                <th></th>
                <th>Identifiant</th>
                <th>Adresse</th>
                <th>Commune </th>
                <th>Code postal </th>
          {{--       <th>Observation </th> --}}
                 <th>Date de création</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($client_addresses as $address)
                <tr>
                    <td></td>
                    <td>{{$address->id}}</td>
                    <td>{{$address->address}}</td>
                    <td>{{$address->commune->name}}</td>
                    <td>{{$address->code_postal}}</td>
                    {{-- <td>{{$address->observation}}</td --}}
                     <td>{{$address->created_at}}</td>
                    <td>@include('ClientsUi::actions.btn-address')</td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

<div class="card-footer text-start">

    <a href="{{route('admin.clients.archived.addresses',['client'=>$client->id])}}" class="btn btn-danger waves-effect mb-2"> Adresses archivées
    </a>
</div>

{{-- </div> --}}
<script>

    function EditAddress(id) {

        var url_change_edit_form = '{{ route("admin.client-address.update",":client_address") }}';

        url_change_edit_form = url_change_edit_form.replace(':client_address', id);

        $('#form-edit-client-address').attr('action', url_change_edit_form);


        var id = id;

        var url_update = '{{ route("admin.client-address.get",":client_address") }}';

        url_update = url_update.replace(':client_address', id);


        $.ajax({
            url: url_update,
            type: 'GET', dataType: 'json',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },

            error: function (error) {

                toastr.error("Something went wrong , try again please !");
            },
            success: function (data) {
                var data = data;

                var newOption = new Option( data.wilaya_name+' - '+data.commune_name, data.commune_id, true, true);
                $('#commune_id_edit').append(newOption).trigger('change');

                $('#address_edit').val(data.address);
                // $('#commune_id_edit').val(data.commune_id);
                $('#observation_c_edit').val(data.observation);
                $('#code_postal_edit').val(data.code_postal);
                // $('#adresse_edit').val(data.adresse);

                $('#commune_id_edit').select2({
                    /* placeholder: "Start typing ...", */
                    theme: 'bootstrap4',
                    minimumInputLength:3,
                    ajax: {
                        url: '{{route('admin.clients.get.commune_wilaya')}}',
                        dataType: 'json',
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },

                    }
                });



                // $('#enterprise_edit').append('<option value="' + data.company_id + '" selected>' + data.company_name + '</option>');
                //
                // $('#secteur_id_edit').append('<option value="' + data.secteur_id + '" selected>' + data.secteur_name + '</option>');

            }
        });

    }
</script>
