<div class="cart__item">
    <div class="row justify-content-start w-100 align-items-center">
        <a href="#" class="cart__preview col-md-2"><img src="/website/images/demo/product-0-8.jpeg" alt="item" /></a>

        <div class="col-md-4">
            <div class="cart__subtitle">Black Lace Trim Tee - XL</div>
            <div class="cart__description">From <a href="#">ADIDAS</a> store</div>
            <div class="cart__installment">6 months installment + %22</div>
            <a class="cart__remove" href="#"><i class="fal fa-times"></i> REMOVE</a>
        </div>

        <div class="col-md-2">
            <div class="cart__prices">
                <div class="the__price__discount" style="text-decoration: none">{{number_format($item->price,2).trans('DA')}}</div>
{{--                <div class="the__price">$89.00</div>--}}
            </div>
        </div>

        <div class="col-md-2">
            <div class="quantity-control" data-quantity="">
                <button class="quantity-btn" data-quantity-minus="">
                    <svg viewBox="0 0 409.6 409.6">
                        <g>
                            <g>
                                <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
                            </g>
                        </g>
                    </svg>
                </button>
                <input type="number" class="quantity-input"  data-quantity-target="" value="{{$item->qty}}" step="1" min="1" max="" name="quantity" />
                <button class="quantity-btn" data-quantity-plus="">
                    <svg viewBox="0 0 426.66667 426.66667">
                        <path
                            d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0"
                        />
                    </svg>
                </button>
            </div>
        </div>
        <div class="col-md-2">
            <div class="cart__prices">
                <div class="the__price">$123.43</div>
            </div>
        </div>
    </div>
</div>
