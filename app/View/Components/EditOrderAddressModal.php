<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditOrderAddressModal extends Component
{
    public $client;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client=auth()->guard('client')->user()->load('addresses');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.edit-order-address-modal');
    }
}
