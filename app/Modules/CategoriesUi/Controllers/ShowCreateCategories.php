<?php

namespace App\Modules\CategoriesUi\Controllers;

use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;


class ShowCreateCategories
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("Catégories", 'icon-grid', 'blue', "Ajouter une catégorie");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Catégories", 'url' => '/admin-dash/categories'],['name' => "Ajouter une catégorie", 'url' => '/admin-dash/categories/ajouter']);

        $categories = Category::query()->where('is_active',1)->whereDoesntHave('parent_1.parent_2')->get();

        return view('CategoriesUi::pages.create', compact('header', 'user_info','breadcrumbs','categories'))->with(['page_title' => "Catégories"]);
    }





   /*  public function authorize()
    {
        return auth()->user()->can('create_bon_achat');
    } */

}
