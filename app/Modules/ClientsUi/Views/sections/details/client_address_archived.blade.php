
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
                    <td>@include('ClientsUi::actions.btn-address-archived')</td>

                </tr>

                @endforeach

            </tbody>

        </table>

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


                $('#address_edit').val(data.address);
                $('#commune_id_edit').val(data.commune_id);
                $('#observation_c_edit').val(data.observation);
                $('#code_postal_edit').val(data.code_postal);
                // $('#adresse_edit').val(data.adresse);

                $('#commune_id_edit').select2({
                    theme: 'bootstrap4',
                });



                // $('#enterprise_edit').append('<option value="' + data.company_id + '" selected>' + data.company_name + '</option>');
                //
                // $('#secteur_id_edit').append('<option value="' + data.secteur_id + '" selected>' + data.secteur_name + '</option>');

            }
        });

    }
</script>
