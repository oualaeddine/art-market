<?php

namespace App\View\Components;

use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\WebsiteImagesLogic\Models\Website_image;
use Illuminate\View\Component;

class FirstSection extends Component
{

     public $tops;
     public $brands;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tops =Website_image::query()->where('name','like',"%Top%")->whereLang(\app()->getLocale())->get();
        $this->brands=Brand::query()->whereIsActive(true)->whereHas('products')->withCount('products')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.first-section');
    }
}
