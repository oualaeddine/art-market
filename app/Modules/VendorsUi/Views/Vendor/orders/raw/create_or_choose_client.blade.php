@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.select2')
@endpush

@section('content')
    @include('partials.error.error')
    @include('VendorsUi::Vendor.modals.orders.raw.delete-raw-upgrade')
    @include('VendorsUi::Vendor.modals.orders.raw.add-raw-upgrade')

    <form action="{{route('vendor.orders.raw.upgrade',['order'=>$order->id])}}">
        <div class="row">
            <div class="col-sm-12 col-xl-3 col-md-12">
                <div class="card sale-card">
                    <div class="card-header text-center card-border-primary">
                        <h4> Information inseré</h4>
                    </div>
                    <div class="card-body " style="position: relative">
                        <i class="fa fa-map mx-2"></i> <strong style="font-weight: bolder"> Wilaya :</strong>
                        <span class="text-muted">{{$order->wilaya}}</span>
                    </div>

                    <div class="card-body " style="position: relative">
                        <i class="fa fa-map-marker mx-2"></i> <strong style="font-weight: bolder"> Commune :</strong>
                        <span class="text-muted">{{$order->commune}}</span>
                    </div>
                    <div class="card-body " style="position: relative">
                        <i class="fa fa-map-marker-alt mx-2"></i> <strong style="font-weight: bolder"> Address :</strong>
                        <span class="text-muted">{{$order->address}}</span>
                    </div>
                    <div class="card-body " style="position: relative">
                        <i class="fa fa-phone mx-2"></i> <strong style="font-weight: bolder"> Téléphone :</strong>
                        <span class="text-muted phone-input">{{'0'.$order->phone}}</span>
                    </div>
                    <div class="card-body " style="position: relative">
                        <i class="fa fa-calendar mx-2"></i> <strong style="font-weight: bolder"> Créé Le  :</strong>
                        <span class="text-muted">{{$order->created_at}}</span>
                    </div>
                    <div class="card-body " style="position: relative">
                        <i class="fa fa-money-bill-alt mx-2"></i> <strong style="font-weight: bolder"> Total  :</strong>
                        <span class="text-muted">{{number_format($order->total, 2, '.', ',').' DA'}}</span>
                    </div>


                </div>
            </div>
            <div class="col-sm-12 col-xl-9 col-md-12 ">
                <div class="card">
                    <div class="card-header card-border-primary">
                        <h4> Affectation au client</h4>

                    </div>
                    <div class="card-body text-center">
                        <div class="form-check-inline">
                            <input data-id="0" value="0" class="form-check-input" @if($client) checked
                                   @endif  type="radio"
                                   name="type" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Choisir dans la liste
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input data-id="1" value="1" class="form-check-input" type="radio" name="type"
                                   id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Créer un nouveau client
                            </label>
                        </div>
                    </div>


                    <div class="card-body @if(!$client) visually-hidden @endif   box" id="choose_client">


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="x">{{__('Client')}}</label>
                                <select style="width: 100%!important" id="client_id" required name="client_id"
                                        class="form-control input-lg">

                                    @if($client)

                                        <option value="{{$client->id}}"
                                                selected>{{'Nom : '.$client->last_name.' Prénom : '.$client->first_name.' Téléphone : 0'.$client->phone}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="card-body visually-hidden box" id="create_client">
                        <div class="card-block">


                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label class="mb-1">Nom</label>
                                    <input
                                        type="text"
                                        value="{{old('last_name')??$order->full_name}}"
                                        class="form-control mt-1 "
                                        id="last_name"

                                        name="last_name"
                                        placeholder="Nom"
                                        aria-label=""

                                    />
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label class=" mb-1">Prènom</label>
                                    <input
                                        type="text"
                                        class="form-control mt-1"
                                        value="{{old('first_name')??$order->full_name}}"
                                        id="first_name"
                                        name="first_name"
                                        placeholder="Prénom"
                                        aria-label=""

                                    />
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label class="mb-1">Téléphone</label>

                                    <input
                                        type="tel"
                                        class="form-control mt-1 phone-input"
                                        value="{{old('phone')??('0'.$order->phone)}}"
                                        id="phone"
                                        name="phone"
                                        placeholder=""
                                        aria-label=""

                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label class="mb-1">Wilaya</label>
                                    <select name="wilaya_id" id="wilaya_id" class="form-control">
                                        <option value="" disabled="true" selected>Sélectionnez la wilaya</option>

                                        @foreach ($wilayas as $wilaya)
                                            <option
                                                value="{{$wilaya->id}}" @if($client_wilaya && ($wilaya->id==$client_wilaya->id))  selected @endif>{{$wilaya->id .' - '. $wilaya->name}}</option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label class="mb-1">Commune</label>
                                    <select name="commune_id" id="commune_id" class="form-control">
                                        @if($client_commune)
                                            <option value="{{$client_commune->id}}"  selected>{{$client_commune->name}}</option>

                                        @else
                                            <option value="" disabled="true" selected>Sélectionnez la commune</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label class="mb-1">Adress </label>
                                    <input type="text" class="form-control" name="address" value="{{$order->address}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-border-success">
                        <h4> Detail de la commande &nbsp;</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="card-header text-end">
                                <button type="button" class="btn btn-success waves-effect" data-bs-toggle="modal"
                                        data-bs-target="#modals-add-raw-product"> Ajouter un produit
                                </button>
                            </div>
                            <div class="table-card">
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-borderless m-b-0">
                                            <thead class="text-center">
                                            <tr>
                                                <th>Image</th>
                                                <th>Nom de produit</th>
                                                <th>Prix Orignal</th>
                                                <th>Quantite</th>
                                                <th>Prix sous coupon</th>
                                                <th>Coupon</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->products as $key=>$product)
                                                <tr class="text-center">
                                                    <td>
                                                        <img style="width: 50px"
                                                             src="{{asset($product->product->image)}}"
                                                             alt="" class="img-fluid img-20">
                                                    </td>
                                                    <td>
                                                        <input class="visually-hidden"
                                                               value="{{$product->id}}"
                                                               name="product_list[{{$key}}][id]">
                                                        <span>{{$product->product->name_fr}}</span>
                                                    </td>
                                                    <td>
                                                    <span
                                                        class="badge badge-primary">{{number_format($product->price, 2, '.', ',').' DA'}}</span>
                                                    </td>
                                                    <td>
                                                        <input data-id="{{$product->id}}"
                                                               class=" fill form-control input-sm mx-auto qte_change"
                                                               style="max-width: 80%;" value="{{$product->qty}}"
                                                               name="product_list[{{$key}}][qty]">
                                                    </td>

                                                    <td>
                                                        <span>{{number_format(($product->price*$product->qty)-$product->discount, 2, '.', ',').' DA'}}</span>
                                                    </td>
                                                    <td>
                                                <span class="badge badge-primary">
                                                    @if(!is_null($product->discount) && $order->coupon)
                                                        {{'Code : '.$order->coupon->code.' | Valeur : '.$order->coupon->value.' DA'}}
                                                    @else
                                                        Aucun
                                                    @endif
                                                </span>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#upgrade-order-delete"
                                                           onclick="deleteRawProduct({{$product->id}})"
                                                        >
                                                            <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                            @endforeach

                                            <tr class="text-center">

                                                <td colspan="5"></td>
                                                <td style="font-weight: 800">Total</td>
                                                <td style="font-weight: 800">{{number_format($order->total, 2, '.', ',').' DA'}}</td>

                                            </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer text-end">
                <a role="button" href="{{route('admin.orders.raw.index')}}" class="btn btn-danger">Annuler</a>
                <button type="submit" class="btn btn-success btn-phone-send ">Continuez</button>
            </div>
        </div>
    </form>


    @push('js')
        @include('layouts.extra.js.select2')
        <script>

            $('.qte_change').on('input', function () {
                // var id = $(this).data('id');
                // var qty = $(this).val();
                // console.log(id, qty);

            });

            $('.qte_change').on('input', function () {
                var qty = $(this).val();
                if (0 >= qty || Math.floor(qty) !== Number(qty) || qty === null) {
                    $('.btn-send').attr("disabled",true)
                    $(this).addClass('border border-danger');
                    $(this).removeClass('border border-success');
                } else {
                    $('.btn-send').removeAttr("disabled")
                    $(this).removeClass('border border-danger');
                    $(this).addClass('border border-success');
                }

            });


            function deleteRawProduct(id) {

                var url_change_delete_form = '{{ route("vendor.orders.raw.upgrade.product-delete",":order_product") }}';

                url_change_delete_form = url_change_delete_form.replace(':order_product', id);

                $('#form-delete-raw-product').attr('action', url_change_delete_form);

            }

            $(document).ready(function () {


                $('input[type="radio"]').click(function () {
                    var inputValue = $(this).data("id");
                    if (inputValue === 0) {
                        $('#choose_client').removeClass('visually-hidden');
                        $('#create_client').addClass('visually-hidden');

                        $('#client_id').attr('required', true);

                        $('#commune_id').removeAttr('required');
                        $('#wilaya_id').removeAttr('required');
                        $('#phone').removeAttr('required');
                        $('#first_name').removeAttr('required');
                        $('#last_name').removeAttr('required');

                    } else {
                        $('#choose_client').addClass('visually-hidden');
                        $('#create_client').removeClass('visually-hidden');

                        $('#client_id').removeAttr('required');

                        $('#commune_id').attr('required', true);
                        $('#wilaya_id').attr('required', true);
                        $('#phone').attr('required', true);
                        $('#first_name').attr('required', true);
                        $('#last_name').attr('required', true);
                    }
                });

                $('#client_id').select2({
                    placeholder: "écrire...",
                    theme: 'bootstrap4',
                    delay: 200,
                    minimumInputLength: 4,
                    ajax: {
                        url: '{{route('vendor.orders.raw.get.clients')}}',
                        dataType: 'json',
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },
                    }
                });

                $('#product_id').select2({
                    placeholder: "écrire...",
                    theme: 'bootstrap4',
                    delay: 200,
                    minimumInputLength: 4,
                    ajax: {
                        url: '{{route('vendor.orders.raw.get.products')}}',
                        dataType: 'json',
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },
                    }
                });


                $('#wilaya_id').on('change', function () {


                    $('#commune_id').val('');

                    var id = $(this).val();

                    var url_coumne = '{{ route("vendor.orders.raw.get.commune",":id") }}';

                    url_coumne = url_coumne.replace(':id', id);

                    $('#commune_id').select2({
                        /* placeholder: "Start typing ...", */
                        theme: 'bootstrap4',
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


                })
            });

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
