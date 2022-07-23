<?php

namespace App\View\Components;

use Illuminate\View\Component;

class addresses extends Component
{

    public $client;
    public $wilayas;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($client,$wilayas)
    {
        $this->client=$client;
        $this->wilayas=$wilayas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.addresses');
    }
}
