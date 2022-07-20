@extends('website.app')

@section('content')

    <div class="outer__inner">
        <div class="cart__container pt-10 pb-25">
            <form action="{{route('checkout.confirmation')}}">
                <div class="container">
                    <div class="container-sidebar row justify-content-start">
                        <div class="col-lg-8 col-12">
                            <div class="text-center mb-10">
                                <h3>{{__("Please fill your information")}}</h3>
                            </div>
                            <div class="billing__form ">
                                <div class="billing__list">
                                    <div class="billing__item">
                                        @include('partials.error.error')
                                        <div class="d-lg-flex justify-content-between align-items-center">
                                            <div class="billing__category">{{__("Your personal information")}} </div>
                                            @guest('client')
                                                <a class="button description__button mt-lg-0 mt-3"
                                                   href="{{route('client.login',['from'=>'checkout'])}}">{{__("Do you have an account?")}}</a>

                                            @endguest
                                        </div>
                                        <div class="billing__fieldset">
                                            <div class="row justify-content-start">
                                                <div class="col-md-6">
                                                    <div class="field field field__style__one">
                                                        <div class="field__label">{{__("Last name")}}</div>
                                                        <div class="field__wrap">
                                                            <input class="field__input" type="text" name="last_name"
                                                                   {{auth()->guard('client')->check()?'readonly':''}}
                                                                   value="{{auth()->guard('client')->check()?auth()->guard('client')->user()->last_name:(old('last_name')??\Illuminate\Support\Facades\Session::get('non_logged_client_info')['full_name']??'')}}"
                                                                   placeholder="{{__("Last name")}}" required=""/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="field field__style__one">
                                                        <div class="field__label">{{__("First name")}}</div>
                                                        <div class="field__wrap">
                                                            <input class="field__input" type="text" name="first_name"
                                                                   {{auth()->guard('client')->check()?'readonly':''}}
                                                                   value="{{auth()->guard('client')->check()?auth()->guard('client')->user()->first_name:(old('first_name')??\Illuminate\Support\Facades\Session::get('non_logged_client_info')['full_name']??'')}}"
                                                                   placeholder="{{__("First name")}}" required=""/>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="row justify-content-start">
                                                <div class="col-md-7">
                                                    <div class="field field field__style__one">
                                                        <div class="field__label">{{__("Phone number")}}</div>
                                                        <div class="field__wrap">
                                                            <input class="field__input form-control phone-input"
                                                                   type="tel"
                                                                   {{auth()->guard('client')->check()?'readonly':''}}
                                                                   value="{{auth()->guard('client')->check()?('0'.auth()->guard('client')->user()->phone):(old('phone')??\Illuminate\Support\Facades\Session::get('non_logged_client_info')['phone']??'')}}"
                                                                   name="phone" placeholder="{{__("Phone number")}}"
                                                                   required=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @auth('client')
                                    <div class="billing__list">
                                        <div class="billing__item">
                                            <div class="billing__category">{{__("Shipping information")}}</div>
                                            <div class="billing__fieldset">
                                                <div class="row justify-content-start">
                                                    <div class="col-md-10">
                                                        <div class="field field field__style__one select__field">
                                                            <div class="field__label">{{__("Address")}}</div>
                                                            <div class="field__wrap">
                                                                <select class="form-control form-select" name="address" required
                                                                        tabindex="-1">
                                                                    <option value="" selected
                                                                            disabled>{{__("Select your address")}}</option>
                                                                    @foreach(auth()->guard('client')->user()->addresses as $address)
                                                                        <option
                                                                            {{(\Illuminate\Support\Facades\Session::get('logged_client_info')['address_id']??'0')==$address->id?'selected':''}}
                                                                            value="{{$address->id}}">{{__('Address')}}{{" : "}}{{$address->address}}{{" | "}}{{__("Commune")}}{{" : "}}{{$address->commune->{app()->getLocale()=='fr'?'name':'name_ar'} }}{{" | "}}{{__("Wilaya")}}{{" : "}}{{$address->commune->wilaya->{app()->getLocale()=='fr'?'name':'name_ar'} }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">

                                                        <a class="" href="javascript:void(0)" data-toggle="modal" data-target="#AddAddressModal" ><i class="fal fa-plus-circle"></i>
                                                            {{__("ADD ADDRESS")}}</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endauth

                                @guest('client')
                                    <div class="billing__list">
                                        <div class="billing__item">
                                            <div class="billing__category">{{__("Shipping information")}}</div>
                                            <div class="billing__fieldset">
                                                <div class="row justify-content-start">
                                                    <div class="col-md-5">
                                                        <div class="field field field__style__one select__field">
                                                            <div class="field__label">{{__("Wilaya")}}</div>
                                                            <div class="field__wrap">
                                                                <input class="field__input" type="text" value="{{old('wilaya')??\Illuminate\Support\Facades\Session::get('non_logged_client_info')['wilaya']??''}}" name="wilaya"

                                                                       placeholder="{{__("Wilaya")}}" required=""/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5">
                                                        <div class="field field__style__one select__field">
                                                            <div class="field__label">{{__("Commune")}}</div>
                                                            <div class="field__wrap">
                                                                <input class="field__input" type="text" value="{{old('commune')??\Illuminate\Support\Facades\Session::get('non_logged_client_info')['commune']??''}}" name="commune"
                                                                       placeholder="{{__("Commune")}}" required=""/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-start">
                                                    <div class="col-md-12">
                                                        <div class="field field__style__one">
                                                            <div class="field__label">{{__("Your address")}}</div>
                                                            <div class="field__wrap">
                                                                <input class="field__input" type="text" value="{{old('address')??\Illuminate\Support\Facades\Session::get('non_logged_client_info')['address']??''}}" name="address"
                                                                       placeholder="{{__("Address")}}" required=""/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endguest
                            </div>

                        </div>

                        <div  class="col-lg-4 col-12 mt-lg-0 mt-10 pl-lg-0">
                            <div class="cart__filters js-activity-filters sidebar__inner">
                                <div class="cart__info">{{__("Cart total")}}</div>

                                <div class="popup__table">
                                    <div class="popup__row">
                                        <div class="popup__col">{{__("Total price")}}</div>
                                        <div
                                            class="popup__col">{{\Gloudemans\Shoppingcart\Facades\Cart::total().trans('DA')}}</div>
                                    </div>
                                    <div class="popup__row">
                                        <div class="popup__col">{{__("Shipping")}}</div>
                                        <div
                                            class="popup__col">{{number_format(\Gloudemans\Shoppingcart\Facades\Cart::content()->sum('options.shipping'),2)}}{{__("DA")}}</div>
                                    </div>
                                    {{--                                    <div class="popup__row">--}}
                                    {{--                                        <div class="popup__col">{{__("TVA fee")}}</div>--}}
                                    {{--                                        <div class="popup__col">0.00 {{__("DA")}}</div>--}}
                                    {{--                                    </div>--}}
                                    <div class="popup__row">
                                        <div class="popup__col">{{__("You will pay")}}</div>
                                        <div
                                            class="popup__col">{{\Gloudemans\Shoppingcart\Facades\Cart::total().trans('DA')}}</div>
                                    </div>
                                </div>

                                <div class="popup__btns">
                                    <button type="submit"
                                            class="button popup__button btn-phone-send">{{__("PROCEED TO CHECKOUT")}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('css')
        @include('layouts.extra.css.select2')
    @endpush
    <style>
        .select2-container{
            width: 100%!important;
        }

    </style>
{{--    <x-create-address-modal :wilayas="$wilayas"/>--}}
    <div class="modal fade" id="AddAddressModal" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('client.store.address')}}" method="POST">
                        @csrf
                        <div class="popup__img">
                            <i class="fal fa-map"></i>
                        </div>
                        <h5 class="h5 text-center">{{__("Add a new address")}}</h5>

                        <div class="billing__item">

                            <div class="billing__fieldset">
                                <div class="row justify-content-start">
                                    <div class="col-md-12">
                                        <div class="field field field__style__one select__field">
                                            <div class="field__label">{{__("Wilaya")}}</div>
                                            <div class="field__wrap">
                                                <select required class="form-control" name="wilaya" id="wilaya_id" style="border-radius: 15px;
    border: 1px solid #d9d9e6;
    height: 55px;">
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
                                                <select required class="form-control" id="commune_id" name="commune_id">
                                                    <option value="" selected disabled>{{__('Your commune')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5 pl-0">
                                        <div class="field field__style__one">
                                            <div class="field__label">{{__("ZIP")}}</div>
                                            <div class="field__wrap">
                                                <input required class="field__input" type="number" name="code_postal" max="99999" min="11111">
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
                            <button class="button-stroke popup__button js-popup-close" data-dismiss="modal">{{__("Cancel")}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        @include('layouts.extra.js.select2')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        {{--    @vite(['resources/js/wilaya.js'])--}}
        <script>

            $(document).ready(function () {

                $('#wilaya_id').select2({
                    /* placeholder: "Start typing ...", */
                    theme: 'bootstrap4',
                });
                $('#commune_id').select2({
                    /* placeholder: "Start typing ...", */
                    theme: 'bootstrap4',
                });

                $('#wilaya_id').on('change', function () {
                    var id = $(this).val();
                    $('#commune_id').val(null).trigger('change');
                    var url_coumne = '{{ route("get.commune",":id") }}';

                    console.log(id);
                    url_coumne = url_coumne.replace(':id', id);

                    $('#commune_id').select2({
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
{{--    @vite(['resources/js/wilaya.js'])--}}
@endsection
