<?php

namespace App\Modules\CategoriesLogic\Controllers;

use App\Modules\CategoriesLogic\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class RestoreCategories
{
    use AsAction;

    public function handle(Category $category)
    {

        $category->restore();
    }

    public function asController(Category $category)
    {
        $this->handle($category);
        Session::flash('message',"Catégorie restaurer avec succès");
        return redirect()->back();
    }
  /*   public function authorize()
    {
        return auth()->user()->can('delete_bon_achat');
    } */
}
