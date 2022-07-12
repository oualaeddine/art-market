<?php

namespace App\Modules\BrandsUi\Controllers;

use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowArchivedBrands
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Marques archivés', 'icon-award', 'blue', 'Liste des marques archivés');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => 'Marques', 'url' => route('admin.brands.index')],['name' => 'Marques archivés', 'url' => route('admin.brands.archived')]);

        if ($request->ajax()) {
            $data =  Brand::query()->onlyTrashed()->orderby('created_at', 'desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','BrandsUi::actions.btn-brand-archived')
                    ->addColumn('responsive', function ($param) { return '';})
                    ->addColumn('image', function ($param) {

                        if($param->image != null){
                            return '<a href="'.asset($param->image).'" target="_blank">  <img src="'.asset($param->image).'" alt="" class="img img-fluid image-hold" height="100"  width="100"  /></a>';

                        }else{
                            return '<span class="badge badge-info shadow-sm">Aucune</span> ';
                        }

                    })
                    ->addColumn('created_at', function ($param) {

                        return $param->created_at;

                    })
                    ->rawColumns(['action','responsive','image','created_at'])
                    ->make(true);

        }

        return view('BrandsUi::index-archived', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => 'Marques archivés']);
    }



}
