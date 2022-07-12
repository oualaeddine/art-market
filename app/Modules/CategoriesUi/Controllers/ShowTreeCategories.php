<?php

namespace App\Modules\CategoriesUi\Controllers;

use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;


class ShowTreeCategories
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("Catégories", 'icon-grid', 'blue', "Arborescence des catégories");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Catégories", 'url' => '/cod-dash/categories'], ['name' => "Arborescence des catégories", 'url' => '/cod-dash/categories/treeview']);

        $categories = Category::query()->where('parent_id',null)->with('sub_categories')->orderby('name_fr','asc')->get();


        return view('CategoriesUi::index-tree', compact('header', 'user_info', 'breadcrumbs', 'categories'))->with(['page_title' => "Catégories"]);
    }


    public function authorize()
    {
        return auth()->user()->can('view_categories');
    }

}
