<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CatlagoSection extends Component
{

    public  $products;
    public  $sort_by;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($products,$sortBy)
    {
        $this->products=$products;
        $this->sort_by=$sortBy;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.catlago-section');
    }
}
