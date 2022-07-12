@extends('website.layouts.master')

@section('content')

<section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="row">
            <div class="col-12">
              <h3>What's the secret of the Stylexpo ?</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. etiam nec suscipit arcu, feugiat fermentum ex cras nec scelerisque magna, eu dignissim ante. mauris ullamcorper neque sed dapibus scelerisque, vestibulum et auctor odio. Fusce dapibus tortor vel quam venenatis rutrum fusce sagittis mauris nisi, eu vulputate nisl lacinia at. Suspendisse potenti, nulla nisi mi, hendrerit vitae faucibus id, ultricies sit amet nisi.</p>
            </div>
          </div>
          <div class="about-detail mt-40">
            <div class="row">
              <div class="col-12">
                <div class="heading-part mb-30">
                  <h2 class="main_title  heading"><span>{{__("Qui sommes-nous")}}</span></h2>
                </div>
              </div>
              <div class="col-sm-5 mb-xs-30">
                <div class="image-part center-xs"> <img alt="Stylexpo" src="website/assets/images/about-sub.jpg"> </div>
              </div>
              <div class="col-sm-7">
                <div class="heading-part-desc align_left center-md">
                  <h2 class="heading">Nullam vel sollicitudin diam proin congue lacinia tortor vel vulputate morbi et mauris nec risus id at odio.</h2>
                </div>
                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos nunc cursus purus sed elit aliquet aliquet luctus pulvivvvvnar tortor, cras malesuada mi gravida, vehiculaue vitae, congue erat, aenean ullamcorper nibh nec sem interdum</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="responsive-part">
            <div class="row">
              <div class="col-sm-12 partner-detail-main">
                <div class="heading-part mb-30">
                  <h2 class="main_title  heading"><span>{{__("Nos partenaires")}}</span></h2>
                </div>
                <p>Nullam vel sollicitudin diam proin congue lacinia tortor vel vulputate morbi et mauris nec risus feugiat malesuada id at odio nulla ornare scelerisque est, nec rutrum arcu elementu.</p>
              </div>
              <div class="col-sm-12">
                <div class="partner-block mb-sm-30 light-gray-bg">
                  <ul>
                    <li><span><img src="website/assets/images/brand1.png" alt="Stylexpo"></span></li>
                    <li><span><img src="website/assets/images/brand2.png" alt="Stylexpo"></span></li>
                    <li><span><img src="website/assets/images/brand3.png" alt="Stylexpo"></span></li>
                    <li><span><img src="website/assets/images/brand4.png" alt="Stylexpo"></span></li>
                    <li class="owner-logo ">
                      <span><img src="website/assets/images/owner-logo.png" alt="Stylexpo"></span>
                    </li>
                    <li><span><img src="website/assets/images/brand5.png" alt="Stylexpo"></span></li>
                    <li><span><img src="website/assets/images/brand6.png" alt="Stylexpo"></span></li>
                    <li><span><img src="website/assets/images/brand7.png" alt="Stylexpo"></span></li>
                    <li><span><img src="website/assets/images/brand8.png" alt="Stylexpo"></span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Testimonial Block Start -->
  <section class="client-bg ptb-70">
    <div class="top-shadow">
      <img alt="Stylexpo" src="website/assets/images/top-shadow.png">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="client-main client-bg">
            <div class="client-inner align-center">
              <div id="client" class="owl-carousel">
                <div class="item client-detail">
                  <div class="client-img left-side mt-40">
                      <img alt="Stylexpo" src="website/assets/images/testimonial_img1.jpg">
                    <h4 class="sub-title client-title">- Joseph deboungawer - </h4>
                    <div class="designation">Maneger of Business  Development, 2base</div>
                  </div>
                  <div class="quote right-side">
                    <div class="quote1-img">
                      <img src="website/assets/images/quote1.png" alt="Stylexpo">
                    </div>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters
                    </p>
                    <div class="quote2-img">
                      <img src="website/assets/images/quote2.png" alt="Stylexpo">
                    </div>
                  </div>
                </div>
                <div class="item client-detail">
                  <div class="client-img left-side mt-40">
                      <img alt="Stylexpo" src="website/assets/images/testimonial_img2.jpg">
                    <h4 class="sub-title client-title">- Joseph deboungawer - </h4>
                    <div class="designation">Maneger of Business  Development, 2base</div>
                  </div>
                  <div class="quote-border right-side">
                    <div class="quote">
                      <div class="quote1-img">
                        <img src="website/assets/images/quote1.png" alt="Stylexpo">
                      </div>
                      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters
                      </p>
                      <div class="quote2-img">
                        <img src="website/assets/images/quote2.png" alt="Stylexpo">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item client-detail">
                  <div class="client-img left-side mt-40">
                      <img alt="Stylexpo" src="website/assets/images/testimonial_img3.jpg">
                    <h4 class="sub-title client-title">- Joseph deboungawer - </h4>
                    <div class="designation">Maneger of Business  Development, 2base</div>
                  </div>
                  <div class="quote right-side">
                    <div class="quote1-img">
                      <img src="website/assets/images/quote1.png" alt="Stylexpo">
                    </div>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters
                    </p>
                    <div class="quote2-img">
                      <img src="website/assets/images/quote2.png" alt="Stylexpo">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-shadow">
      <img alt="Stylexpo" src="website/assets/images/bottom-shadow.png">
    </div>
  </section>
  <!--Testimonial Block End -->

  <!--team-part Start -->
  <section class="ptb-70">
    <div class="container">
      <div class="team-part team-opt-1">
        <div class="row">
          <div class="col-12 ">
            <div class="heading-part mb-30">
              <h2 class="main_title heading"><span>{{__("Notre équipe")}}</span></h2>
            </div>
          </div>
        </div>
        <div class="pro_cat">
          <div class="row">
            <div class="owl-carousel our-team ">
              <div class="item">
                <div class="team-item listing-effect col-sm-margin-b"> <img alt="Stylexpo" src="website/assets/images/tm1.jpg">
                  <div class="team-item-detail">
                    <h3 class="sub-title listing-effect-title">Adamaris Corliss</h3>
                    <div class="listing-meta">Co-Founder</div>
                    <div class="social_icon">
                      <ul>
                        <li><a href="javascript:void(0)" title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="team-item listing-effect col-sm-margin-b"> <img alt="Stylexpo" src="website/assets/images/tm2.jpg">
                  <div class="team-item-detail">
                    <h3 class="sub-title listing-effect-title">Lusi Rose</h3>
                    <div class="listing-meta">Project Manager</div>
                    <div class="social_icon">
                      <ul>
                        <li><a href="javascript:void(0)" title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="team-item listing-effect col-sm-margin-b"> <img alt="Stylexpo" src="website/assets/images/tm3.jpg">
                  <div class="team-item-detail">
                    <h3 class="sub-title listing-effect-title">Adamaris Corliss</h3>
                    <div class="listing-meta">Co-Founder</div>
                    <div class="social_icon">
                      <ul>
                        <li><a href="javascript:void(0)" title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="team-item listing-effect col-sm-margin-b"> <img alt="Stylexpo" src="website/assets/images/tm4.jpg">
                  <div class="team-item-detail">
                    <h3 class="sub-title listing-effect-title">Adamaris Corliss</h3>
                    <div class="listing-meta">Co-Founder</div>
                    <div class="social_icon">
                      <ul>
                        <li><a href="javascript:void(0)" title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="team-item listing-effect col-sm-margin-b"> <img alt="Stylexpo" src="website/assets/images/tm5.jpg">
                  <div class="team-item-detail">
                    <h3 class="sub-title listing-effect-title">Adamaris Corliss</h3>
                    <div class="listing-meta">Co-Founder</div>
                    <div class="social_icon">
                      <ul>
                        <li><a href="javascript:void(0)" title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="team-item listing-effect col-sm-margin-b"> <img alt="Stylexpo" src="website/assets/images/tm6.jpg">
                  <div class="team-item-detail">
                    <h3 class="sub-title listing-effect-title">Lusi Rose</h3>
                    <div class="listing-meta">Project Manager</div>
                    <div class="social_icon">
                      <ul>
                        <li><a href="javascript:void(0)" title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="team-item listing-effect col-sm-margin-b"> <img alt="Stylexpo" src="website/assets/images/tm7.jpg">
                  <div class="team-item-detail">
                    <h3 class="sub-title listing-effect-title">Adamaris Corliss</h3>
                    <div class="listing-meta">Co-Founder</div>
                    <div class="social_icon">
                      <ul>
                        <li><a href="javascript:void(0)" title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="javascript:void(0)" title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
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
  </section>

@endsection
