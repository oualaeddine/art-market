<?php

namespace App\View\Components;

use Illuminate\View\Component;


class SideBarFilter extends Component
{

    public   $categories;
    public   $brands;
    public   $vendors;
    public   $selected_category;
    public   $selected_brand;
    public   $selected_vendor;
    public   $price;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories,$brands,$vendors,$selectedCategory,$selectedBrand,$selectedVendor,$price)
    {
        $this->categories=$categories;
        $this->brands=$brands;
        $this->vendors=$vendors;
        $this->selected_category=$selectedCategory;
        $this->selected_brand=$selectedBrand;
        $this->selected_vendor=$selectedVendor;
        $this->price=$price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-bar-filter');
    }
}
