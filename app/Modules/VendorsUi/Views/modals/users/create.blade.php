<div class="modal fade" id="modals-add-vendor-user" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0"  action="{{route('admin.vendors.users.store',['vendor'=>$vendor->id])}}"
                  method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un utilisateur</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="mb-1">Email</label> <b class="text-danger">*</b>
                                <input
                                    type="email"

                                    class="form-control mt-1"
                                    id=""
                                    value="{{old('email')}}"
                                    name="email"
                                    aria-label=""
                                    required
                                />
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class=" mb-1">Télephone</label> <b class="text-danger">*</b>
                                <input
                                    type="tel"
                                    value="{{old('phone')}}"
                                    class="form-control mt-1 phone-input"
                                    id=""
                                    name="phone"
                                    placeholder=""
                                    aria-label=""
                                    required
                                />
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class=" mb-1">Mot de passe</label>
                                <input
                                    type="password"
                                    class="form-control mt-1"
                                    name="password"
                                    placeholder=""
                                    aria-label=""
                                />
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class=" mb-1">Confirmation de mot de passe</label>
                                <input
                                    type="password"
                                    class="form-control mt-1"
                                    name="password_confirmation"
                                    placeholder=""
                                    aria-label=""
                                />
                            </div>

{{--                            <div class="form-group col-sm-12 col-md-4">--}}
{{--                                <label class=" mb-1">État</label> <b class="text-danger">*</b>--}}
{{--                                <select required name="is_active" class="form-control" id="">--}}
{{--                                    <option value="1">Actif</option>--}}
{{--                                    <option value="0">Non actif</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

                        </div>
                        <div class="form-group col-sm-12">
                            <label for="category">Rôles</label>

                            <select required style="width: 100%!important;"
                                    class="js-example-basic-single4 col-sm-12 select2-hidden-accessible"
                                    name="roles[]" multiple="multiple">

                                @foreach($roles as  $role)
                                    <option value="{{$role->id}}">{{$role->ref}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-phone-send">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .card .card-header h5:after {

        display: none !important;

    }
</style>
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

