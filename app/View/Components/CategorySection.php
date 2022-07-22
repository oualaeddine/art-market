<?php

namespace App\View\Components;

use App\Modules\CategoriesLogic\Models\Category;
use Illuminate\View\Component;

class CategorySection extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories=Category::query()->withWhereHas('vendors')->withCount('products')->whereIsActive(true)->whereParentId(null)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-section');
    }
}
