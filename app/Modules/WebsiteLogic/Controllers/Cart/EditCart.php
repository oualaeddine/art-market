<?php

namespace App\Modules\WebsiteLogic\Controllers\Cart;

use App\Modules\ProductsLogic\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class EditCart
{
    use AsAction;


    public function handle(ActionRequest $request, Product $product)
    {
        $item = Cart::content()->where('id', $product->id)->first();

        $row_id = $item->rowId ?? null;

        if ($row_id == null) {
            return false;
        } else {
            Cart::update($row_id ,['qty' => $request->qty ]);
            return true;
        }


    }

    public function asController(ActionRequest $request,Product $product)
    {
        try{
            $this->handle($request,$product);

            if (auth()->guard('client')->check()) {
                $phone = auth()->guard('client')->user()->phone;
                Cart::store($phone);
            }
        }catch(Throwable $e){

            return Response::json([
                'success' => false,
                'message' => 'Quelque chose a mal tourné, veuillez patienter et réessayer',

           ]);
        }

        Session::flash(Session::get('client_lang')?'تم تعديل المنتج بنجاح':'le produit a été modifié avec succès');

        return Response::json([
             'success' => true,
             'message' => Session::get('client_lang')?'تم تعديل المنتج بنجاح':'le produit a été modifié avec succès',
        ]);
    }

}
