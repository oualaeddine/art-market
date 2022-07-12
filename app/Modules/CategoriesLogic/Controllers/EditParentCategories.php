<?php

namespace App\Modules\CategoriesLogic\Controllers;

use App\Modules\CategoriesLogic\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class EditParentCategories
{
    use AsAction;

    public function asController(ActionRequest $request, Category $category)
    {

        $this->handle($request, $category);
        return response()->json();

    }

    public function handle(ActionRequest $request,$category)
    {
        $parent_id = $request->parent_id;

        if($request->parent_id == "#"){
            $parent_id = null;
        }

       $category->update(['parent_id' => $parent_id]);

    }

    public function authorize()
    {
        return auth()->user()->can('edit_categories');
    }
}
