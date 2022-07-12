<?php

namespace App\Modules\SettingsUi\Controllers;


use App\Models\HomeCategory;
use App\Models\HomeOffer;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowHomeCategories
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("Catégories d'accueil", 'icon-grid', 'blue', "Liste des catégories d'accueil");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Catégories d'accueil", 'url' => route('admin.home-categories.index')]);

        if ($request->ajax()) {
            $data = HomeCategory::query()->with('category')->orderby('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'SettingsUi::actions.btn-home-categories')
                ->addColumn('responsive', function ($category) {
                    return '';
                })
                ->addColumn('name_ar', function ($category) {
                    return '<span class="badge badge-primary shadow-sm">' .$category->category->name_ar. '</span> ';
                })
                ->addColumn('name_fr', function ($category) {
                    return '<span class="badge badge-primary shadow-sm">' .$category->category->name_fr. '</span> ';
                })
                ->rawColumns(['action','name_fr','name_ar', 'responsive'])
                ->make(true);

        }
        $categories=Category::query()->where('is_active',1)->whereDoesntHave('home_category')->get();

        return view('SettingsUi::index-home-categories', compact('categories','header', 'user_info', 'breadcrumbs'))->with(['page_title' => "Catégories d'accueil"]);
    }


    public function authorize()
    {
        return auth()->user()->can('view_param');
    }

}
