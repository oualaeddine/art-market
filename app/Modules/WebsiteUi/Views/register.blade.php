@extends('website.app')
@push('css')
    @include('layouts.extra.css.select2')

@endpush

@section('content')
    <style>
        .select .list{
            max-height: 20rem;
            overflow-y: scroll
        }

    </style>
    <div class="container ">
        <div class="row justify-content-center">
            <div class=" col-sm col-md-4">
                <div class="signin_page_coodiv my-10">
                    <div class="h4 mt-8 entry__title">{{__("Sign up")}}</div>
                    @include('partials.error.error')

                    <div class="field_signin_page">
                        <form action="{{route('client.register.action')}}" method="POST" id="register-form">
                            @csrf
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input" value="{{old('last_name')}}" type="text" name="last_name"
                                           placeholder="{{__("Your last name")}}" id="last_name">
                                    <div class="field__icon">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input" type="text" value="{{old('first_name')}}" name="first_name"
                                           placeholder="{{__("Your first name")}}" id="first_name">
                                    <div class="field__icon">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input form-control  phone-input" value="{{old('phone')}}"
                                           type="tel" name="phone" autocomplete="off"
                                           placeholder="{{__("Your phone")}}">
                                    <div class="field__icon">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input form-control "  value="{{old('email')}}"
                                           type="email" name="email" autocomplete="off"
                                           placeholder="{{__("Your email")}}">
                                    <div class="field__icon">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input" type="password" name="password" placeholder="{{__("Password")}}">
                                    <div class="field__icon">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <input required class="field__input" type="password" name="password_confirmation" placeholder="{{__("Password confirmation")}}">
                                    <div class="field__icon">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <select required class="form-control" name="wilaya" id="wilaya_id" >
                                        <option value="" selected disabled>{{__('Your wilaya')}}</option>
                                            @foreach($wilayas as $wilaya)
                                            <option value="{{$wilaya->id}}" {{$wilaya->id==old('wilaya')?'selected':''}}>{{"( $wilaya->id ) ". $wilaya->{app()->getLocale()=='fr'?'name':'name_ar'} }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="field field_icon mb-3">
                                <div class="field__wrap">
                                    <select required class="form-control"  id="commune_id" name="commune_id">
                                        @if(\Illuminate\Support\Facades\Session::get('commune'))
                                            <option value="{{\Illuminate\Support\Facades\Session::get('commune')['id']}}" selected>{{\Illuminate\Support\Facades\Session::get('commune')['name']}}</option>
                                        @else
                                            <option value="" selected disabled>{{__('Your commune')}}</option>

                                        @endif
                                    </select>
                                </div>
                            </div>
                            <button type="submit"
                                    class="button entry__button d-flex w-100 mt-10 btn-phone-send">{{__("Sign up")}}</button>
                        </form>
                    </div>
                    <div class="signin__page__info">{{__("Already have an account?")}} <a
                            href="{{route('client.login')}}">{{__("Sign in")}}</a></div>

                </div>
            </div>
        </div>
    </div>

    @push('js')
        @include('layouts.extra.js.select2')

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


@endsection
