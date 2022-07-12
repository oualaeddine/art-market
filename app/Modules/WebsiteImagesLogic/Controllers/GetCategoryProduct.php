<?php

namespace App\Modules\WebsiteImagesLogic\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCategoryProduct
{
    use AsAction;

    public function handle()
    {
        // ...
    }

//    public function authorize()
//    {
//        return \auth()->user()->can('create_client');
//    }

    public function asController(Request $request, $id)
    {
        if ($id == 'product') {

            $communs = DB::table('products')->when(isset($request->q), function ($query) use ($request) {
                    $query->where('products.slug', 'like', "%" . (trim($request->q)) . "%");

                })->select('products.slug as id', 'products.slug as name')->get()->map(function ($commun) {
                    return ['id' => $commun->id, 'text' => '- ' . $commun->name,

                    ];
                });

        } else {

            $communs = DB::table('categories')->when(isset($request->q), function ($query) use ($request) {
                    $query->where('categories.name_fr', 'like', "%" . (trim($request->q)) . "%");

                })->select('categories.name_fr as id', 'categories.name_fr as name')->get()->map(function ($commun) {
                    return ['id' => $commun->id, 'text' => '- ' . $commun->name,

                    ];
                });

        }


        return response()->json($communs);

    }


}
