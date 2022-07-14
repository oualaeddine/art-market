<div class="col-md-9">

    <div class="page__header d-flex justify-content-between align-items-center">
        <h5 class="user__page__titles">{{__("Edit profile")}}</h5>
    </div>


    <div class="row justify-content-start">


        <div class="col-md-8">

            <form action="{{route('client.update.profile')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="details__list mt-5">
                    <div class="details__item">
                        <div class="details__fieldset">

                            <div class="row justify-content-start mb-8">
                                <div class="col-md-6">
                                    <div class="field field__style__one">
                                        <div class="field__label"> {{__("Last name")}}</div>
                                        <div class="field__wrap">
                                            <input class="field__input" type="text" name="last_name"
                                                   value="{{$client->last_name}}" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field field__style__one ">
                                        <div class="field__label">{{__("First name")}}</div>
                                        <div class="field__wrap">
                                            <input class="field__input" type="text" name="first_name"
                                                   value="{{$client->first_name}}" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field field__style__one">
                                <div class="field__label">{{__("Phone")}}</div>
                                <div class="field__wrap">
                                    <input class="field__input" type="tel" name="phone"
                                           value="{{'0'.$client->phone}}"  required="">
                                </div>
                            </div>

                            <div class="field field__style__one">
                                <div class="field__label">{{__("Email")}}</div>
                                <div class="field__wrap">
                                    <input class="field__input" type="email" name="email" value="{{$client->email}}"
                                           required="">
                                </div>
                            </div>

                            <div class="row justify-content-start mb-8">
                                <div class="col-md-6">
                                    <div class="field field__style__one">
                                        <div class="field__label">{{__("Password")}}</div>
                                        <div class="field__wrap">
                                            <input class="field__input" type="password" name="password">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field field__style__one ">
                                        <div class="field__label">{{__("Password confirmation")}}</div>
                                        <div class="field__wrap">
                                            <input class="field__input" type="password" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="details__item">
                        <div class="details__category">{{__("Addresses")}}</div>
                        <div class="row justify-content-start">
                            @foreach($client->addresses as $address)
                                <div class="col-md-6">
                                    <div class="profile__address__box"  style="height: auto">
                                        @if($loop->first)
                                            <span class="profile__address__box__default"><i class="fal fa-check"></i>default</span>

                                        @endif
                                        {{--                                    <div class="profile__address__box__name">Nedjai Mohamed</div>--}}
                                        <div class="profile__address__box_adress">{{$address->address}}</div>
                                        <div
                                            class="profile__address__box_country">{{$client->commune->wilaya->{app()->getLocale()=='fr'?'name':'name_ar'}.' - ' .$client->commune->{app()->getLocale()=='fr'?'name':'name_ar'} }}</div>
                                        {{--                                    <div class="profile__address__box_phone">+213 675 60 01 05</div>--}}
                                    </div>
                                </div>

                            @endforeach

                            <div class="col-md-6">
                                <div class="profile__address__box add__new" style="height: auto">
                                    <a class="js-popup-open" data-effect="mfp-zoom-in" tabindex="0"
                                       href="#popup-new-adress"><i class="fal fa-plus-circle"></i>
                                        {{__("ADD ADDRESS")}}</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="details__btns">
                    <button class="button details__button">{{__("Update Profile")}}</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">

            <div class="details__user" style="display:block !important;height: auto">
                <form action="{{route('client.update.avatar')}}" method="POST" class="pos-relative" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="edit__avatar align-items-center">
                        <div class="details__avatar"><img id="imgPreview" src="{{asset($client->avatar??"/website/images/content/avatar-big.jpg")}}" alt="Avatar"></div>
                        <div class="details__wrap">
                            <div class="details__stage">{{__("Profile photo")}}</div>
                            <div class="details__text">{{__("We recommend an image of at least 400x400")}}.</div>
                            <div class="details__file" style="cursor: pointer">
                                <input required class="details__input" id="photo" name="avatar" type="file">
                                <button class="button-stroke button-small details__button" >{{__("Upload")}}</button>
                            </div>
                            <div>

                            </div>
                        </div>

                    </div>
                    <button type="submit" style="position: absolute;top: -7px;right: 19px;font-weight: 900;font-size: x-large;" class=" d-none p-1 text-primary rounded " id="photo_submit"><i class="fal fa-check-circle"></i></button>
                </form>
            </div>

        </div>


    </div>


    <div class="popup popup_connect mfp-hide" id="popup-new-adress">
        <form action="{{route('client.store.address')}}" method="POST">
            @csrf
            <div class="popup__img">
                <i class="fal fa-map"></i>
            </div>
            <h5 class="h5 text-center">{{__("Add new address")}}</h5>

            <div class="billing__item">

                <div class="billing__fieldset">
                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <div class="field field field__style__one select__field">
                                <div class="field__label">{{__("Wilaya")}}</div>
                                <div class="field__wrap">
                                    <select required class="select" name="wilaya" id="wilaya_id">
                                        <option value="" selected disabled>{{__('Your wilaya')}}</option>
                                        @foreach($wilayas as $wilaya)
                                            <option
                                                value="{{$wilaya->id}}">{{"( $wilaya->id ) ". $wilaya->{app()->getLocale()=='fr'?'name':'name_ar'} }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="field field__style__one select__field">
                                <div class="field__label">{{("Commune")}}</div>
                                <div class="field__wrap">
                                    <select required class="select" id="commune_id" name="commune_id">
                                        <option value="" selected disabled>{{__('Your commune')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 pl-0">
                            <div class="field field__style__one">
                                <div class="field__label">ZIP</div>
                                <div class="field__wrap">
                                    <input class="field__input" type="number" name="code_postal">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <div class="field field__style__one">
                                <div class="field__label">{{__("Your address")}}</div>
                                <div class="field__wrap">
                                    <input class="field__input" type="text" name="address" required="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


            <div class="popup__btns">
                <button class="button popup__button" type="submit">{{__("Save address")}}</button>
                <button class="button-stroke popup__button js-popup-close">{{__("Cancel")}}</button>
            </div>
        </form>
    </div>

</div>
<script>
    $(document).ready(()=>{
        $('#photo').change(function(){
            const file = this.files[0];
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    $('#imgPreview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
            $("#photo_submit").removeClass("d-none")


        });
    });
</script>
