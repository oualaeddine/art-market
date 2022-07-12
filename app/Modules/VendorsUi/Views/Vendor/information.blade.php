@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.select2')
    <style>
        .error{
            color: red;
        }
    </style>
@endpush

@section('content')

    @include('partials.error.error')


    <div class="card">
        <form name="update_vendor_user" class="add-new-record modal-content pt-0"  action="{{route('vendor.profile.update')}}"
              method="POST">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h4 class="modal-title">Modifier un utilisateur</h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6">
                            <label class="mb-1">Nom en francais</label><b class="text-danger">*</b>
                            <input
                                type="text"
                                value="{{$vendor->name_fr}}"
                                class="form-control mt-1"
                                id="name_fr"
                                name="name_fr"
                                placeholder=""
                                aria-label=""
                                required
                            />
                        </div>
                        <div class="form-group col-sm-12 col-md-6 text-end">
                            <label class=" mb-1 "><b class="text-danger">*</b>الاسم بالعربي </label>
                            <input
                                dir="rtl"
                                type="text"
                                class="form-control mt-1"
                                value="{{$vendor->name_ar}}"
                                id="name_ar"
                                name="name_ar"
                                placeholder=""
                                aria-label=""
                                required
                            />
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6">
                            <label class="mb-1">brève description</label><b class="text-danger">*</b>
                            <textarea required class="form-control" name="short_dec_fr" id="" cols="30"
                                      rows="2">{{$vendor->short_dec_fr}}</textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 text-end">
                            <label class=" mb-1 "> <b class="text-danger">*</b>وصف قصير</label>
                            <textarea dir="rtl" required class="form-control" name="short_dec_ar" id="" cols="30"
                                      rows="2">{{$vendor->short_dec_ar}}</textarea>
                        </div>

                    </div>
{{--                    <div class="row">--}}
{{--                        <div class="form-group col-sm-12 col-md-6">--}}
{{--                            <label class="mb-1">Description</label><b class="text-danger">*</b>--}}
{{--                            <textarea required class="form-control" name="desc_fr" id="" cols="30"--}}
{{--                                      rows="4">{{$vendor->desc_fr}}</textarea>--}}
{{--                        </div>--}}
{{--                        <div class="form-group col-sm-12 col-md-6 text-end">--}}
{{--                            <label class=" mb-1 "> <b class="text-danger">*</b>وصف</label>--}}
{{--                            <textarea dir="rtl" required class="form-control" name="desc_ar" id="" cols="30"--}}
{{--                                      rows="4">{{$vendor->desc_ar}}</textarea>--}}
{{--                        </div>--}}

{{--                    </div>--}}
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6 ">
                            <label class="mb-1">Logo</label>
                            <input  type="file" name="logo_fr" class="form-control">
                            <span><a target="_blank"  href="{{asset($vendor->logo_fr)}}">voir</a></span>

                        </div>
                        <div class="form-group col-sm-12 col-md-6 ">
                            <label class="mb-1">Actif</label>
                            <select required name="is_active" id="" class="form-control">
                                <option {{$vendor->is_active===1?'selected':''}} value="1">Oui</option>
                                <option {{$vendor->is_active===0?'selected':''}} value="0">Non</option>
                            </select>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary waves-effect waves-light btn-phone-send ">Modifier</button>
            </div>
        </form>

    </div>


    @push('js')
        @include('layouts.extra.js.select2')




        <script>

            const PhoneRegEx = /^0\d{9}$/g;
            const PhoneRegEx2 = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
            const PhoneRegEx3 = /^\d{9}$/g;
            const PhoneRegEx4 = /^[0-9]{1,2}?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;


            $('.phone-input').on('input',function(){
                var phone=$(this).val();
                $(this).removeClass('border-danger')

                if($(this).val().length >= 9 && $(this).val().length <= 14 ){

                    if (
                        ($(this).val().match(PhoneRegEx) ||
                            $(this).val().match(PhoneRegEx2)||
                            $(this).val().match(PhoneRegEx3) ||
                            $(this).val().match(PhoneRegEx4))

                        && (
                            phone.startsWith('00213') && phone.length===14 ||
                            phone.startsWith('0213') && phone.length===13 ||
                            phone.startsWith('213') && phone.length===12 ||
                            phone.startsWith('+213') && phone.length===13 ||
                            (phone.startsWith('5') || phone.startsWith('6') || phone.startsWith('7')) && phone.length===9 ||
                            phone.startsWith('0')  && phone.length===10
                        )

                    ) {

                        $('.btn-phone-send').attr('disabled',false)
                        $(this).addClass('border-success')
                        $(this).removeClass('border-danger')
                        $('.invalid-phone').hide()

                    }else{

                        $('.btn-phone-send').attr('disabled',true)
                        $(this).removeClass('border-success')
                        $(this).addClass('border-danger')
                        $('.invalid-phone').show()

                    }
                }else{
                    $('.btn-phone-send').attr('disabled',true)
                    $(this).removeClass('border-success')
                    $(this).addClass('border-danger')
                    $('.invalid-phone').show()
                }
            })


        </script>

    @endpush


@endsection
