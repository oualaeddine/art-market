<?php

namespace App\View\Components;

use App\Modules\WebsiteImagesLogic\Models\Website_image;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class HeroSection extends Component
{

    public $heroText;
    public $ThreeImages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->heroText=Website_image::query()->where('name','like',"Hero%")->whereLang(app()->getLocale())->first();
        $this->ThreeImages=Website_image::query()->where('name','like',"ShowImage%")->whereLang(app()->getLocale())->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hero-section');
    }
}
