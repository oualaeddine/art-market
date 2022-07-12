<?php

namespace App\View\Components;

use App\Modules\BrandsLogic\Models\Brand;
use Illuminate\View\Component;

class BrandsSection extends Component
{

    public $brands;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->brands=Brand::query()->whereIsActive(true)->whereHas('products')->withCount('products')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.brands-section');
    }
}
