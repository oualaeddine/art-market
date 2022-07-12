@extends('website.layouts.master')

@section('content')

    <style>
        .fotorama__nav__frame--thumb{
            height: 106px!important;
        }

    </style>

<section class="pt-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="row">
            <div class="col-lg-5 col-md-5 mb-xs-30">
              <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native">
                @if ($product->image != null)
                  <a href="#" target="_blank"><img  src="{{asset($product->image)}}" class="image-product-details" alt="Stylexpo"></a>
                @else
                  <a href="#"><img src="/website/assets/images/product/product_1_lg.jpg" alt="Stylexpo"></a>
                @endif
                @foreach ($product->images as $img)
                  <a href="#" target="_blank"><img src="{{asset($img->image)}}" class="image-home" alt="Stylexpo"></a>
                @endforeach

              </div>
            </div>
            <div class="col-lg-7 col-md-7">
              <div class="row">
                <div class="col-12">
                  <div class="product-detail-main">
                    <div class="product-item-details">
                      <h1 class="product-item-name">{{\Illuminate\Support\Facades\Session::get('client_lang')?$product->name_ar:$product->name_fr}}</h1>
                     {{--  <div class="rating-summary-block">
                        <div title="53%" class="rating-result"> <span style="width:53%"></span> </div>
                      </div> --}}
                      <div class="price-box"> <span class="price"> {{number_format($product->price, 2, '.', ',')}} {{__("DA")}}</span> <del class="price old-price">{{number_format($product->price_old, 2, '.', ',')}}{{__("DA")}}</del> </div>
                      <div class="product-info-stock-sku">
                        {{-- <div>
                          <label>Availability: </label>
                          <span class="info-deta">In stock</span>
                        </div> --}}
                        <div>
                          <label>{{__('Transport')}}: </label>
                          <span class="info-deta">{{number_format($product->shipping, 2, '.', ',')}} {{__("DA")}}</span>
                        </div>
                          <br>
                          <div>
                          <label>{{__('REF')}}: </label>
                          <span class="info-deta">{{$product->ref}}</span>
                        </div>
                      </div>
                        @if(\Illuminate\Support\Facades\Session::get('client_lang'))
                            <p>{{$product->desc_ar}}</p>

                        @else
                            <p>{{$product->desc_fr}}</p>

                        @endif
                   {{--    <div class="product-size select-arrow input-box select-dropdown mb-20 mt-30">
                        <label>Size</label>
                        <fieldset>
                          <select class="selectpicker form-control option-drop" id="select-by-size">
                            <option selected="selected" value="#">S</option>
                            <option value="#">M</option>
                            <option value="#">L</option>
                          </select>
                        </fieldset>
                      </div> --}}
                  {{--     <div class="product-color select-arrow input-box select-dropdown mb-20">
                        <label>Color</label>
                        <fieldset>
                          <select class="selectpicker form-control option-drop" id="select-by-color">
                            <option selected="selected" value="#">Blue</option>
                            <option value="#">Green</option>
                            <option value="#">Orange</option>
                            <option value="#">White</option>
                          </select>
                        </fieldset>
                      </div> --}}
                      <div class="mb-20">
                        <form action="{{route('checkout.product',$product->id)}}" method="POST">
                            @csrf

                            <div class="product-qty">
                              <label for="qty">{{__("Quantité")}} :</label>
                              <div class="custom-qty">
                                <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items" type="button"> <i class="fa fa-minus"></i> </button>
                                <input type="text" readonly class="input-text qty" title="Qty" value="1" id="qty" name="qty">
                                <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items" type="button"> <i class="fa fa-plus"></i> </button>
                              </div>
                            </div>
                            <div class="bottom-detail cart-button">
                              <ul>
                                <li class="pro-cart-icon">
                                {{--  <form> --}}
                                    <button type="button" title="Ajouter au panier" data-id="{{$product->id}}" class="btn-color add-cart-qte"><span></span>{{__('Ajouter au panier')}}</button>

                                    <button type="submit" title="Acheter maintenant" data-id="{{$product->id}}" class="btn-dark mt-2"> <i class="fa fa-shopping-cart"></i> {{__('Acheter maintenant')}} </button>
                                  {{-- </form> --}}
                                </li>
                              </ul>
                            </div>

                          </form>
                      </div>
                      <div class="bottom-detail">
                        <ul>
                          <li class="pro-phone-icon"><a href="tel:{{$phone}}"><span class="phone-span"></span>{{__('Appelez maintenant')}} ({{$phone}}) </a></li>
                         {{--  <li class="pro-compare-icon"><a href="{{route('compare')}}"><span></span>Compare</a></li> --}}
                        {{--   <li class="pro-email-icon"><a href="#"><span></span>Email to Friends</a></li> --}}
                        </ul>
                      </div>
  {{--                     <div class="share-link">
                        <label>Partager : </label>
                        <div class="social-link">
                          <ul class="social-icon">
                            <li><a class="facebook" title="Facebook" href="#"><i class="fa fa-facebook"> </i></a></li>
                            <li><a class="twitter" title="Twitter" href="#"><i class="fa fa-twitter"> </i></a></li>
                            <li><a class="linkedin" title="Linkedin" href="#"><i class="fa fa-linkedin"> </i></a></li>
                            <li><a class="rss" title="RSS" href="#"><i class="fa fa-rss"> </i></a></li>
                            <li><a class="pinterest" title="Pinterest" href="#"><i class="fa fa-pinterest"> </i></a></li>
                          </ul>
                        </div>
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
            <div class="sidebar-box listing-box mb-40"> <span class="opener plus"></span>
                <div class="sidebar-title">
                    <h3><span>{{__("Détails du Vendeur")}}</span></h3>
                </div>
                <div class="sidebar-contant">
                    <h3><span><a href="{{route('vendor-detail',$selected_vendor->name_fr)}}"> {{$selected_vendor->name_fr}}</a></span></h3>
                    <figure class="pt-10 pl-10">
                        <img class="rounded" src="{{asset($selected_vendor->logo_fr)}}" style="max-width: 100%" alt="df">
                    </figure>
                    <p>
                        {{$selected_vendor->desc_fr}}.
                    </p>

                    <h4 class="text-center"><span>Produits ( {{$selected_vendor->products_count}} )</span></h4>

                </div>
            </div>
          @foreach ($product->brands as $brand)

            <div class="brand-logo-pro align-center mb-30">
              @if ($brand->image != null)
                <img src="{{asset($brand->image)}}" alt="Stylexpo">
              @else
                <img src="/website/assets/images/brand5.png" alt="Stylexpo">
              @endif

            </div>

          @endforeach



        </div>
      </div>
    </div>
  </section>

  <section class="ptb-70">
    <div class="container">
      <div class="product-detail-tab">
        <div class="row">
          <div class="col-lg-12">
            <div id="tabs">
              <ul class="nav nav-tabs">
                <li><a class="tab-Description selected" title="Description">{{__("Description")}}</a></li>
             {{--    <li><a class="tab-Product-Tags" title="Product-Tags">Product-Tags</a></li>
                <li><a class="tab-Reviews" title="Reviews">Reviews</a></li> --}}
              </ul>
            </div>
            <div id="items">
              <div class="tab_content">
                <ul>
                  <li>
                    <div class="items-Description selected ">
                      <div class="Description">
                          @if(\Illuminate\Support\Facades\Session::get('client_lang'))
                          <p>{{$product->desc_ar}}</p>
                          @else
                              <p>>{{$product->desc_fr}}</p>

                          @endif
                      </div>
                    </div>
                  </li>
{{--                   <li>
                    <div class="items-Product-Tags"><strong>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</strong><br />
                      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur</div>
                  </li>
                  <li>
                    <div class="items-Reviews">
                      <div class="comments-area">
                        <h4>Comments<span>(2)</span></h4>
                        <ul class="comment-list mt-30">
                          <li>
                            <div class="comment-user"> <img src="/website/assets/images/comment-user.jpg" alt="Stylexpo"> </div>
                            <div class="comment-detail">
                              <div class="user-name">John Doe</div>
                              <div class="post-info">
                                <ul>
                                  <li>Fab 11, 2016</li>
                                  <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                </ul>
                              </div>
                              <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                            </div>
                            <ul class="comment-list child-comment">
                              <li>
                                <div class="comment-user"> <img src="/website/assets/images/comment-user.jpg" alt="Stylexpo"> </div>
                                <div class="comment-detail">
                                  <div class="user-name">John Doe</div>
                                  <div class="post-info">
                                    <ul>
                                      <li>Fab 11, 2016</li>
                                      <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                    </ul>
                                  </div>
                                  <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                                </div>
                              </li>
                              <li>
                                <div class="comment-user"> <img src="/website/assets/images/comment-user.jpg" alt="Stylexpo"> </div>
                                <div class="comment-detail">
                                  <div class="user-name">John Doe</div>
                                  <div class="post-info">
                                    <ul>
                                      <li>Fab 11, 2016</li>
                                      <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                    </ul>
                                  </div>
                                  <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                                </div>
                              </li>
                            </ul>
                          </li>
                          <li>
                            <div class="comment-user"> <img src="/website/assets/images/comment-user.jpg" alt="Stylexpo"> </div>
                            <div class="comment-detail">
                              <div class="user-name">John Doe</div>
                              <div class="post-info">
                                <ul>
                                  <li>Fab 11, 2016</li>
                                  <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                </ul>
                              </div>
                              <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="main-form mt-30">
                        <h4>Leave a comments</h4>
                        <form >
                          <div class="row mt-30">
                            <div class="col-md-4 mb-30">
                              <input type="text" placeholder="Name" required>
                            </div>
                            <div class="col-md-4 mb-30">
                              <input type="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-4 mb-30">
                              <input type="text" placeholder="Website" required>
                            </div>
                            <div class="col-12 mb-30">
                              <textarea cols="30" rows="3" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12 mb-30">
                              <button class="btn btn-color" name="submit" type="submit">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </li> --}}
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pb-70">
    <div class="container">
      <div class="product-listing">
        <div class="row">
          <div class="col-12">
            <div class="heading-part mb-40">
              <h2 class="main_title heading"><span>{{__("Produits connexes")}}</span></h2>
            </div>
          </div>
        </div>
        <div class="pro_cat">
          <div class="row">
            <div class="owl-carousel pro-cat-slider">
              @foreach ($realted_products as $b)

              <div class="item">
                <div class="product-item">
                  {{-- <div class="main-label Nouveau-label"><span>Nouveau</span></div> --}}
                  <div class="product-image"> <a href="{{route('product',$b->slug)}}">
                    @if ($b->image != null)
                      <img style="background-repeat: no-repeat;
    background-position: 50% 50%;
    ;" src="{{asset($b->image)}}" class="image-home" alt="Stylexpo">
                    @else
                      <img src="/website/assets/images/product/product_1_md.jpg" alt="Stylexpo">
                    @endif
                  </a>
                    <div class="product-detail-inner">
                      <div class="detail-inner-left align-center">
                        <ul>
                          <li class="pro-cart-icon">
                            <form>
                              <button type="button" data-id="{{$b->id}}" class="add-to-cart" title="Ajouter au panier"><span></span>{{__("Ajouter au panier")}}</button>
                            </form>
                          </li>
                          {{-- <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li> --}}
                       {{--    <li class="pro-compare-icon"><a href="{{route('compare')}}" title="Compare"></a></li> --}}
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="product-item-details">
                    <div class="product-item-name"> <a href="{{route('product',$b->slug)}}">
                            @if(\Illuminate\Support\Facades\Session::get('client_lang'))
                            {{$b->name_ar}}
                            @else
                                {{$b->name_fr}}

                            @endif
                        </a> </div>
                    <div class="price-box"> <span class="price">{{number_format($b->price, 2, '.', ',')}} {{__("DA")}} </span> <del class="price old-price"> {{number_format($b->price_old, 2, '.', ',')}} {{__("DA")}}</del> </div>
                  </div>
                </div>
              </div>

              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
