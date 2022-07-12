<div class="row">
    <input type="hidden" name="coupon" value="{{$coupon->code??''}}">
    <div class="form-group col-sm-12 col-md-6">
        <label>{{__("Nom complet")}}</label> <b class="text-danger">*</b>
        <input type="text" value="{{old('full_name')}}" name="full_name" required
               class="form-control" placeholder="{{__("Entrez votre nom et prénom")}}">
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label>{{__("Téléphone")}} </label> <b class="text-danger">*</b>
        <input type="text" value="{{old('phone')}}" name="phone" required
               class="form-control phone-input" placeholder="{{__("Entrez votre numéro de téléphone")}}">
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label>{{__("Wilaya")}}
        </label>
        <input type="text" value="{{old('wilaya')}}" name="wilaya"
               class="form-control" placeholder="{{__("Entrez votre wilaya")}}">
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label>{{__("Commune")}}
        </label>
        <input type="text" value="{{old('commune')}}" name="commune"
               class="form-control" placeholder="{{__("Entrez votre commune")}}">
    </div>
    <div class="form-group col-sm-12">
        <label>{{__("Adresse")}}
        </label>
        <input type="text" value="{{old('address')}}" name="address"
               class="form-control" placeholder="{{__("Entrez votre Address")}}">
    </div>
</div>
