<?php

namespace App\View\Components;

use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\View\Component;

class Footer extends Component
{
    public $settings;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->settings=Setting::query()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
