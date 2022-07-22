<?php

namespace App\View\Components;

use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\View\Component;

class Header extends Component
{
    public $phone;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->phone=Setting::query()->where('name', 'contact tél 1')->first();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
