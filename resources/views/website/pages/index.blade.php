@extends('website.layouts.master')

@section('content')

  <!-- BANNER STRAT -->
  <section class="">
    <div id="owl-example" class="banner owl-carousel">
      <div class="main-banner">
        <div class="item">
          <div class="banner-1"> <img src="/website/assets/images/banner1.jpg" alt="Stylexpo">
            <div class="banner-detail">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-7 offset-lg-6 offset-5">
                    <div class="banner-detail-inner slider-animation animated-1"> 
                      <span class="slogan">Lifestyle collection</span>
                      <h1 class="banner-title animated">More Fashion Styles</h1>
                      <p class="offer">Get Free Shipping on all orders over $99.00</p>
                      <a class="btn btn-color" href="shop.html">Shop Now!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="banner-video wrap-video">
            <video id="video-player" class="video-js" loop="" muted="" autoplay="" playsinline="" preload="auto" data-origwidth="0" data-origheight="0" controls="" src="video/fashion-trends.mp4"></video>
          </div>
        </div>
        <div class="item">
          <div class="banner-2"> <img src="/website/assets/images/banner2.jpg" alt="Stylexpo">
            <div class="banner-detail">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8 col-8 offset-1">
                    <div class="banner-detail-inner slider-animation animated-2"> 
                      <span class="slogan">Summer Season’s</span>
                      <h1 class="banner-title  animated">Fashion 2021 Collection</h1>
                      <p class="offer">Check out this week's hottest styles.</p> 
                      <a class="btn btn-color" href="shop.html">Shop Now!</a>
                    </div> 
                  </div>             
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="banner-3"> <img src="/website/assets/images/banner3.jpg" alt="Stylexpo">
            <div class="banner-detail">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-7 offset-lg-6 offset-5">
                    <div class="banner-detail-inner slider-animation animated-1"> 
                      <span class="slogan">Trending now</span>
                      <h1 class="banner-title animated">Hottest Fashion Sale</h1>
                      <p class="offer">Check out this week's hottest styles.</p>
                      <a class="btn btn-color" href="shop.html">Shop Now!</a> 
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- BANNER END --> 
  
  <!-- CONTAIN START -->

    <!-- SUB-BANNER START -->
    <div class="sub-banner-block ">
      <div class="">
        <div class="">
          <div class="row mlr_-10">
            <div class="col-md-4 plr-10">
              <div class="sub-banner sub-banner1" >
                <img alt="Stylexpo" src="/website/assets/images/sub-banner1.jpg">
                <div class="sub-banner-detail">
                  <div class="sub-banner-slogan">Top Brands</div>
                  <div class="sub-banner-title sub-banner-title-color">sunglasses</div>
                  <div class="sub-banner-subtitle">Flash sale</div>
                  <a class="btn btn-color" href="shop.html">Shop Now!</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-xs-10 plr-10">
              <div class="">
                <div class="sub-banner sub-banner2">
                  <img alt="Stylexpo" src="/website/assets/images/sub-banner2.jpg">
                  <div class="sub-banner-detail">
                  <div class="sub-banner-slogan">Lifestyle</div>
                  <div class="sub-banner-title sub-banner-title-color">Trending 2021</div>
                  <div class="sub-banner-subtitle"> Ultimate Sale</div>
                    <a class="btn btn-color " href="shop.html">Shop Now!</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-xs-10 plr-10">
              <div class="sub-banner sub-banner3" >
                <img alt="Stylexpo" src="/website/assets/images/sub-banner3.jpg">
                <div class="sub-banner-detail">
                  <div class="sub-banner-slogan">Featured</div>
                  <div class="sub-banner-title sub-banner-title-color">Classic Watch</div>
                  <div class="sub-banner-subtitle">Collection</div>
                  <a class="btn btn-color " href="shop.html">Shop Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SUB-BANNER END -->
    
    <!--  New arrivals Products Slider Block Start  -->
    <section class="pt-70">
      <div class="container">
        <div class="product-listing">
          <div class="row">
            <div class="col-12">
              <div class="heading-part mb-30">
                <h2 class="main_title heading"><span>New Arrivals</span></h2>
              </div>
            </div>
          </div>
          <div class="pro_cat">
            <div class="row">
              <div class="owl-carousel pro-cat-slider ">
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_1_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_12_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item sold-out mb-30">
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_2_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_9_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_3_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_10_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_4_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item sold-out">
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_7_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_8_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_13_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_6_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_11_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_14_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_4_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_15_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="main-label sale-label"><span>Sale</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_16_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_8_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_2_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_10_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="main-label new-label"><span>New</span></div>
                    <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_1_md.jpg" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                      <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  New arrivals Products Slider Block End  -->

    <!-- Top Categories Start-->
    <section class=" pt-70">
      <div class="top-cate-bg ptb-70">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="heading-part mb-30">
                <h2 class="main_title heading"><span>Top Categories</span></h2>
              </div>
            </div>
          </div>
          <div class="pro_cat">
            <div class="row">
              <div id="top-cat-pro" class="owl-carousel sell-pro align-center">
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="/website/assets/images/cate_1.jpg" alt="Stylexpo">
                        <div class="effect"></div>
                      <div class="cate-detail">
                        <span>Women tops</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="/website/assets/images/cate_2.jpg" alt="Stylexpo">
                        <div class="effect"></div>
                      <div class="cate-detail">
                        <span>Men’s jackets</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="/website/assets/images/cate_3.jpg" alt="Stylexpo">
                        <div class="effect"></div>
                      <div class="cate-detail">
                        <span>watches</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="/website/assets/images/cate_4.jpg" alt="Stylexpo">
                        <div class="effect"></div>
                      <div class="cate-detail">
                        <span>shoes</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="/website/assets/images/cate_5.jpg" alt="Stylexpo">
                        <div class="effect"></div>
                      <div class="cate-detail">
                        <span>sunglasses</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="/website/assets/images/cate_6.jpg" alt="Stylexpo">
                        <div class="effect"></div>
                      <div class="cate-detail">
                        <span>kid's wear</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="/website/assets/images/cate_7.jpg" alt="Stylexpo">
                        <div class="effect"></div>
                      <div class="cate-detail">
                        <span>Women t-shirt</span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Top Categories End-->

    <!-- perellex-banner Start -->
    <section>
      <div class="perellex-banner">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 offset-xl-2 ptb-70 client-box">
              <div class="perellex-delail align-center">
                <div class="perellex-offer"><span class="line-bottom">Sale Up to 30% off</span></div>
                <div class="perellex-title ">Lifestyle Collection </div> 
                <p>We offer cheap fashion accessories at discount price</p>         
                <a class="btn btn-color">Shop Now!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- perellex-banner End -->

    <!-- Daily Deals Start -->
    <section class=" ptb-70">
      <div class="container">
        <div class="daily-deals">
          <div class="row m-0">
            <div class="col-12 p-0">
              <div class="heading-part mb-30">
                <h2 class="main_title heading"><span>Daily Deals</span></h2>
              </div>
            </div>
          </div>
          <div class="pro_cat">
            <div class="row">
              <div id="daily_deals" class="owl-carousel ">
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image"> 
                          <a href="product-page.html"> 
                            <img src="/website/assets/images/product/product_3_md.jpg" alt="Stylexpo"> 
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name"> 
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a> 
                          </div>
                          <div class="price-box"> 
                            <span class="price">$80.00</span> 
                            <del class="price old-price">$100.00</del> 
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image"> 
                          <a href="product-page.html"> 
                            <img src="/website/assets/images/product/product_6_md.jpg" alt="Stylexpo"> 
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name"> 
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a> 
                          </div>
                          <div class="price-box"> 
                            <span class="price">$80.00</span> 
                            <del class="price old-price">$100.00</del> 
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock" data-end-date="06/29/2018 12:00:00">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image"> 
                          <a href="product-page.html"> 
                            <img src="/website/assets/images/product/product_5_md.jpg" alt="Stylexpo"> 
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name"> 
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a> 
                          </div>
                          <div class="price-box"> 
                            <span class="price">$80.00</span> 
                            <del class="price old-price">$100.00</del> 
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock" data-end-date="06/29/2018 12:00:00">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image"> 
                          <a href="product-page.html"> 
                            <img src="/website/assets/images/product/product_1_md.jpg" alt="Stylexpo"> 
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name"> 
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a> 
                          </div>
                          <div class="price-box"> 
                            <span class="price">$80.00</span> 
                            <del class="price old-price">$100.00</del> 
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock" data-end-date="06/29/2018 12:00:00">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image"> 
                          <a href="product-page.html"> 
                            <img src="/website/assets/images/product/product_3_md.jpg" alt="Stylexpo"> 
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name"> 
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a> 
                          </div>
                          <div class="price-box"> 
                            <span class="price">$80.00</span> 
                            <del class="price old-price">$100.00</del> 
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock" data-end-date="06/29/2018 12:00:00">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image"> 
                          <a href="product-page.html"> 
                            <img src="/website/assets/images/product/product_4_md.jpg" alt="Stylexpo"> 
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name"> 
                            <a href="product-page.html">Defyant Reversible Dot Shorts</a> 
                          </div>
                          <div class="price-box"> 
                            <span class="price">$80.00</span> 
                            <del class="price old-price">$100.00</del> 
                          </div>
                          <p>Lorem ipsum dolor consectetuer adipiscing elit. Donec eros, scelerisque nec, rhoncus eget.</p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <li class="pro-cart-icon">
                                <form>
                                  <button title="Add to Cart"><span></span>Add to Cart</button>
                                </form>
                              </li>
                              <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock" data-end-date="06/29/2018 12:00:00">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Daily Deals End -->

    <!--  Site Services Features Block Start  -->
    <div class="ser-feature-block">
      <div class="container">
        <div class="center-xs">
          <div class="row">
            <div class="col-xl-3 col-6 service-box">
              <div class="feature-box ">
                <div class="feature-icon feature1"></div>
                <div class="feature-detail">
                  <div class="ser-title">Free Delivery</div>
                  <div class="ser-subtitle">From $59.89</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-6 service-box">
              <div class="feature-box">
                <div class="feature-icon feature2"></div>
                <div class="feature-detail">
                  <div class="ser-title">Support 24/7</div>
                  <div class="ser-subtitle">Online 24 hours</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-6 service-box">
              <div class="feature-box ">
                <div class="feature-icon feature3"></div>
                <div class="feature-detail">
                  <div class="ser-title">Free return</div>
                  <div class="ser-subtitle">365 a day</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-6 service-box">
              <div class="feature-box ">
                <div class="feature-icon feature4"></div>
                <div class="feature-detail">
                  <div class="ser-title">Big Saving</div>
                  <div class="ser-subtitle">Weeken Sales</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  Site Services Features Block End  -->

    <!--small banner Block Start-->
    <section class="pt-70"> 
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="sub-banner small-banner small-banner1">
              <a href="shop.html">
                <img src="/website/assets/images/small-banner1.jpg" alt="Stylexpo">
              </a>
            </div>
          </div>
          <div class="col-lg-6 mt-sm-30">
            <div class="sub-banner small-banner small-banner2">
              <a href="shop.html">
                <img src="/website/assets/images/small-banner2.jpg" alt="Stylexpo">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--small banner Block Start-->

    <!--  Special products Products Slider Block Start  -->
    <section class="ptb-70">
      <div class="container">
        <div class="product-listing">
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="row">
                <div class="col-12">
                  <div class="heading-part mb-30">
                    <h2 class="main_title heading"><span>Best seller</span></h2>
                  </div>
                </div>
              </div>
              <div class="pro_cat">
                <div class="row">
                  <div class="owl-carousel best-seller-pro">
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label new-label"><span>New</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_1_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label new-label"><span>New</span></div>
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_2_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_3_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item sold-out">
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_4_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_5_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_6_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12 mt-xs-30">
              <div class="row">
                <div class="col-12">
                  <div class="heading-part mb-30">
                    <h2 class="main_title heading"><span>New products </span></h2>
                  </div>
                </div>
              </div>
              <div class="pro_cat">
                <div class="row">
                  <div class="owl-carousel best-seller-pro">
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label new-label"><span>New</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_12_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_11_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label new-label"><span>New</span></div>
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_10_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item sold-out">
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_9_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_8_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> <a href="product-page.html"> <img src="/website/assets/images/product/product_7_md.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  Special products Products Slider Block End  -->

    <!--Blog Block Start -->
    <section class="pb-70">
      <div class="container">
        <div class="row">
          <div class="col-12 ">
            <div class="heading-part mb-30">
              <h2 class="main_title heading"><span>Latest News</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div id="blog" class="owl-carousel">
            <div class="item mb-md-30">
              <div class="blog-item">
                <div class="">
                <div class="blog-media"> 
                  <img src="/website/assets/images/blog/blog_img1_md_home.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div> 
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a> 
                </div>
                </div>
                <div class="mt-20">
                  <div class="blog-detail"> 
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item mb-md-30">
              <div class="blog-item">
                <div class="blog-media"> 
                  <img src="/website/assets/images/blog/blog_img2_md_home.jpg" alt="Stylexpo"> 
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-20">
                  <div class="blog-detail"> 
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media"> 
                  <img src="/website/assets/images/blog/blog_img3_md_home.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div>  
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-20">
                  <div class="blog-detail"> 
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media"> 
                  <img src="/website/assets/images/blog/blog_img4_md_home.jpg" alt="Stylexpo"> 
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-20">
                  <div class="blog-detail"> 
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media"> 
                  <img src="/website/assets/images/blog/blog_img5_md_home.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div>  
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-20">
                  <div class="blog-detail"> 
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media"> 
                  <img src="/website/assets/images/blog/blog_img6_md_home.jpg" alt="Stylexpo"> 
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-20">
                  <div class="blog-detail"> 
                    <div class="post-date"><span>22</span> / Aug 2020 </div>
                    <div class="blog-title"><a href="single-blog.html">Combined with a handful of model</a></div>
                    <p>Lorem khaled ipsum is a major key to success. It’s on you how you want to live your life.</p>
                    <hr>
                    <div class="post-info mt-2">
                      <ul>
                        <li><span>By</span><a href="#"> cormon jons</a></li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Blog Block End -->

    <!-- Brand logo block Start  -->
    <div class="brand-logo pb-70">
      <div class="container">
        <div class="row">
          <div class="col-12 ">
            <div class="heading-part mb-30">
              <h2 class="main_title heading"><span>Our Brands</span></h2>
            </div>
          </div>
        </div>
        <div class=" brand">
          <div class="row">
            <div id="brand-logo" class="owl-carousel align_center">
              <div class="item"><a href="#"><img src="/website/assets/images/brand1.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="/website/assets/images/brand2.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="/website/assets/images/brand3.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="/website/assets/images/brand4.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="/website/assets/images/brand5.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="/website/assets/images/brand6.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="/website/assets/images/brand7.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="/website/assets/images/brand8.png" alt="Stylexpo"></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Brand logo block End  -->
    
@endsection