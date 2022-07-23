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
                                    <input class="field__input form-control phone-input" type="tel" name="phone"
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
                                <div class="col-md-6">
                                    <div class="field field__style__one ">
                                        <div class="field__label">{{__("Wilaya")}}</div>
                                        <div class="field__wrap">
                                            <select required class="form-control wilaya_id" name="wilaya"  style="border-radius: 15px;
    border: 1px solid #d9d9e6;
    height: 55px;">
                                                <option value="" selected disabled>{{__('Your wilaya')}}</option>
                                                @foreach($wilayas as $wilaya)
                                                    <option
                                                        value="{{$wilaya->id}}" {{$client->commune->id_wilaya==$wilaya->id?'selected':''}}>{{"( $wilaya->id ) ". $wilaya->{app()->getLocale()=='fr'?'name':'name_ar'} }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field field__style__one ">
                                        <div class="field__label">{{__("Commune")}}</div>
                                        <div class="field__wrap">
                                            <select required class="form-control commune_id"  name="commune_id">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="details__btns">
                    <button class="button details__button btn-phone-send">{{__("Update Profile")}}</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">

            <div class="details__user" style="display:block !important;height: auto">
                <form action="{{route('client.update.avatar')}}" method="POST" class="pos-relative" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="edit__avatar align-items-center">
                        <div class="details__avatar"><img id="imgPreview" src="{{asset($client->avatar??'client.png')}}" alt="Avatar"></div>
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

{{--<x-create-address-modal :wilayas="$wilayas" />--}}



</div>

@push('css')
    @include('layouts.extra.css.select2')
    <style>
        .select2-container{
            width: 100%!important;
        }

    </style>
@endpush
@push('js')
    @include('layouts.extra.js.select2')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    {{--    @vite(['resources/js/wilaya.js'])--}}
    <script>

        $(document).ready(function () {

            $('.wilaya_id').select2({
                /* placeholder: "Start typing ...", */
                theme: 'bootstrap4',
            });


            $('.commune_id').select2({
                /* placeholder: "Start typing ...", */
                theme: 'bootstrap4',
            });

            setTimeout(function (){
                $('.wilaya_id').trigger('change')
                $('.commune_id').append('<option value="{{$client->commune_id}}" selected> {{$client->commune->{app()->getLocale()=='fr'?'name':'name_ar'} }}</option>').trigger('change')
            },1000)

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
        });
    </script>

@endpush
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
