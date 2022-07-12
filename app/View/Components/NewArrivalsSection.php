<?php

namespace App\View\Components;

use App\Modules\ProductsLogic\Models\Product;
use Illuminate\View\Component;

class NewArrivalsSection extends Component
{

    public $products;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->products=Product::query()->withWhereHas('vendor')->with('categories')->whereIsActive(true)->orderByDesc('created_at')->limit(12)->get();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.new-arrivals-section');
    }
}
