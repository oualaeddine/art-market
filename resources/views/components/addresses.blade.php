<div class="col-md-9">
    <div class="details__item">
        <div class="details__category">{{__("Addresses")}}</div>
        <div class="row justify-content-start">
            @foreach($client->addresses as $address)
                <x-address-card :address="$address"/>
            @endforeach

            <div class="col-md-6">
                <div class="profile__address__box add__new" style="height: auto">
                    <a class="" href="javascript:void(0)" data-toggle="modal" data-target="#AddAddressModal"><i
                            class="fal fa-plus-circle"></i>
                        {{__("ADD ADDRESS")}}</a>
                </div>
            </div>

        </div>
    </div>

    <x-create-address-modal :wilayas="$wilayas"/>
    <x-edit-address-modal :wilayas="$wilayas"/>
    <x-delete-address/>

</div>

@push('css')
    @include('layouts.extra.css.select2')
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
@endpush
@push('js')
    @include('layouts.extra.js.select2')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script>
        function DeleteAddress(id) {
            var url_change_edit_form = '{{ route("client.delete.address", ":client_address") }}';

            url_change_edit_form = url_change_edit_form.replace(':client_address', id);

            $('#DeleteAddressForm').attr('action', url_change_edit_form);
        }

        function EditAddress(address_id,wilaya_id,commune_id,commune_name,zip,address) {

            $("#zip_edit").val(zip)
            $("#address_edit").val(address)
            $(".wilaya_id_edit").val(wilaya_id).trigger('change')
            $('.commune_id_edit').append('<option value="'+commune_id+'" selected>'+commune_name+'</option>').trigger('change')

            var url_change_edit_form = '{{ route("client.update.address", ":client_address") }}';

            url_change_edit_form = url_change_edit_form.replace(':client_address', address_id);

            $('#form-edit-address').attr('action', url_change_edit_form);
        }

        $(document).ready(function () {


            $('.wilaya_id').select2({
                /* placeholder: "Start typing ...", */
                theme: 'bootstrap4',
            });


            $('.commune_id').select2({
                /* placeholder: "Start typing ...", */
                theme: 'bootstrap4',
            });


            $('.wilaya_id_edit').select2({
                /* placeholder: "Start typing ...", */
                theme: 'bootstrap4',
            });


            $('.commune_id_edit').select2({
                /* placeholder: "Start typing ...", */
                theme: 'bootstrap4',
            });

            $('.wilaya_id').on('change', function () {
                var id = $(this).val();
                $('.commune_id').val(null).trigger('change');
                var url_coumne = '{{ route("get.commune",":id") }}';

                console.log(id);
                url_coumne = url_coumne.replace(':id', id);

                $('.commune_id').select2({
                    /* placeholder: "Start typing ...", */
                    // theme: 'bootstrap4',
                    ajax: {
                        url: url_coumne,
                        dataType: 'json',
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },

                    }
                });

            });

            $('.wilaya_id_edit').on('change', function () {
                var id = $(this).val();
                $('.commune_id_edit').val(null).trigger('change');
                var url_coumne = '{{ route("get.commune",":id") }}';

                console.log(id);
                url_coumne = url_coumne.replace(':id', id);

                $('.commune_id_edit').select2({
                    /* placeholder: "Start typing ...", */
                    // theme: 'bootstrap4',
                    ajax: {
                        url: url_coumne,
                        dataType: 'json',
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },

                    }
                });

            });
        });
    </script>

@endpush

