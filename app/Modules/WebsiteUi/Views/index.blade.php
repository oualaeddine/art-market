@extends('website.app')



@section('content')


    <div class="section-pb selection pt-1 pb-20">
        <div class="container">
            <div class="text-left">
                <div class="popular__stage">Discover unique</div>
                <h3 class="hot__title h3">hand-picked items</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a class="selection__card" href="item.html">
                        <div class="selection__preview"><img src="https://i.etsystatic.com/6060897/r/il/6413a9/2355473127/il_680x540.2355473127_lfxx.jpg" alt="Selection" /></div>
                        <div class="selection__head">
                            <div class="selection__line">
                                <div class="selection__description">
                                    <div class="selection__title">Assorted Blue Band Stoneware.</div>
                                    <div class="selection__counter">You can't resist em'!</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a class="selection__card d-flex h-100" href="item.html">
                        <div class="selection__preview position-relative with-absolute-description">
                            <img src="https://i.etsystatic.com/7136732/c/1894/1505/0/817/il/b75904/3544148363/il_680x540.3544148363_43f0.jpg" alt="Selection" />
                            <div class="selection__description absolute-home-description-item">
                                <div class="selection__title">Leather Handle Flag End</div>
                                <div class="selection__counter">Comfy all around.</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a class="selection__card d-flex h-100" href="item.html">
                        <div class="selection__preview position-relative with-absolute-description">
                            <img src="https://i.etsystatic.com/16453670/c/1970/1566/555/437/il/58a788/3468479551/il_680x540.3468479551_qx4k.jpg" alt="Selection" />
                            <div class="selection__description absolute-home-description-item">
                                <div class="selection__title">Stoneware Speckled Hand Built</div>
                                <div class="selection__counter">Comfy all around.</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row justify-content-center mt-12 mb-lg-0 mb-15">
                <div class="col-12 col-lg-8">
                    <div class="brand-logos d-flex justify-content-center align-items-center mx-n9 flex-wrap">
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="500" data-aos-once="true">
                            <img src="website/images/customers/logo-01.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="700" data-aos-once="true">
                            <img src="website/images/customers/logo-02.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="900" data-aos-once="true">
                            <img src="website/images/customers/logo-03.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1100" data-aos-once="true">
                            <img src="website/images/customers/logo-04.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1300" data-aos-once="true">
                            <img src="website/images/customers/logo-05.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1500" data-aos-once="true">
                            <img src="website/images/customers/logo-06.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1500" data-aos-once="true">
                            <img src="website/images/customers/logo-07.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1500" data-aos-once="true">
                            <img src="website/images/customers/logo-08.png" alt="#" />
                        </div>
                        <div class="single-brand mx-9 py-7 coodiv-opacity-8 aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="1500" data-aos-once="true">
                            <img src="website/images/customers/logo-09.png" alt="#" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-bg popular py-20">
        <div class="container">
            <div class="popular__top">
                <div class="popular__box">
                    <div class="popular__stage">Browser products by most popular</div>
                    <h3 class="hot__title h3 mb-0">Brands</h3>
                </div>
                <div class="field">
                    <div class="field__label">timeframe</div>
                    <div class="field__wrap">
                        <select class="select">
                            <option>Today</option>
                            <option>Morning</option>
                            <option>Dinner</option>
                            <option>Evening</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="popular__wrapper">
                <div class="popular__slider js-slider-popular">
                    <div class="popular__slide">
                        <div class="popular__item">
                            <div class="popular__head justify-content-center">
                                <div class="popular__rating" style="background-color: #3772ff;">
                                    <div class="popular__number">Best phone brand category</div>
                                </div>
                            </div>
                            <div class="popular__body">
                                <div class="company__logo d-block mb-4"><img class="mx-auto" src="website/images/customers/logo-01.png" alt="company" /></div>
                                <div class="popular__name">APPLE INC</div>
                                <div class="popular__price"><span>134</span> product</div>
                                <a class="button-stroke main__button d-flex w-100 mt-5" href="search01.html">Store</a>
                            </div>
                        </div>
                    </div>

                    <div class="popular__slide">
                        <div class="popular__item">
                            <div class="popular__head justify-content-center">
                                <div class="popular__rating" style="background-color: #9757d7;">
                                    <div class="popular__number">Best phone brand category</div>
                                </div>
                            </div>
                            <div class="popular__body">
                                <div class="company__logo d-block mb-4"><img class="mx-auto" src="website/images/customers/logo-02.png" alt="company" /></div>
                                <div class="popular__name">APPLE INC</div>
                                <div class="popular__price"><span>134</span> product</div>
                                <a class="button-stroke main__button d-flex w-100 mt-5" href="search01.html">Store</a>
                            </div>
                        </div>
                    </div>

                    <div class="popular__slide">
                        <div class="popular__item">
                            <div class="popular__head justify-content-center">
                                <div class="popular__rating" style="background-color: #45b26b;">
                                    <div class="popular__number">Best phone brand category</div>
                                </div>
                            </div>
                            <div class="popular__body">
                                <div class="company__logo d-block mb-4"><img class="mx-auto" src="website/images/customers/logo-03.png" alt="company" /></div>
                                <div class="popular__name">APPLE INC</div>
                                <div class="popular__price"><span>134</span> product</div>
                                <a class="button-stroke main__button d-flex w-100 mt-5" href="search01.html">Store</a>
                            </div>
                        </div>
                    </div>

                    <div class="popular__slide">
                        <div class="popular__item">
                            <div class="popular__head justify-content-center">
                                <div class="popular__rating" style="background-color: #23262f;">
                                    <div class="popular__number">Best phone brand category</div>
                                </div>
                            </div>
                            <div class="popular__body">
                                <div class="company__logo d-block mb-4"><img class="mx-auto" src="website/images/customers/logo-04.png" alt="company" /></div>
                                <div class="popular__name">APPLE INC</div>
                                <div class="popular__price"><span>134</span> product</div>
                                <a class="button-stroke main__button d-flex w-100 mt-5" href="search01.html">Store</a>
                            </div>
                        </div>
                    </div>

                    <div class="popular__slide">
                        <div class="popular__item">
                            <div class="popular__head justify-content-center">
                                <div class="popular__rating" style="background-color: #777e90;">
                                    <div class="popular__number">Best phone brand category</div>
                                </div>
                            </div>
                            <div class="popular__body">
                                <div class="company__logo d-block mb-4"><img class="mx-auto" src="website/images/customers/logo-05.png" alt="company" /></div>
                                <div class="popular__name">APPLE INC</div>
                                <div class="popular__price"><span>134</span> product</div>
                                <a class="button-stroke main__button d-flex w-100 mt-5" href="search01.html">Store</a>
                            </div>
                        </div>
                    </div>

                    <div class="popular__slide">
                        <div class="popular__item">
                            <div class="popular__head justify-content-center">
                                <div class="popular__rating" style="background-color: #23262f;">
                                    <div class="popular__number">Best phone brand category</div>
                                </div>
                            </div>
                            <div class="popular__body">
                                <div class="company__logo d-block mb-4"><img class="mx-auto" src="website/images/customers/logo-06.png" alt="company" /></div>
                                <div class="popular__name">APPLE INC</div>
                                <div class="popular__price"><span>134</span> product</div>
                                <a class="button-stroke main__button d-flex w-100 mt-5" href="search01.html">Store</a>
                            </div>
                        </div>
                    </div>

                    <div class="popular__slide">
                        <div class="popular__item">
                            <div class="popular__head justify-content-center">
                                <div class="popular__rating" style="background-color: #45b26b;">
                                    <div class="popular__number">Best phone brand category</div>
                                </div>
                            </div>
                            <div class="popular__body">
                                <div class="company__logo d-block mb-4"><img class="mx-auto" src="website/images/customers/logo-07.png" alt="company" /></div>
                                <div class="popular__name">APPLE INC</div>
                                <div class="popular__price"><span>134</span> product</div>
                                <a class="button-stroke main__button d-flex w-100 mt-5" href="search01.html">Store</a>
                            </div>
                        </div>
                    </div>

                    <div class="popular__slide">
                        <div class="popular__item">
                            <div class="popular__head justify-content-center">
                                <div class="popular__rating" style="background-color: #9757d7;">
                                    <div class="popular__number">Best phone brand category</div>
                                </div>
                            </div>
                            <div class="popular__body">
                                <div class="company__logo d-block mb-4"><img class="mx-auto" src="website/images/customers/logo-08.png" alt="company" /></div>
                                <div class="popular__name">APPLE INC</div>
                                <div class="popular__price"><span>134</span> product</div>
                                <a class="button-stroke main__button d-flex w-100 mt-5" href="search01.html">Store</a>
                            </div>
                        </div>
                    </div>

                    <div class="popular__slide">
                        <div class="popular__item">
                            <div class="popular__head justify-content-center">
                                <div class="popular__rating" style="background-color: #777e90;">
                                    <div class="popular__number">Best phone brand category</div>
                                </div>
                            </div>
                            <div class="popular__body">
                                <div class="company__logo d-block mb-4"><img class="mx-auto" src="website/images/customers/logo-09.png" alt="company" /></div>
                                <div class="popular__name">APPLE INC</div>
                                <div class="popular__price"><span>134</span> product</div>
                                <a class="button-stroke main__button d-flex w-100 mt-5" href="search01.html">Store</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="section hot py-25">
        <div class="container">
            <div class="hot__wrapper">
                <div class="">
                    <div class="popular__stage">Browser the most popular products</div>
                    <h3 class="hot__title h3">Right now</h3>
                </div>
                <div class="hot__inner">
                    <div class="hot__slider js-slider-hot">
                        <div class="hot__slide">
                            <div class="card border-0">
                                <div class="card__preview">
                                    <img src="https://i.etsystatic.com/6120089/r/il/93acdb/1571178682/il_794xN.1571178682_m7ex.jpg" alt="Card preview" />

                                    <div class="card__control">
                                        <div class="status-green card__category">Currently on sale! <span role="img" aria-label="fire">🔥</span></div>
                                        <button class="card__favorite">
                                            <svg class="icon icon-heart">
                                            </svg>
                                        </button>
                                        <a href="#" class="button-small card__button text-white"><span>Place an order now</span></a>
                                    </div>
                                </div>
                                <a class="card__link" href="item.html">
                                    <div class="card__body">
                                        <div class="card__line">
                                            <div class="card__title">Black Lace Sleeve Pleat Top <small class="d-block font-weight-light">more then 4,532 customers like this</small></div>
                                        </div>

                                        <div class="mt-5 mb-3 d-flex justify-content-between align-items-center">
                                            <div class="card__counter">378 in stock</div>
                                            <div class="card__price">$225.99</div>
                                        </div>
                                    </div>
                                    <div class="card__foot">
                                        <div class="card__status">CATEGORY <span>Questindustries</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="hot__slide">
                            <div class="card border-0">
                                <div class="card__preview">
                                    <img src="https://i.etsystatic.com/7874461/r/il/a02dbc/1185641664/il_794xN.1185641664_hm1v.jpg" alt="Card preview" />

                                    <div class="card__control">
                                        <div class="status-green card__category">Currently on sale! <span role="img" aria-label="fire">🔥</span></div>
                                        <button class="card__favorite">
                                            <svg class="icon icon-heart">
                                                <use xlink:href="#icon-heart"></use>
                                            </svg>
                                        </button>
                                        <a href="#" class="button-small card__button text-white"><span>Place an order now</span></a>
                                    </div>
                                </div>
                                <a class="card__link" href="item.html">
                                    <div class="card__body">
                                        <div class="card__line">
                                            <div class="card__title">Black Lace Sleeve Pleat Top <small class="d-block font-weight-light">more then 4,532 customers like this</small></div>
                                        </div>

                                        <div class="mt-5 mb-3 d-flex justify-content-between align-items-center">
                                            <div class="card__counter">378 in stock</div>
                                            <div class="card__price">$225.99</div>
                                        </div>
                                    </div>
                                    <div class="card__foot">
                                        <div class="card__status">CATEGORY <span>Questindustries</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="hot__slide">
                            <div class="card border-0">
                                <div class="card__preview">
                                    <img src="https://i.etsystatic.com/8042223/r/il/369464/3842783131/il_794xN.3842783131_bmed.jpg" alt="Card preview" />

                                    <div class="card__control">
                                        <div class="status-green card__category">Currently on sale! <span role="img" aria-label="fire">🔥</span></div>
                                        <button class="card__favorite">
                                            <svg class="icon icon-heart">
                                                <use xlink:href="#icon-heart"></use>
                                            </svg>
                                        </button>
                                        <a href="#" class="button-small card__button text-white"><span>Place an order now</span></a>
                                    </div>
                                </div>
                                <a class="card__link" href="item.html">
                                    <div class="card__body">
                                        <div class="card__line">
                                            <div class="card__title">Black Lace Sleeve Pleat Top <small class="d-block font-weight-light">more then 4,532 customers like this</small></div>
                                        </div>

                                        <div class="mt-5 mb-3 d-flex justify-content-between align-items-center">
                                            <div class="card__counter">378 in stock</div>
                                            <div class="card__price">$225.99</div>
                                        </div>
                                    </div>
                                    <div class="card__foot">
                                        <div class="card__status">CATEGORY <span>Questindustries</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="hot__slide">
                            <div class="card border-0">
                                <div class="card__preview">
                                    <img src="https://i.etsystatic.com/6903082/r/il/25555e/666794044/il_794xN.666794044_256k.jpg" alt="Card preview" />

                                    <div class="card__control">
                                        <div class="status-green card__category">Currently on sale! <span role="img" aria-label="fire">🔥</span></div>
                                        <button class="card__favorite">
                                            <svg class="icon icon-heart">
                                                <use xlink:href="#icon-heart"></use>
                                            </svg>
                                        </button>
                                        <a href="#" class="button-small card__button text-white"><span>Place an order now</span></a>
                                    </div>
                                </div>
                                <a class="card__link" href="item.html">
                                    <div class="card__body">
                                        <div class="card__line">
                                            <div class="card__title">Black Lace Sleeve Pleat Top <small class="d-block font-weight-light">more then 4,532 customers like this</small></div>
                                        </div>

                                        <div class="mt-5 mb-3 d-flex justify-content-between align-items-center">
                                            <div class="card__counter">378 in stock</div>
                                            <div class="card__price">$225.99</div>
                                        </div>
                                    </div>
                                    <div class="card__foot">
                                        <div class="card__status">CATEGORY <span>Questindustries</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="hot__slide">
                            <div class="card border-0">
                                <div class="card__preview">
                                    <img src="https://i.etsystatic.com/6903082/r/il/25555e/666794044/il_794xN.666794044_256k.jpg" alt="Card preview" />

                                    <div class="card__control">
                                        <div class="status-green card__category">Currently on sale! <span role="img" aria-label="fire">🔥</span></div>
                                        <button class="card__favorite">
                                            <svg class="icon icon-heart">
                                                <use xlink:href="#icon-heart"></use>
                                            </svg>
                                        </button>
                                        <a href="#" class="button-small card__button text-white"><span>Place an order now</span></a>
                                    </div>
                                </div>
                                <a class="card__link" href="item.html">
                                    <div class="card__body">
                                        <div class="card__line">
                                            <div class="card__title">Black Lace Sleeve Pleat Top <small class="d-block font-weight-light">more then 4,532 customers like this</small></div>
                                        </div>

                                        <div class="mt-5 mb-3 d-flex justify-content-between align-items-center">
                                            <div class="card__counter">378 in stock</div>
                                            <div class="card__price">$225.99</div>
                                        </div>
                                    </div>
                                    <div class="card__foot">
                                        <div class="card__status">CATEGORY <span>Questindustries</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="section-bg collections py-20">
        <div class="container">
            <div class="collections__wrapper">
                <div class="">
                    <div class="popular__stage">Discover other extremely</div>
                    <h3 class="hot__title h3">popular collections</h3>
                </div>



                <div class="row justify-content-start">
                    <div class="col-md-5 col-12">
                        <a href="#" class="homepage-item-box white-bg">
                            <img src="https://toka.b-cdn.net/wp-content/uploads/2022/04/frfrghj.png" alt="">
                            <div class="item__control px-5 py-5">
                                <h5>Slotted Stoneware Sponge Holder</h5>
                                <p>Organic in shape and charming by nature, this unique sponge holder is both beautiful and functional.</p>
                                <div class="item__head">
                                    <div class="item__description">
                                        <div class="item__info">Highest bid by <span>Nedjai Mohamed</span></div>
                                        <div class="item__currency"><div class="item__price">$652.22 </div></div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="homepage-item-box white-bg">
                            <img src="https://toka.b-cdn.net/wp-content/uploads/2022/04/fujm.png" alt="">
                            <div class="item__control px-5 py-5">
                                <h5>Slotted Stoneware Sponge Holder</h5>
                                <p>Organic in shape and charming by nature, this unique sponge holder is both beautiful and functional.</p>
                                <div class="item__head">
                                    <div class="item__description">
                                        <div class="item__info">Highest bid by <span>Nedjai Mohamed</span></div>
                                        <div class="item__currency"><div class="item__price">$652.22 </div></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-7 col-12">
                        <a href="#" class="homepage-item-box white-bg">
                            <img src="https://toka.b-cdn.net/wp-content/uploads/2022/04/vrgvg.png" alt="">
                            <div class="item__control px-5 py-5">
                                <h5>Slotted Stoneware Sponge Holder</h5>
                                <p>Organic in shape and charming by nature, this unique sponge holder is both beautiful and functional.</p>
                                <div class="item__head">
                                    <div class="item__description">
                                        <div class="item__info">Highest bid by <span>Nedjai Mohamed</span></div>
                                        <div class="item__currency"><div class="item__price">$652.22 </div></div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <a href="#" class="homepage-item-box white-bg">
                                    <img src="https://toka.b-cdn.net/wp-content/uploads/2022/04/abstract-blue-painting-with-purple-dots-1.png" alt="">
                                    <div class="item__control px-5 py-5">
                                        <h5>Slotted Stoneware Sponge Holder</h5>
                                        <p>Organic in shape and charming by nature, this unique sponge holder is both beautiful and functional.</p>
                                        <div class="item__head">
                                            <div class="item__description">
                                                <div class="item__info">Highest bid by <span>Nedjai Mohamed</span></div>
                                                <div class="item__currency"><div class="item__price">$652.22 </div></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="#" class="homepage-item-box white-bg">
                                    <img src="https://toka.b-cdn.net/wp-content/uploads/2022/04/rvgls.png" alt="">
                                    <div class="item__control px-5 py-5">
                                        <h5>Slotted Stoneware Sponge Holder</h5>
                                        <p>Organic in shape and charming by nature, this unique sponge holder is both beautiful and functional.</p>
                                        <div class="item__head">
                                            <div class="item__description">
                                                <div class="item__info">Highest bid by <span>Nedjai Mohamed</span></div>
                                                <div class="item__currency"><div class="item__price">$652.22 </div></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="more__products__btns white-bg-btn d-flex justify-content-center mt-15">
                    <button class="more__products__btn">
                        <span class="more__products__text">load more</span> <span class="more__products__icon"><i class="fad fa-spinner-third"></i></span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div class="section discover py-20">
        <div class="container">
            <div class="main__title__text d-flex align-items-center justify-content-between mb-15">
                <div class="title__text">
                    <h3 class="hot__title__outline h3 mb-0">New<span>Arrivals</span></h3>
                    <div class="popular__stage">Enjoy the summer time and shop our SS22 Collection</div>
                </div>
                <div class="title__more__btn">
                    <a href="#" class="btn btn-outline-dark py-1 px-10">View all products</a>
                </div>
            </div>

            <div class="discover__top justify-content-between align-items-center">
                <div class="discover__nav">
                    <a class="discover__link active" href="#"><i class="fad fa-ball-pile"></i> All products</a>
                    <a class="discover__link" href="#"><i class="fad fa-globe"></i> Best sallers</a>
                    <a class="discover__link" href="#"><i class="fad fa-tshirt"></i> Tops</a>
                    <a class="discover__link" href="#"><i class="fad fa-mitten"></i> Pants & Tights</a>
                    <a class="discover__link" href="#"><i class="fad fa-boot"></i> Shoes <span class="onsalle">-22%</span></a>
                    <a class="discover__link" href="#"><i class="fad fa-sunglasses"></i> Sunglasses</a>
                </div>

                <div class="tablet-show">
                    <select class="select">
                        <option>All items</option>
                        <option>Art</option>
                        <option>Game</option>
                        <option>Photography</option>
                        <option>Music</option>
                        <option>Video</option>
                    </select>
                </div>

                <button class="discover__filter">
                    <span class="closed__discover__filter">Filter <i class="fad fa-sliders-h"></i></span> <i class="fal fa-times opened__discover__filter"></i>
                </button>
            </div>

            <div class="discover__filters">
                <div class="discover__sorting">
                    <div class="discover__cell">
                        <div class="field">
                            <div class="field__wrap">
                                <select class="select">
                                    <option>Price</option>
                                    <option>The lowest price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="discover__cell">
                        <div class="field">
                            <div class="field__wrap">
                                <select class="select">
                                    <option>Colour</option>
                                    <option>Least liked</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="discover__cell">
                        <div class="field">
                            <div class="field__wrap">
                                <select class="select">
                                    <option>Season</option>
                                    <option>All</option>
                                    <option>Most liked</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="discover__cell">
                        <div class="field">
                            <div class="field__wrap">
                                <select class="select">
                                    <option>purpose</option>
                                    <option>All</option>
                                    <option>Most liked</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="discover__cell">
                        <div class="field">
                            <div class="field__wrap">
                                <select class="select">
                                    <option>Style</option>
                                    <option>All</option>
                                    <option>Most liked</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="discover__cell">
                        <div class="field">
                            <div class="field__wrap">
                                <select class="select">
                                    <option>Matriel</option>
                                    <option>All</option>
                                    <option>Most liked</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="discover__list">
                <div class="discover__slider js-slider-discover js-slider-resize">
                    <div class="product__default__card card border-0">
                        <a href="#" class="product__card__preview">
                            <img class="front__card__preview" src="https://i.etsystatic.com/7136732/r/il/b75904/3544148363/il_794xN.3544148363_43f0.jpg" alt="Card preview" />
                            <img class="back__card__preview" src="https://i.etsystatic.com/7136732/r/il/8c36c2/2180488642/il_794xN.2180488642_i1fs.jpg" alt="Card preview" />
                        </a>
                        <div class="card__default__informations">
                            <div class="card__body">
                                <button class="card__favorite">
                                    <svg class="icon icon-heart">

                                    </svg>
                                </button>

                                <div class="card__line">
                                    <h6 class="h6 mb-4">
                                        <small class="d-block font-weight-light">ACESHOW</small>
                                        Lipsy V neck Lace Bodycon Dress
                                    </h6>
                                </div>
                                <div class="product__default__card__prices align-items-center d-flex justify-content-between">
                                    <div class="the__price__discount">£89.00</div>
                                    <div class="the__price">£89.00</div>
                                </div>
                            </div>

                            <div class="card__additionel__informations d-flex align-items-center justify-content-between">
                                <a href="#" class="card__additionel__informations__btn">Order now</a>
                                <span class="card__additionel__informations__orders">4,532 order on this product</span>
                            </div>
                        </div>
                    </div>

                    <div class="product__default__card card border-0">
                        <a href="#" class="product__card__preview">
                            <img class="front__card__preview" src="https://i.etsystatic.com/20380734/r/il/d77040/3195396323/il_794xN.3195396323_p13r.jpg" alt="Card preview" />
                            <img class="back__card__preview" src="https://i.etsystatic.com/7136732/r/il/8c36c2/2180488642/il_794xN.2180488642_i1fs.jpg" alt="Card preview" />
                        </a>
                        <div class="card__default__informations">
                            <div class="card__body">
                                <button class="card__favorite">
                                    <svg class="icon icon-heart">

                                    </svg>
                                </button>

                                <div class="card__line">
                                    <h6 class="h6 mb-4">
                                        <small class="d-block font-weight-light">ACESHOW</small>
                                        Lipsy V neck Lace Bodycon Dress
                                    </h6>
                                </div>
                                <div class="product__default__card__prices align-items-center d-flex justify-content-between">
                                    <div class="the__price__discount">£89.00</div>
                                    <div class="the__price">£89.00</div>
                                </div>
                            </div>

                            <div class="card__additionel__informations d-flex align-items-center justify-content-between">
                                <a href="#" class="card__additionel__informations__btn">Order now</a>
                                <span class="card__additionel__informations__orders">4,532 order on this product</span>
                            </div>
                        </div>
                    </div>

                    <div class="product__default__card card border-0">
                        <a href="#" class="product__card__preview">
                            <img class="front__card__preview" src="https://i.etsystatic.com/28405914/r/il/9ac5b2/3231359403/il_794xN.3231359403_48fq.jpg" alt="Card preview" />
                            <img class="back__card__preview" src="https://i.etsystatic.com/7136732/r/il/8c36c2/2180488642/il_794xN.2180488642_i1fs.jpg" alt="Card preview" />
                        </a>
                        <div class="card__default__informations">
                            <div class="card__body">
                                <button class="card__favorite">
                                    <svg class="icon icon-heart">

                                    </svg>
                                </button>

                                <div class="card__line">
                                    <h6 class="h6 mb-4">
                                        <small class="d-block font-weight-light">ACESHOW</small>
                                        Lipsy V neck Lace Bodycon Dress
                                    </h6>
                                </div>
                                <div class="product__default__card__prices align-items-center d-flex justify-content-between">
                                    <div class="the__price__discount">£89.00</div>
                                    <div class="the__price">£89.00</div>
                                </div>
                            </div>

                            <div class="card__additionel__informations d-flex align-items-center justify-content-between">
                                <a href="#" class="card__additionel__informations__btn">Order now</a>
                                <span class="card__additionel__informations__orders">4,532 order on this product</span>
                            </div>
                        </div>
                    </div>

                    <div class="product__default__card card border-0">
                        <a href="#" class="product__card__preview">
                            <img class="front__card__preview" src="https://i.etsystatic.com/7136732/r/il/b75904/3544148363/il_794xN.3544148363_43f0.jpg" alt="Card preview" />
                            <img class="back__card__preview" src="https://i.etsystatic.com/7136732/r/il/8c36c2/2180488642/il_794xN.2180488642_i1fs.jpg" alt="Card preview" />
                        </a>
                        <div class="card__default__informations">
                            <div class="card__body">
                                <button class="card__favorite">
                                    <svg class="icon icon-heart">

                                    </svg>
                                </button>

                                <div class="card__line">
                                    <h6 class="h6 mb-4">
                                        <small class="d-block font-weight-light">ACESHOW</small>
                                        Lipsy V neck Lace Bodycon Dress
                                    </h6>
                                </div>
                                <div class="product__default__card__prices align-items-center d-flex justify-content-between">
                                    <div class="the__price__discount">£89.00</div>
                                    <div class="the__price">£89.00</div>
                                </div>
                            </div>

                            <div class="card__additionel__informations d-flex align-items-center justify-content-between">
                                <a href="#" class="card__additionel__informations__btn">Order now</a>
                                <span class="card__additionel__informations__orders">4,532 order on this product</span>
                            </div>
                        </div>
                    </div>

                    <div class="product__default__card card border-0">
                        <a href="#" class="product__card__preview">
                            <img class="front__card__preview" src="https://i.etsystatic.com/7136732/r/il/b75904/3544148363/il_794xN.3544148363_43f0.jpg" alt="Card preview" />
                            <img class="back__card__preview" src="https://i.etsystatic.com/7136732/r/il/8c36c2/2180488642/il_794xN.2180488642_i1fs.jpg" alt="Card preview" />
                        </a>
                        <div class="card__default__informations">
                            <div class="card__body">
                                <button class="card__favorite">
                                    <svg class="icon icon-heart">

                                    </svg>
                                </button>

                                <div class="card__line">
                                    <h6 class="h6 mb-4">
                                        <small class="d-block font-weight-light">ACESHOW</small>
                                        Lipsy V neck Lace Bodycon Dress
                                    </h6>
                                </div>
                                <div class="product__default__card__prices align-items-center d-flex justify-content-between">
                                    <div class="the__price__discount">£89.00</div>
                                    <div class="the__price">£89.00</div>
                                </div>
                            </div>

                            <div class="card__additionel__informations d-flex align-items-center justify-content-between">
                                <a href="#" class="card__additionel__informations__btn">Order now</a>
                                <span class="card__additionel__informations__orders">4,532 order on this product</span>
                            </div>
                        </div>
                    </div>

                    <div class="product__default__card card border-0">
                        <a href="#" class="product__card__preview">
                            <img class="front__card__preview" src="https://i.etsystatic.com/7136732/r/il/b75904/3544148363/il_794xN.3544148363_43f0.jpg" alt="Card preview" />
                            <img class="back__card__preview" src="https://i.etsystatic.com/7136732/r/il/8c36c2/2180488642/il_794xN.2180488642_i1fs.jpg" alt="Card preview" />
                        </a>
                        <div class="card__default__informations">
                            <div class="card__body">
                                <button class="card__favorite">
                                    <svg class="icon icon-heart">

                                    </svg>
                                </button>

                                <div class="card__line">
                                    <h6 class="h6 mb-4">
                                        <small class="d-block font-weight-light">ACESHOW</small>
                                        Lipsy V neck Lace Bodycon Dress
                                    </h6>
                                </div>
                                <div class="product__default__card__prices align-items-center d-flex justify-content-between">
                                    <div class="the__price__discount">£89.00</div>
                                    <div class="the__price">£89.00</div>
                                </div>
                            </div>

                            <div class="card__additionel__informations d-flex align-items-center justify-content-between">
                                <a href="#" class="card__additionel__informations__btn">Order now</a>
                                <span class="card__additionel__informations__orders">4,532 order on this product</span>
                            </div>
                        </div>
                    </div>

                    <div class="product__default__card card border-0">
                        <a href="#" class="product__card__preview">
                            <img class="front__card__preview" src="https://i.etsystatic.com/7136732/r/il/b75904/3544148363/il_794xN.3544148363_43f0.jpg" alt="Card preview" />
                            <img class="back__card__preview" src="https://i.etsystatic.com/7136732/r/il/8c36c2/2180488642/il_794xN.2180488642_i1fs.jpg" alt="Card preview" />
                        </a>
                        <div class="card__default__informations">
                            <div class="card__body">
                                <button class="card__favorite">
                                    <svg class="icon icon-heart">

                                    </svg>
                                </button>

                                <div class="card__line">
                                    <h6 class="h6 mb-4">
                                        <small class="d-block font-weight-light">ACESHOW</small>
                                        Lipsy V neck Lace Bodycon Dress
                                    </h6>
                                </div>
                                <div class="product__default__card__prices align-items-center d-flex justify-content-between">
                                    <div class="the__price__discount">£89.00</div>
                                    <div class="the__price">£89.00</div>
                                </div>
                            </div>

                            <div class="card__additionel__informations d-flex align-items-center justify-content-between">
                                <a href="#" class="card__additionel__informations__btn">Order now</a>
                                <span class="card__additionel__informations__orders">4,532 order on this product</span>
                            </div>
                        </div>
                    </div>

                    <div class="product__default__card card border-0">
                        <a href="#" class="product__card__preview">
                            <img class="front__card__preview" src="https://i.etsystatic.com/7136732/r/il/b75904/3544148363/il_794xN.3544148363_43f0.jpg" alt="Card preview" />
                            <img class="back__card__preview" src="https://i.etsystatic.com/7136732/r/il/8c36c2/2180488642/il_794xN.2180488642_i1fs.jpg" alt="Card preview" />
                        </a>
                        <div class="card__default__informations">
                            <div class="card__body">
                                <button class="card__favorite">
                                    <svg class="icon icon-heart">

                                    </svg>
                                </button>

                                <div class="card__line">
                                    <h6 class="h6 mb-4">
                                        <small class="d-block font-weight-light">ACESHOW</small>
                                        Lipsy V neck Lace Bodycon Dress
                                    </h6>
                                </div>
                                <div class="product__default__card__prices align-items-center d-flex justify-content-between">
                                    <div class="the__price__discount">£89.00</div>
                                    <div class="the__price">£89.00</div>
                                </div>
                            </div>

                            <div class="card__additionel__informations d-flex align-items-center justify-content-between">
                                <a href="#" class="card__additionel__informations__btn">Order now</a>
                                <span class="card__additionel__informations__orders">4,532 order on this product</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="more__products__btns d-flex justify-content-center mt-15">
                <button class="more__products__btn">
                    <span class="more__products__text">load more</span> <span class="more__products__icon"><i class="fad fa-spinner-third"></i></span>
                </button>
            </div>
        </div>
    </div>

    <div class="more__arts__section py-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-12">
                    <div class="more__arts__widget__wrap">
                        <h5>Want to get more art?</h5>
                        <p>Browse dozens of my other extraordinary art collections in the world’s largest NFT marketplace.</p>
                        <a href="#">Browse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
