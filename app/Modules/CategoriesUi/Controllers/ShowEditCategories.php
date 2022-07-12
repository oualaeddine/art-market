<?php

namespace App\Modules\CategoriesUi\Controllers;



use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowEditCategories
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request,Category $category)
    {
        $header = GenerateHeader::run("Catégories", 'icon-grid', 'blue', "Modifier une catégorie");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Catégories", 'url' => '/cod-dash/categories'],['name' => "Modifier une catégorie", 'url' => '/cod-dash/categories/'.$category->id.'/modifier']);

        $categories = Category::query()->where('is_active',1)->whereDoesntHave('parent_1.parent_2')->get();

        return view('CategoriesUi::pages.edit', compact('header', 'user_info','breadcrumbs','category','categories'))->with(['page_title' => "Catégories"]);
    }

/*     public function authorize()
    {
        return auth()->user()->can('edit_bon_achat');
    } */


}
