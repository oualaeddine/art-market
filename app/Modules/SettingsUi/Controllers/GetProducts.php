<?php

namespace App\Modules\SettingsUi\Controllers;


use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class GetProducts
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {

        $communs = Product::query()
            ->whereIsActive(true)
            ->whereDoesntHave('home_offer')
            ->when(isset($request->q), function ($query) use ($request) {
                $query->where('products.name_ar', 'like', "%" . (trim($request->q)) . "%")
                    ->orWhere('products.name_fr', 'like', "%" . (trim($request->q)) . "%")
                    ->orWhere('products.ref', 'like', "%" . (trim($request->q)) . "%")
                    ->orWhere('products.slug', 'like', "%" . (trim($request->q)) . "%")
                ;
            })
            ->get()->map(function ($product) {
                return [
                    'id' => $product->id,
                    'text' =>'Nom : '.$product->name_fr.' | Ref : '.$product->ref.' | Prix : '.$product->price .' DA',

                ];
            });

        return response()->json($communs);


    }



}
