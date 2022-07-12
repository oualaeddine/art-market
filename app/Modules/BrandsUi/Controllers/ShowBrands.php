<?php

namespace App\Modules\BrandsUi\Controllers;

use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowBrands
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Marques', 'icon-award', 'blue', 'Liste des marques');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => 'Marques', 'url' => '/cod-dash/marques']);

        if ($request->ajax()) {
            $data =  Brand::orderby('created_at', 'desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','BrandsUi::actions.btn-brand')
                    ->addColumn('responsive', function ($param) { return '';})
                    ->addColumn('image', function ($param) {

                        if($param->image != null){
                            return '<a href="javascript:void(0)"   data-bs-toggle="modal"
                                     data-bs-target="#modal-show_img" onclick=showImg("'.asset($param->image).'") class="badge badge-info shadow-sm">Voire</a>';
                        }else{
                            return '<span class="badge badge-info shadow-sm">Aucune</span> ';
                        }

                    })
                ->addColumn('is_active', function ($param) {

                        if ($param->is_active)  return '<span class="badge badge-info shadow-sm">Oui</span> ';
                        return '<span class="badge badge-danger shadow-sm">Non</span> ';


                    })
                    ->addColumn('created_at', function ($param) {

                        return $param->created_at;

                    })
                    ->rawColumns(['action','is_active','responsive','image','created_at'])
                    ->make(true);

        }

        return view('BrandsUi::index', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => 'Marques']);
    }



}
