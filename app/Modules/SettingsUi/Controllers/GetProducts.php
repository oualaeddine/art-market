<?php

namespace App\Modules\SettingsUi\Controllers;


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

        $communs = DB::table('products')
            ->when(isset($request->q), function ($query) use ($request) {
                $query->where('products.name_ar', 'like', "%" . (trim($request->q)) . "%")
                    ->orWhere('products.name_fr', 'like', "%" . (trim($request->q)) . "%")
                    ->orWhere('products.ref', 'like', "%" . (trim($request->q)) . "%")
                    ->orWhere('products.slug', 'like', "%" . (trim($request->q)) . "%")
                ;
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
