@include('layouts.extra.css.select2')

<style>
    .select2-container--default .select2-selection--single {
        background-color: rgb(255 255 255);
        border: 1px solid rgb(170 170 170);
        border-radius: 4px;
        height: 40px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: rgb(68 68 68);
        line-height: 38px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        position: absolute;
        top: 7px;
        right: 1px;
        width: 20px;
    }
</style>


<div class="col-md-12">

    <div class="row">
        <div class="form-group col-sm-12 col-md-6">
            <label>Full Name
            </label>
            <input type="text"
                   value="{{auth()->guard('client')->user()->last_name .' '.auth()->guard('client')->user()->first_name }}"
                   readonly
                   class="form-control" placeholder="Entrez votre nom et prénom">
        </div>
        <div class="form-group col-sm-12 col-md-6">
            <label>Phone
            </label>
            <input type="text" value="{{'0'.auth()->guard('client')->user()->phone}}" readonly
                   class="form-control" placeholder="Entrez votre numéro de téléphone">
        </div>

        <div class="form-group col-sm-12">

            <input type="hidden" name="coupon" value="{{$coupon->code??''}}">
            <label>Adresse</label>
            <select required name="address_id" class="form-control">
                <option value="" selected disabled>Séléctioner une adresse</option>

                @foreach($client->client_address as $address)
                    <option
                        value="{{$address->id}}">{{$address->address .' | '.$address->commune->yalidineWilaya->name. ' | '.$address->commune->name}}
                    </option>
                @endforeach
            </select>

        </div>
    </div>
</div>
@push('js')
    @include('layouts.extra.js.select2')
    <script>
        $('.commune_address_id').select2({
            /* placeholder: "Start typing ...", */
            // theme: 'bootstrap4',
        });
    </script>
@endpush
