<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VendorSideBarFilter extends Component
{
    public   $categories;
    public   $brands;
    public   $selected_category;
    public   $selected_brand;
    public   $price;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories,$brands,$selectedCategory,$selectedBrand,$price)
    {
        $this->categories=$categories;
        $this->brands=$brands;
        $this->selected_category=$selectedCategory;
        $this->selected_brand=$selectedBrand;
        $this->price=$price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.vendor-side-bar-filter');
    }
}
