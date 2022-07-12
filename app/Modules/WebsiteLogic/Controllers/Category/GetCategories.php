<?php

namespace App\Modules\WebsiteLogic\Controllers\Category;

use App\Modules\CategoriesLogic\Models\Category;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCategories
{
    use AsAction;


    public function handle(ActionRequest $request)
    {
        return Category::query()->with('parent')->get();
    }

}
