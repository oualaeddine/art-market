<?php

namespace App\Modules\CategoriesLogic\Controllers;

use App\Modules\CategoriesLogic\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteCategories
{
    use AsAction;

    public function handle($category)
    {
//        if($category->icon != null){
//            File::delete(public_path($category->icon));
//        }

        $category->delete();
    }

    public function asController(Category $category)
    {
        $this->handle($category);
        Session::flash('message',"Catégorie archivé avec succès");
        return redirect()->back();
    }
  /*   public function authorize()
    {
        return auth()->user()->can('delete_bon_achat');
    } */
}
