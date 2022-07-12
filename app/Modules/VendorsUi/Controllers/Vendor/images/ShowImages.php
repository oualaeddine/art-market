<?php

namespace App\Modules\VendorsUi\Controllers\Vendor\images;

use App\Models\VendorImage;
use App\Models\VendorUser;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;
use function route;
use function view;

class ShowImages
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Images', 'icon-award', 'blue', 'Liste des images');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Images', 'url' => route('vendor.images.index')]);

        if ($request->ajax()) {
            $data = VendorImage::query()
                ->where('vendor_id', \auth()->guard('vendor')->user()->vendor_id)
                ->orderByDesc('created_at');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'VendorsUi::Vendor.actions.btn-images')
                ->addColumn('responsive', function ($param) {
                    return '';
                })
                ->addColumn('created_at', function ($param) {

                    return $param->created_at;

                })
                ->addColumn('image_ar', function ($image) {

                    if ($image->img_ar)  return '<a href="javascript:void(0)"   data-bs-toggle="modal"
                                     data-bs-target="#modal-show_img" onclick=showImg("'.asset($image->img_ar).'") class="badge badge-info shadow-sm">Voir</a> ';
                    return '<span class="badge badge-info shadow-sm">Aucune</span> ';

                })
                ->addColumn('image_fr', function ($image) {

                    if ($image->img_fr)  return '<a href="javascript:void(0)"   data-bs-toggle="modal"
                                     data-bs-target="#modal-show_img" onclick=showImg("'.asset($image->img_fr).'") class="badge badge-info shadow-sm">Voir</a> ';
                    return '<span class="badge badge-info shadow-sm">Aucune</span> ';

                })
                ->rawColumns(['action','image_ar','image_fr', 'responsive', 'created_at'])
                ->make(true);


        }

        return view('VendorsUi::Vendor.images.index', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Image']);
    }


}
