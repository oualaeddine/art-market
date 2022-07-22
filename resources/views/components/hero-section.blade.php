<div class="hero-area-header h-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <span class="totlion">{{$heroText->title}}</span>
                <h5 class="title">{{$heroText->main_title}}</h5>
                <p class="sub-title"> {{$heroText->sub_title}}</p>
                <a class="btn btn-primary px-12" href="{{$heroText->link}}">{{__("See now")}}</a>
            </div>

            <div class="col-md-6 col-12 position-relative hero-area-item-box-container">

                @foreach($ThreeImages as $image)
                    <a href="{{$image->link}}" class="hero-area-item-box white-bg shadow-2 rounded-20 px-5 pt-5 pb-8">
                        <img
                            src="{{$image->image}}"
                            alt=""/>
                        <div class="item__control px-5">
                            <h5>{{$image->title}}</h5>
                            <p>{{$image->main_title}}</p>
                            <div class="item__head">
                                <div class="item__description">
{{--                                    <div class="item__info">Highest bid by <span>Kohaku Tora</span></div>--}}
                                    <div class="item__currency">
                                        <div class="item__price">{{$image->sub_title.trans('DA')}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach


            </div>
        </div>
    </div>
</div>
