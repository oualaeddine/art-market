<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\orders\raw;



use App\Models\ProductCoupon;

use App\Modules\Extra\GenerateHeader;
use App\Modules\OrdersLogic\Models\OrderCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class GetProducts
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {

        $communs = DB::table('products')
            ->when($request->filled('vendor_id'),function ($query) use ($request){
                $query  ->where('vendor_id',$request->vendor_id)
                    ->where('is_active',1)
                ;
            })
            ->when(isset($request->q), function ($query) use ($request) {
                $query->where(function ($query) use ($request){
                    $query->where('products.name_ar', 'like', "%" . (trim($request->q)) . "%")
                        ->orWhere('products.name_fr', 'like', "%" . (trim($request->q)) . "%")
                        ->orWhere('products.ref', 'like', "%" . (trim($request->q)) . "%")
                        ->orWhere('products.slug', 'like', "%" . (trim($request->q)) . "%")
                    ;
                });

            })
            ->select('products.id as id',
                'products.name_ar as name_ar',
                'products.name_fr as name_fr',
                'products.ref as ref',
                'products.price as price'
            )
            ->get()->map(function ($product) {
                return [
                    'id' => $product->id,
                    'text' =>'Nom : '.$product->name_fr.' | Ref : '.$product->ref.' | Prix : '.$product->price .' DA',

                ];
            });

        return response()->json($communs);


    }



}
