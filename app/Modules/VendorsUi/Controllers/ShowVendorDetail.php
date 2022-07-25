<?php

namespace App\Modules\VendorsUi\Controllers;

use App\Models\RawOrder;
use App\Models\Vendor;
use App\Models\VendorBrand;
use App\Models\VendorCategory;
use App\Models\VendorImage;
use App\Models\VendorUser;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class ShowVendorDetail
{
    use AsAction;

    public function asController(ActionRequest $request,Vendor $vendor,$type)
    {
        $header = GenerateHeader::run('Vendeurs ', 'icon-award', 'blue', "Détails du vendeur ( $vendor->name_fr ) ");
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Vendeurs ', 'url' => route('admin.vendors.index')],['name'=>'Détails du vendeur','url'=>route('admin.vendors.detail',['type'=>'all','vendor'=>$vendor->id])]);

        $selected_categories=VendorCategory::query()->where('vendor_id',$vendor->id)->pluck('category_id')->toArray();
        $categories = Category::query()->where('is_active',1)->get();

        $selected_brands=VendorBrand::query()->where('vendor_id',$vendor->id)->pluck('brand_id')->toArray();

        $brands = Brand::query()->whereIsActive(true)->get();
        $roles=Role::query()->where('guard_name','vendor')->get();


        if ($request->ajax()) {

            return $this->getData($vendor,$type);

        }





        return view('VendorsUi::detail', compact('roles','selected_brands','brands','selected_categories','categories','vendor','header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Détails du vendeur']);
    }

    private function getData($vendor,$type)
    {

        switch ($type) {
            case 'users':
                $data = VendorUser::query()
                    ->with('roles')
                    ->where('vendor_id', $vendor->id)
                    ->orderByDesc('created_at');
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'VendorsUi::actions.btn-users')
                    ->addColumn('responsive', function ($param) {
                        return '';
                    })
                    ->addColumn('created_at', function ($param) {

                        return $param->created_at;

                    })
                    ->addColumn('roles', function ($record) {
                       $txt='';
                        foreach ($record->roles as $role){
                            $txt.= $role->ref.'  ';
                        }

                        return $txt;

                    })
                    ->addColumn('is_active', function ($user) {

                      if ($user->is_active) return '<span class="badge badge-success">Oui</span>';
                       return '<span class="badge badge-danger">Non</span>';

                    })
                    ->addColumn('phone', function ($user) {


                       return '0'.$user->phone;

                    })
                    ->rawColumns(['action','is_active', 'responsive', 'created_at'])
                    ->make(true);

            case 'images':
                $data = VendorImage::query()
                    ->where('vendor_id', $vendor->id)
                    ->orderByDesc('created_at');
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'VendorsUi::actions.btn-images')
                    ->addColumn('responsive', function ($param) {
                        return '';
                    })
                    ->addColumn('created_at', function ($param) {

                        return $param->created_at;

                    })
                    ->addColumn('image_ar', function ($image) {

                        if ($image->img_ar)  return '<a href="javascript:void(0)"   data-bs-toggle="modal"
                                     data-bs-target="#modal-show_img" onclick=showImg("'.asset($image->img_ar).'") class="badge badge-info shadow-sm" >Voir</a> ';
                        return '<span class="badge badge-info shadow-sm">Aucune</span> ';

                    })
                    ->addColumn('image_fr', function ($image) {

                        if ($image->img_fr)  return '<a  onclick=showImg("'.asset($image->img_fr).'") data-bs-toggle="modal"
                                     data-bs-target="#modal-show_img" href="javascript:void(0)" class="badge badge-info shadow-sm">Voir</a> ';
                        return '<span class="badge badge-info shadow-sm">Aucune</span> ';

                    })
                    ->rawColumns(['action','image_ar','image_fr', 'responsive', 'created_at'])
                    ->make(true);
            case 'categories':
                $data = VendorCategory::query()
                    ->with('category')
                    ->where('vendor_id', $vendor->id)
                    ->orderByDesc('created_at');
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'VendorsUi::actions.btn-categories')
                    ->addColumn('responsive', function ($param) {
                        return '';
                    })
                    ->addColumn('created_at', function ($param) {

                        return $param->created_at;

                    })
                    ->addColumn('is_active', function ($user) {

                        if ($user->is_active) return '<span class="badge badge-success">Oui</span>';
                        return '<span class="badge badge-danger">Non</span>';

                    })
                    ->rawColumns(['action','is_active','responsive', 'created_at'])
                    ->make(true);

            case 'brands':
                $data = VendorBrand::query()
                    ->with('brand')
                    ->where('vendor_id', $vendor->id)
                    ->orderByDesc('created_at');
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', 'VendorsUi::actions.btn-brands')
                    ->addColumn('responsive', function ($param) {
                        return '';
                    })
                    ->addColumn('created_at', function ($param) {

                        return $param->created_at;

                    })
                    ->addColumn('image', function ($param) {
                        if (!$param->brand->image) return  '<span class="badge badge-danger">Aucune</span>';

                        return '<a href="' . asset($param->brand->image) . '" target="_blank">  <img src="' . asset($param->brand->image) . '" alt="" class="img img-fluid image-hold" height="100"  width="100"  /></a>';


                    })
                    ->addColumn('is_active', function ($user) {

                        if ($user->is_active) return '<span class="badge badge-success">Oui</span>';
                        return '<span class="badge badge-danger">Non</span>';

                    })
                    ->rawColumns(['action','is_active','image','responsive', 'created_at'])
                    ->make(true);


            case 'products':
                $data = Product::query()
                    ->with('vendor')
                    ->where('vendor_id', $vendor->id)
                    ->orderByDesc('created_at');
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action','VendorsUi::actions.btn-products')
                ->addColumn('responsive', function ($product) { return '';})
                /*  ->addColumn('images','ProductsUi::actions.images') */
                ->addColumn('price_old', function ($product) {

                    return '<span class="badge badge-warning shadow-sm">'.number_format($product->price_old ,2 ,".",",").' DA</span> ';

                })

                ->addColumn('price', function ($product) {

                    return '<span class="badge badge-primary shadow-sm">'.number_format($product->price ,2 ,".",",").' DA</span> ';

                })
                    ->addColumn('vendor', function ($product) {

                    return '<span class="badge badge-primary shadow-sm">'.$product->vendor->name_fr.'</span> ';

                })
                    ->addColumn('shipping', function ($product) {

                        return '<span class="badge badge-primary shadow-sm">'.number_format($product->shipping ,2 ,".",",").' DA</span> ';

                    })
                ->addColumn('is_active', function ($product) {

                    if($product->is_active ){
                        return '<span class="badge badge-success shadow-sm">Oui</span> ';
                    }else{
                        return '<span class="badge badge-danger shadow-sm">Non</span> ';
                    }



                })

                ->addColumn('created_at', function ($product) {

                    return $product->created_at;

                })
                    ->rawColumns(['action',/* 'images', */'price_old','shipping','vendor','price','is_active','responsive','created_at'])
                    ->make(true);

            case 'raw_orders':
                $data =  RawOrder::query()->where('vendor_id',$vendor->id)->orderby('created_at', 'desc');
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','VendorsUi::actions.btn-raw')
                    ->addColumn('responsive', function ($order) { return '';})
                    ->addColumn('created_at', function ($order) {

                        return $order->created_at;

                    })
                    ->addColumn('name', function ($order) {

                        return '<span class="badge badge-primary shadow-sm">'.$order->full_name.'</span> ';

                    })
                    ->addColumn('total', function ($order) {

                        return '<span class="badge badge-primary shadow-sm">' . number_format($order->total, 2, ".", ",") . ' DA</span> ';

                    })
                    ->addColumn('tracking_code', function ($order) {

                        return '<span class="badge badge-primary shadow-sm">'.$order->tracking_code.'</span> ';

                    })
                    ->addColumn('phone', function ($order) {

                        return '<span class="badge badge-primary shadow-sm">'.'0'.$order->phone.'</span> ';

                    })
                    ->addColumn('status', function ($order) {

                        switch($order->status){
                            case('pending'):
                                return '<span class="badge badge-warning shadow-sm"> en attente</span> ';
                                break;
                            case('confirmed'):
                                return '<span class="badge badge-success shadow-sm">confirmé</span> ';
                                break;
                            case('canceled'):
                                return '<span class="badge badge-danger shadow-sm">annulé</span> ';
                                break;
                            case('completed'):
                                return '<span class="badge badge-primary shadow-sm">terminé</span> ';
                                break;
                        }

                    })
                    ->rawColumns(['action','tracking_code','name','total','phone','responsive','updated_at','created_at','status'])
                    ->make(true);

                case 'orders':
                    $data =  Order::query()->where('vendor_id',$vendor->id)->with(['clientRelation','address.commune.wilaya'])->orderby('created_at', 'desc');

                    return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action','VendorsUi::actions.btn-orders')
                        ->addColumn('responsive', function ($order) { return '';})
                        ->addColumn('created_at', function ($order) {

                            return $order->created_at;

                        })
                        ->addColumn('updated_at', function ($order) {

                            return $order->updated_at;

                        })
                        ->addColumn('total', function ($order) {

                            return '<span class="badge badge-primary shadow-sm">' . number_format($order->total, 2, ".", ",") . ' DA</span> ';

                        })
                        ->addColumn('updated_by', function ($order) {

                            if($order->user){
                                return '<span class="badge badge-success shadow-sm">'.$order->user->name.'</span> ';
                            }else{
                                return '<span class="badge badge-primary shadow-sm">Aucune</span> ';
                            }


                        })
                        ->addColumn('tracking_code', function ($order) {

                            return '<span class="badge badge-primary shadow-sm">'.$order->tracking_code.'</span> ';

                        })
                        ->addColumn('name', function ($order) {

                            return '<span class="badge badge-primary shadow-sm">'.$order->clientRelation->last_name.' '.$order->clientRelation->first_name.'</span> ';

                        })
                        ->addColumn('phone', function ($order) {

                            return '<span class="badge badge-primary shadow-sm">0'.$order->clientRelation->phone.'</span> ';

                        })
                        ->addColumn('status', function ($order) {

                            switch($order->status){
                                case('pending'):
                                    return '<span class="badge badge-warning shadow-sm"> en attente</span> ';
                                    break;
                                case('confirmed'):
                                    return '<span class="badge badge-success shadow-sm">confirmé</span> ';
                                    break;
                                case('canceled'):
                                    return '<span class="badge badge-danger shadow-sm">annulé</span> ';
                                    break;
                                case('completed'):
                                    return '<span class="badge badge-primary shadow-sm">terminé</span> ';
                                    break;
                            }

                        })
                        ->rawColumns(['action','tracking_code','total','name','phone','responsive','updated_at','created_at','updated_by','status'])
                        ->make(true);
        }
    }

    public function authorize()
    {
        return auth()->user()->can('view_vendor');
    }

}
