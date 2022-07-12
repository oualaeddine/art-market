@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')


    <div class="card">
        <div class="card-header">
            <h5>Modifier un client</h5>
        </div>

        <form class="pt-0" action="{{route('admin.clients.update',$client->id)}}" method="POST" id="clients-form" enctype="multipart/form-data">
                @csrf
                @method('put')

        <div class="card-block">

            <div class="row">
                <div class="form-group col-sm-12 col-md-4 ">
                    <label class="mb-1">Nom</label> <b class="text-danger">*</b>
                    <input
                        type="text"
                        class="form-control mt-1 "
                        id="first_name"
                        name="first_name"
                        placeholder="Nom"
                        aria-label=""
                        value="{{$client->first_name??''}}"
                        required
                    />
                </div>
                <div class="form-group col-sm-12 col-md-4 ">
                    <label class=" mb-1">Prènom</label> <b class="text-danger">*</b>
                    <input
                        type="text"
                        class="form-control mt-1"
                        id="last_name"
                        name="last_name"
                        placeholder="Prénom"
                        aria-label=""
                        value="{{$client->last_name??''}}"
                        required
                    />
                </div>

                <div class="form-group col-sm-12 col-md-4 ">
                    <label class="mb-1">Téléphone</label> <b class="text-danger">*</b>

                    <input
                        type="tel"
                        onkeypress="return onlyNumberKey(event)"
                        class="form-control mt-1"
                        id="phone"
                        name="phone"
                        placeholder=""
                        aria-label=""
                        value="{{$client->prinicpal_phone->phone??''}}"
                        required
                    />
                </div>

            </div>

            <div class="row">
                <div class="form-group col-sm-12 col-md-4">
                    <label class="mb-1">Wilaya</label> <b class="text-danger">*</b>
                    <select name="wilaya_id" id="wilaya_id" class="form-control" required>
                        <option value="" disabled="true" selected>Sélectionnez la wilaya</option>

                         @foreach ($wilayas as $wilaya)
                         <option value="{{$wilaya->id}}"@if ($wilaya->name == $client->wilaya) selected @endif>{{$wilaya->id .' - '. $wilaya->name}}</option>
                         @endforeach

                    </select>

                </div>

                <div class="form-group col-sm-12 col-md-4">
                    <label class="mb-1">Commune</label> <b class="text-danger">*</b>
                    <select name="commune_id" id="commune_id" class="form-control" required>
                        <option value="{{$client->commune_id}}" selected>- {{$client->commune->name}}</option>
                    </select>
                </div>

                <div class="form-group col-sm-12 col-md-4">
                    <label class="mb-1">Observation</label>
                    <input
                    type="text"
                    class="form-control mt-1"
                    id="observation"
                    name="note"
                    value="{{$client->note??''}}"

                />
                </div>

            </div>

        </div>

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-success">Modifier</button>
            <a href="{{route('admin.clients.index')}}" class="btn btn-dark">Annuler</a>
        </div>

        </form>

    </div>

    {{--
    </div> --}}

    @push('js')
        @include('layouts.extra.js.select2')

        <script>

            $(document).ready(function () {



                $('#wilaya_id').on('change',function(){

                    var id = $(this).val();

                    $('#commune_id').val('');

                    var url_coumne = '{{ route("admin.clients.get.commune",":id") }}';

                    url_coumne = url_coumne.replace(':id', id);

                    $('#commune_id').select2({
                            /* placeholder: "Start typing ...", */
                            theme: 'bootstrap4',
                            ajax: {
                                url: url_coumne,
                                dataType: 'json',
                                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                                processResults: function(data) {
                                    return {
                                        results: data
                                    };
                                },

                            }
                    });

                })

            });


        </script>

    @endpush
    <script>
        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>

@endsection

