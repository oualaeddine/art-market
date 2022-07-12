<div id="address-prototype" class="mt-3 d-none">

    <div class="row address mt-3">
        <input type="hidden" name="address_store" value="true">

        <div class="form-group col-sm-12 col-md-6">
            <label class="mb-1">Adresse</label>
            <input
                type="text"
                required
                class="form-control set-req"
                id="address"
                name="address_liste[address][]"
                placeholder=""
                aria-label=""

            />
        </div>

        <div class="form-group col-sm-12 col-md-6">
            <label class="mb-1">Commune</label>
            <select name="address_liste[commune_id][]" class="form-control commune_address_id" required>
                <option value="" disabled="true" selected>Sélectionner une commune</option>
                @foreach ($communes as $s)

                    <option value="{{$s->id}}">{{$s->name}}</option>

                @endforeach
            </select>

        </div>


        <div class="form-group col-sm-12 col-md-3">
            <label class="mb-1">Code postal</label>
            <input
                type="number"
                min="0"
                {{-- required --}}
                class="form-control set-req"
                id="code_postal"
                name="address_liste[code_postal][]"
                placeholder=""
                aria-label=""

            />
        </div>

        <div class="col-md-2 mt-2">
            <a class="btn btn-icon delete-address"><i class="fa fa-trash mt-4"></i></a>
        </div>
        <hr>

    </div>

</div>
