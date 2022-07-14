<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateAddressModal extends Component
{
    public  $wilayas;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($wilayas)
    {
        $this->wilayas=$wilayas;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.create-address-modal');
    }
}
