<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfileTabsCard extends Component
{

    public $client;
    public $tab;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($client,$tab)
    {
        $this->client=$client;
        $this->tab=$tab;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile-tabs-card');
    }
}
