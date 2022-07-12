@extends('website.layouts.master')


@section('content')

<section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="cart-item-table commun-table">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>{{__("Produit")}}</th>
                    <th>{{__("Nom du produit")}}</th>
                    <th>{{__("Prix")}}</th>
                    <th>{{__("Quantité")}}</th>
                    <th>{{__("Sous-total")}}</th>
                    <th>{{__("Action")}}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cart as $item)

                  <tr>
                    <td>
                      <a href="{{route('product',$item->options->slug)}}">
                        <div class="product-image">
                          @if ($item->options->image)
                           <img alt="Stylexpo" src="{{$item->options->image}}" class="">
                          @else
                            <img alt="Stylexpo" src="website/assets/images/product/product_1_md.jpg">
                          @endif

                        </div>
                      </a>
                    </td>
                    <td>
                      <div class="product-title">
                        <h4><a href="{{route('product',$item->options->slug)}}">{{$item->name}}</a></h4>
                     {{--    <div class=""><span class="text-muted mr-2">Color :</span>gray</div>
                        <div class=""><span class="text-muted mr-2">Size :</span>XL</div> --}}
                      </div>
                    </td>
                    <td>
                      <ul>
                        <li>
                          <div class="base-price price-box">
                            <span class="price"> {{number_format($item->price, 2, '.', ',')}} {{__("DA")}} - <del class="text-secondary">{{number_format($item->options->price_old, 2, '.', ',')}} {{__("DA")}}</del></span>
                          </div>
                        </li>
                      </ul>
                    </td>
                    <td style="width: 120px">
                      <div class="input-box {{-- select-dropdown --}}">
                        {{-- <fieldset> --}}
                          <input type="number" value="{{$item->qty}}"  min="1" name="quantity_cart" class="qty-edit-cart form-control" data-id="{{$item->id}}">

                        {{-- </fieldset> --}}
                      </div>
                    </td>
                    <td>
                      <div class="total-price price-box">
                        <span class="price">{{number_format($item->price * $item->qty, 2, '.', ',')}} {{__("DA")}}</span>
                      </div>
                    </td>
                    <td>
                      <i  title="Remove Item From Cart" data-id="{{$item->id}}" class="fa fa-trash cart-remove-item"></i>
                    </td>
                  </tr>

                  @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-30">
        <div class="row">
        {{--   @if ($cart->count() != 0)

            <div class="col-md-6">
              <div class="mt-30 right-side float-none-xs">
                <a class="btn btn-color">Update Cart</a>
              </div>
            </div>

          @endif --}}

        </div>
      </div>
      <hr>
      <div class="mtb-30">
        <div class="row">
          <div class="col-md-6 mb-xs-40">
            {{-- <div class="estimate">
              <div class="heading-part mb-20">
                <h3 class="sub-heading">Estimate shipping and tax</h3>
              </div>
              <form class="full">
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-box select-dropdown mb-20">
                      <fieldset>
                        <select id="country_id" class="option-drop">
                          <option selected="" value="">Select Country</option>
                          <option value="1">India</option>
                          <option value="2">China</option>
                          <option value="3">Pakistan</option>
                        </select>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-box select-dropdown mb-20">
                      <fieldset>
                        <select id="state_id" class="option-drop">
                          <option selected="" value="1">Select State/Province</option>
                          <option value="2">---</option>
                        </select>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-box select-dropdown mb-20">
                      <fieldset>
                        <select id="city_id" class="option-drop">
                          <option selected="" value="1">Select City</option>
                          <option value="2">---</option>
                        </select>
                      </fieldset>
                    </div>
                  </div>
                </div>
              </form>
            </div> --}}
          </div>
          <div class="col-md-6">
            <div class="cart-total-table commun-table">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">{{__("Total du panier")}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{__("Article(s) Sous-total")}}</td>
                      <td>
                        <div class="price-box">
                          <span class="price">{{number_format($sub_total, 2, '.', ',')}} {{__("DA")}}</span>
                        </div>
                      </td>
                    </tr>
                   {{--  <tr>
                      <td>Shipping</td>
                      <td>
                        <div class="price-box">
                          <span class="price">$0.00</span>
                        </div>
                      </td>
                    </tr> --}}
                    <tr>
                      <td><b>{{__("Montant à payer")}}</b></td>
                      <td>
                        <div class="price-box">
                          <span class="price"><b> {{Cart::subtotal()}} {{__("DA")}}</b></span>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="mt-30">
        <div class="row">
          <div class="col-12">
              <div class="left-side float-none-xs">

              <a role="button" href="{{route('shop')}}" class="btn btn-color mb-2 w-100">
                  <span><i class="fa fa-angle-left"></i></span>
                  {{__("Continuer vos achats")}}
              </a>

              </div>
            <div class="right-side float-none-xs">
              @if ($cart->count() != 0)

                <a href="{{route('checkout')}}" class="btn btn-color mb-2 w-100">{{__("Passer à la caisse")}}
                  <span><i class="fa fa-angle-right"></i></span>
                </a>

              @else

                <button disabled="true" class="btn btn-secondary mb-2 w-100">{{__("Ajouter des produits")}} , {{__("pour passer à la caisse")}}
                  <span><i class="fa fa-angle-right"></i></span>
                </button>

              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
