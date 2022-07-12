@extends('layouts.master')


@section('content')

    @include('partials.error.error')


    <div class="card">
        <form class="pt-0" action="{{route('admin.vendors.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h4>Utilisateur par default</h4>
            </div>
            <div class="card-body">


                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="mb-1">Email</label>
                        <input
                            type="email"
                            value="{{old('email')}}"
                            class="form-control mt-1"
                            id="email"
                            name="email"
                            aria-label=""
                            required
                        />
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label class=" mb-1">Télephone</label>
                        <input
                            type="tel"

                            class="form-control mt-1 phone-input"
                            value="{{old('phone')}}"
                            id="phone"
                            name="phone"
                            placeholder=""
                            aria-label=""
                            required
                        />
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-4">
                        <label class=" mb-1">Mot de pass</label>
                        <input
                            type="password"
                            class="form-control mt-1"
                            id="password"
                            name="password"
                            placeholder=""
                            aria-label=""
                            required
                        />
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class=" mb-1">Confirmation mot de pass</label>
                        <input
                            type="password"
                            class="form-control mt-1"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder=""
                            aria-label=""
                            required
                        />
                    </div>
                    <div class="form-group col-sm-12 col-md-4">
                        <label class=" mb-1">État</label>
                        <select required name="is_active" class="form-control" id="">
                            <option value="" selected disabled>Sélectionnez un état</option>
                            <option value="1">Actif</option>
                            <option value="0">Non actif</option>
                        </select>
                    </div>
                </div>


            </div>
            <div class="card-header">
                <h4>Informatoin sur le vendor</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="mb-1">Nom en francais</label>
                        <input
                            type="text"
                            value="{{old('name_fr')}}"
                            class="form-control mt-1"
                            id="name_fr"
                            name="name_fr"
                            placeholder=""
                            aria-label=""
                            required
                        />
                    </div>
                    <div class="form-group col-sm-12 col-md-6 text-end">
                        <label class=" mb-1 ">الاسم بالعربي</label>
                        <input
                            dir="rtl"
                            type="text"
                            class="form-control mt-1"
                            value="{{old('name_ar')}}"
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
                        <label class="mb-1">brève description</label>
                        <textarea required class="form-control" name="short_dec_fr" id="" cols="30"
                                  rows="2">{{old('short_dec_fr')}}</textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 text-end">
                        <label class=" mb-1 ">وصف قصير</label>
                        <textarea dir="rtl" required class="form-control" name="short_dec_ar" id="" cols="30"
                                  rows="2">{{old('short_dec_ar')}}</textarea>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="mb-1">Description</label>
                        <textarea required class="form-control" name="desc_fr" id="" cols="30"
                                  rows="4">{{old('desc_fr')}}</textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 text-end">
                        <label class=" mb-1 ">وصف</label>
                        <textarea dir="rtl" required class="form-control" name="desc_ar" id="" cols="30"
                                  rows="4">{{old('desc_ar')}}</textarea>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label class="mb-1">Logo</label>
                        <input required type="file" name="logo_fr" class="form-control">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 text-end">
                        <label class=" mb-1 ">شعار</label>
                        <input required type="file" dir="rtl" name="logo_ar"  class="form-control">
                    </div>

                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-success btn-phone-send">Ajouter</button>

            </div>

        </form>


    </div>

        @push('js')
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

