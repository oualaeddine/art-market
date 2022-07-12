<?php

namespace App\View\Components;

use App\Modules\ProductsLogic\Models\Product;
use Illuminate\View\Component;

class HomeProductSection extends Component
{
    public $products;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->products=Product::query()->withWhereHas('vendor')->with('categories')->whereIsActive(true)->inRandomOrder()->limit(10)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home-product-section');
    }
}
