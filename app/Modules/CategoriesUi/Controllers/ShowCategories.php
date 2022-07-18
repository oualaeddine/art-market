<?php

namespace App\Modules\CategoriesUi\Controllers;


use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowCategories
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("Catégories", 'icon-grid', 'blue', "Liste des catégories");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Catégories", 'url' => '/admin-dash/categories']);

        if ($request->ajax()) {
            $data =  Category::orderby('created_at', 'desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','CategoriesUi::actions.btn')
                    ->addColumn('responsive', function ($category) { return '';})
                    ->addColumn('icon', function ($category) {

                        if($category->icon != null){
                            return '<a href="'.asset($category->icon).'" target="_blank">  <img src="'.asset($category->icon).'" alt="" class="img img-fluid image-hold" height="100"  width="100"  /></a>';

                        }else{
                            return '<span class="badge badge-info shadow-sm">Aucune</span> ';
                        }

                    })
                    ->addColumn('created_at', function ($category) {

                        return $category->created_at;

                    })->addColumn('is_active', function ($category) {

                        if($category->is_active == 1){
                            return '<span class="badge badge-success shadow-sm">Oui</span> ';
                         }else{
                            return '<span class="badge badge-danger shadow-sm">Non</span> ';
                         }

                    })
                    ->rawColumns(['action','responsive','icon','created_at','is_active'])
                    ->make(true);

        }

        return view('CategoriesUi::index', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => "Catégories"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
