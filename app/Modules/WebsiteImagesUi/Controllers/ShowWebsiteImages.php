<?php

namespace App\Modules\WebsiteImagesUi\Controllers;



use App\Modules\Extra\GenerateHeader;
use App\Modules\WebsiteImagesLogic\Models\Website_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowWebsiteImages
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("Images du site web", 'icon-grid', 'blue', "Liste des image du site web");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Images du site web", 'url' => '/admin-dash/website-images']);

        if ($request->ajax()) {
            $data =  Website_image::orderby('created_at', 'desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','WebsiteImagesUi::actions.btn')
                    ->addColumn('responsive', function ($category) { return '';})
                    ->addColumn('image', function ($category) {

                        if($category->image != null){
                            return '<a href="'.asset($category->image).'" target="_blank">  <img src="'.asset($category->image).'" alt="" class="img img-fluid image-hold" height="100"  width="100"  /></a>';

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
                    ->rawColumns(['action','responsive','image','created_at','is_active'])
                    ->make(true);

        }

        return view('WebsiteImagesUi::index', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => "Images du site web"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
