@extends('website.layouts.master')

@push('css')

    @include('layouts.extra.css.select2')
    <style>
        .select2-container--default .select2-selection--single {
            background-color: rgb(255 255 255);
            border: 1px solid rgb(170 170 170);
            border-radius: 4px;
            height: 40px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: rgb(68 68 68);
            line-height: 38px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 7px;
            right: 1px;
            width: 20px;
        }
    </style>

@endpush

@section('content')

    @include('WebsiteUi::modals.delete-order')
    @include('WebsiteUi::modals.create-address')

    <section class="checkout-section ptb-70">

        <div class="container">

            <div class="row">
                <div class="col-lg-3">
                    <div class="account-sidebar account-tab mb-sm-30">
                        <div class="dark-bg tab-title-bg">
                            <div class="heading-part">
                                <div class="sub-title"><span></span> {{__("Mon compte")}}</div>
                            </div>
                        </div>
                        <div class="account-tab-inner">
                            <ul class="account-tab-stap">
                                <li id="step1" class="active"><a href="javascript:void(0)">{{__("Mon tableau de bord")}}
                                        <i class="fa fa-angle-right"></i> </a></li>
                                <li id="step2"><a href="javascript:void(0)">{{__("Détails du compte")}}<i
                                            class="fa fa-angle-right"></i> </a></li>
                                <li id="step3"><a href="javascript:void(0)">{{__("Mes commandes")}}<i
                                            class="fa fa-angle-right"></i> </a></li>
                                <li id="step6"><a href="javascript:void(0)">{{__("Mes adresses")}}<i
                                            class="fa fa-angle-right"></i> </a></li>
                                <li id="step4"><a href="javascript:void(0)">{{__("Mes coupons")}}<i
                                            class="fa fa-angle-right"></i> </a></li>
                                <li id="step5"><a href="javascript:void(0)">{{__("Changer le mot de passe")}}<i
                                            class="fa fa-angle-right"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div id="data-step1" class="account-content" data-temp="tabdata">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading-part heading-bg mb-30">
                                    <h2 class="heading m-0">{{__("Tableau de bord du compte")}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="mb-30">
                            <div class="row">
                                <div class="col-12">
                                    <div class="heading-part">
                                        <h3 class="sub-heading">{{__("Bonjour")}}, {{$client->name}}</h3>
                                    </div>
                                    <p>{{__("Bienvenue dans votre compte, où vous pouvez consulter et contrôler vos paramètres.")}}</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="m-0">
                          <div class="row">
                            <div class="col-12 mb-20">
                              <div class="heading-part">
                                <h3 class="sub-heading">Account Information</h3>
                              </div>
                              <hr>
                            </div>
                            <div class="col-md-6">
                              <div class="cart-total-table address-box commun-table">
                                <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Shipping Address</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td><ul>
                                            <li class="inner-heading"> <b>Denial tom</b> </li>
                                            <li>
                                              <p>5-A kadStylexpoi aprtment,opp. vasan eye care,</p>
                                            </li>
                                            <li>
                                              <p>Risalabaar,City Road, deesa-405001.</p>
                                            </li>
                                            <li>
                                              <p>India</p>
                                            </li>
                                          </ul></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="cart-total-table address-box commun-table">
                                <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Billing Address</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>
                                          <ul>
                                            <li class="inner-heading"> <b>Denial tom</b> </li>
                                            <li>
                                              <p>5-A kadStylexpoi aprtment,opp. vasan eye care,</p>
                                            </li>
                                            <li>
                                              <p>Risalabaar,City Road, deesa-405001.</p>
                                            </li>
                                            <li>
                                              <p>India</p>
                                            </li>
                                          </ul>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> --}}
                    </div>
                    <div id="data-step2" class="account-content" data-temp="tabdata" style="display:none">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading-part heading-bg mb-30">
                                    <h2 class="heading m-0">{{__("Détails du compte")}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="m-0">
                            <form class="main-form full" action="{{route('update.profile',$client->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="mb-20">
                                    <div class="row">
                                        <div class="col-12 mb-20">
                                            <div class="heading-part">
                                                <h3 class="sub-heading">{{__("Informations sur le client")}}</h3>
                                            </div>
                                            <hr>
                                        </div>

                                        <div class="col-6">
                                            <div class="input-box">
                                                <label for="login-email">{{__("Prénom")}}</label>
                                                <input name="first_name" value="{{$client->first_name}}" type="text"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="input-box">
                                                <label for="login-email">{{__("Nom")}}</label>
                                                <input name="last_name" value="{{$client->last_name}}" type="text"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="input-box">
                                                <label for="register_phone">{{__("Numéro de téléphone")}}</label>
                                                <input id="register_phone" class="phone-input" value="{{'0'.$client->phone}}" name="phone"
                                                       type="tel" required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="input-box">
                                                <label for="register_email">{{__("Email")}}</label>
                                                <input id="register_email" value="{{$client->email}}" name="email"
                                                       type="email" required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="input-box">
                                                <label for="login-email">{{__("Wilaya")}}</label>
                                                <select required name="wilaya" id="wilaya_id" class="form-control">
                                                    @foreach($wilayas as $wilaya)
                                                        <option value="{{$wilaya->name}}"
                                                                @if ($wilaya->name == $client->wilaya) selected
                                                                @endif data-id="{{$wilaya->id}}">{{(\Illuminate\Support\Facades\Session::getId('client_lang')?$wilaya->name_ar:$wilaya->name) ." ($wilaya->id)"}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="input-box">
                                                <label for="login-email">{{__('Commune')}}</label>
                                                <select id="commune_id" required name="commune_id" class="form-control">
                                                    <option value="{{$client->commune->id}}"
                                                            selected>{{\Illuminate\Support\Facades\Session::getId('client_lang')?($client->commune->name_ar??$client->commune->name):$client->commune->name}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 text-right">
                                            <button class="btn-color btn-phone-send" type="submit"
                                                    name="submit">{{__("Modifier")}}</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="data-step3" class="account-content" data-temp="tabdata" style="display:none">
                        <div id="form-print" class="admission-form-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="heading-part heading-bg mb-30">
                                        <h2 class="heading m-0">{{__("Mes commandes")}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($client_orders->orders->isNotEmpty())

                                    <div class="col-12 mb-xs-30">
                                        <div class="cart-item-table commun-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    @foreach ($client_orders->orders as $item)

                                                        <thead>
                                                        <tr>Address : {{$item->address->address}}</tr>
                                                        <tr>
                                                            <th colspan="4">
                                                                <ul>
                                                                    <li><span>{{__("Date de commande")}}</span>
                                                                        <span>{{date('d M Y', strtotime($item->created_at))}}</span>
                                                                    </li>
                                                                    <li class="price-box"><span>{{__("Total")}}</span>
                                                                        <span
                                                                            class="price"> {{number_format($item->total, 2, '.', ',')}} {{__("DA")}}</span>
                                                                    </li>
                                                                    <li class="price-box"><span>{{__("Statut")}}</span>
                                                                        @switch($item->status)
                                                                            @case('pending')
                                                                            <span class="text-warning price">
                                        {{__("en attente")}}
                                      </span>
                                                                            @break
                                                                            @case('canceled')
                                                                            <span class="text-danger price">
                                            {{__("Annulé")}}
                                        </span>

                                                                            @break
                                                                            @case('confirmed')
                                                                            <span class="text-success price">
                                            {{__("Confirmé")}}
                                        </span>

                                                                            @break
                                                                            @case('completed')
                                                                            <span class="text-primary price">
                                            {{__("Terminé")}}
                                        </span>

                                                                            @break

                                                                        @endswitch

                                                                    </li>
                                                                    <li>
                                                                        <span>{{__("Suivie")}}</span>
                                                                        <span>{{$item->tracking_code}}</span>
                                                                    </li>
                                                                    <li>
                                   <span>{{__("N°")}}  #{{sprintf("%'06d", $item->id)}}
                                       @if ($item->status == "confirmed" || $item->status == "pending")
                                           <a data-toggle="modal" data-target="#modals-order"
                                              onclick="DeleteOrder({{$item->id}})"><i
                                                   class="fa fa-trash text-danger ml-3"></i></a>
                                       @endif
                                  </span>

                                                                    </li>
                                                                </ul>
                                                            </th>
                                                        </tr>
                                                        </thead>


                                                        <tbody>
                                                        @foreach ($item->orderProducts as $op)

                                                            <tr>
                                                                <td>
                                                                    <a href="{{route('product',$op->product_id)}}">
                                                                        <div class="product-image">
                                                                            @if ($op->product->image != null)
                                                                                <img alt="Stylexpo"
                                                                                     src="{{asset($op->product->image)}}"
                                                                                     class="image-cart">
                                                                            @else
                                                                                <img alt="Stylexpo"
                                                                                     src="website/assets/images/product/product_1_md.jpg">
                                                                            @endif

                                                                        </div>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <div class="product-title">
                                                                        <a href="{{route('product',$op->product_id)}}">{{$op->product->name}}</a>
                                                                    </div>
                                                                    <div class="product-info-stock-sku m-0">
                                                                        <div>
                                                                            <label>{{__("Quantité")}}: </label>
                                                                            <span
                                                                                class="info-deta">{{$op->quantity}}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="base-price price-box">
                                                                        <span
                                                                            class="price"> {{number_format($op->price, 2, '.', ',')}} {{__("DA")}}</span>
                                                                    </div>
                                                                </td>
                                                                {{-- <td>
                                                                  <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
                                                                </td> --}}
                                                            </tr>
                                                        @endforeach
                                                        </tbody>


                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                @else

                                    <div class="col-12 text-center">


                                        <img src="{{asset('data-none.png')}}" style="width: 200px" alt="">
                                        <h4 class="section-title">{{__("Vous n'avez aucune commande pour l'instant")}}</h4>

                                    </div>

                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if ($client_orders->orders->isNotEmpty() )

                                    <div class="print-btn text-center mt-30">
                                        <button onclick="printDiv('form-print')" class="btn btn-color"
                                                type="button">{{__("Imprimer")}}</button>
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>
                    <div id="data-step6" class="account-content" data-temp="tabdata" style="display:none">
                        <div id="form-print" class="admission-form-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="heading-part heading-bg mb-30">
                                        <h2 class="heading m-0">{{__("Mes adresses")}}</h2>
                                        <div class="mb-20 mt-20 text-end text-right">
                                            <button class="btn btn-color" data-toggle="modal" data-target="#modals-create-client-address">
                                                {{__("Ajouter une adresse")}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($client->addresses->isNotEmpty())

                                    <div class="col-12 mb-xs-30">
                                        <div class="cart-item-table commun-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="text-center">

                                                                <td>
                                                                    <span>{{__("Adress")}}</span>
                                                                </td>

                                                                <td>
                                                                    <span>{{__("Commune")}}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{__("Code postal")}}</span>
                                                                </td>

                                                                <td>
                                                                    <span>{{__("Actions")}}</span>
                                                                </td>


                                                    </thead>
                                                    <tbody class="text-center">
                                                    @foreach ($client->addresses as $item)
                                                        <tr>
                                                            <td>
                                                                <span>{{$item->address}}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{$item->commune->name}}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{$item->code_postal}}</span>
                                                            </td>
                                                            <td> @include('WebsiteUi::actions.btn-address')</td>
                                                        </tr>
                                                        @include('WebsiteUi::modals.edit-address')
                                                        @include('WebsiteUi::modals.delete-address')
                                                    @endforeach

                                                    </tbody>


                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                @else

                                    <div class="col-12 text-center">


                                        <img src="{{asset('data-none.png')}}" style="width: 200px" alt="">
                                        <h4 class="section-title">{{__("Vous n'avez aucune commande pour l'instant")}}</h4>

                                    </div>

                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if ($client_orders->orders->isNotEmpty() )

                                    <div class="print-btn text-center mt-30">
                                        <button onclick="printDiv('form-print')" class="btn btn-color"
                                                type="button">{{__("Imprimer")}}</button>
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>
                    <div id="data-step4" class="account-content" data-temp="tabdata" style="display:none">
                        <div id="form-print-copoun" class="admission-form-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="heading-part heading-bg mb-30">
                                        <h2 class="heading m-0">{{__("Mes coupons")}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($client_orders->coupons->isNotEmpty() )
                                    <div class="col-12 mb-xs-30">
                                        <div class="cart-item-table commun-table">
                                            <div class="table-responsive">
                                                <table class="table">

                                                    <thead class="text-center">

                                                    <td>
                                                        <span>{{__("Date de commande")}}</span>
                                                    </td>

                                                    <td>
                                                        <span>{{__("Coupon")}}</span>
                                                    </td>

                                                    <td>
                                                        <span>{{__("Valeur")}}</span>
                                                    </td>


                                                    </thead>
                                                    <tbody>


                                                    <tbody class="text-center">
                                                    @foreach ($client_orders->coupons as $item)

                                                        <tr>
                                                            <td>
                                                                <div class="base-price price-box">
                                                                    <span
                                                                        class="price"> {{date('d M Y', strtotime($item->created_at))}}</span>
                                                                </div>

                                                            </td>

                                                            <td>

                                                                <div class="base-price price-box">
                                                                    <a href="javascript:void(0)" onclick="myFunction('{{$item->coupon}}')" class="price">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                                    </svg>
                                                                        {{$item->coupon}}
                                                                    </a>
                                                                </div>

                                                            </td>
                                                            <td>

                                                                <div class="base-price price-box">
                                                                    <span
                                                                        class="price"> {{$item->value}} {{__('DA')}}</span>
                                                                </div>

                                                            </td>
                                                            {{-- <td>
                                                              <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
                                                            </td> --}}
                                                        </tr>
                                                    @endforeach
                                                    </tbody>


                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @else

                                    <div class="col-12 text-center">


                                        <img src="{{asset('data-none.png')}}" style="width: 200px" alt="">
                                        <h4 class="section-title">{{__("Vous n'avez  aucun coupon pour l'instant")}}</h4>

                                    </div>

                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if ($client_orders->coupons->isNotEmpty() )
                                    <div class="print-btn text-center mt-30">
                                        <button onclick="printDiv('form-print-copoun')" class="btn btn-color"
                                                type="button">{{__("Imprimer")}}</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="data-step5" class="account-content" data-temp="tabdata" style="display:none">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading-part heading-bg mb-30">
                                    <h2 class="heading m-0">{{__("Changer le mot de passe")}}</h2>
                                </div>
                            </div>
                        </div>
                        <form class="main-form full" action="{{route('update.password',$client->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-box">
                                        <label for="old-pass">{{__("Mot de passe actuel")}}</label>
                                        <input type="password" name="current_password" required id="old-pass">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-box">
                                        <label for="login-pass">{{__("Nouveau mot de passe")}}</label>
                                        <input type="password" name="password" required id="login-pass">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-box">
                                        <label for="re-enter-pass">{{__("Confirmer le nouveau mot de passe")}}</label>
                                        <input type="password" name="password_confirmation" required id="re-enter-pass">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn-color" type="submit"
                                            name="submit">{{__("Changer le mot de passe")}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function copyToClipboard(text) {
            var sampleTextarea = document.createElement("textarea");
            document.body.appendChild(sampleTextarea);
            sampleTextarea.value = text; //save main text in it
            sampleTextarea.select(); //select textarea contenrs
            document.execCommand("copy");
            document.body.removeChild(sampleTextarea);

        }

        function myFunction(val){
            copyToClipboard(val);
            @if(\Illuminate\Support\Facades\Session::get('client_lang'))

            toastr.success("تم نسخ القسيمة!");
            @else
            toastr.success("le coupon a été copié!");
                @endif

        }
    </script>
    @push('js')

        @include('layouts.extra.js.select2')

        <script>

            function DeleteOrder(id) {

                var url_delete_form = '{{ route("cancel-order",":order") }}';

                url_delete_form = url_delete_form.replace(':order', id);

                $('#form-order').attr('action', url_delete_form);


            }

        </script>

        <script>
            $(document).ready(function () {



                $('.commune_address_id').select2({
                    /* placeholder: "Start typing ...", */
                    // theme: 'bootstrap4',
                });


                $('#wilaya_id').on('change', function () {
                    var id = $(this).find('option:selected').data('id');

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
