<?php

namespace App\Modules\WebsiteLogic\Controllers\Cart;

use App\Modules\ProductsLogic\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class DeleteItemCart
{
    use AsAction;


    public function handle(ActionRequest $request, Product $product)
    {
        $item = Cart::content()->where('id', $product->id)->first();

        $row_id = $item->rowId ?? null;

        if ($row_id == null) {
            return false;
        } else {
            Cart::remove($row_id);
            if (auth()->guard('client')->check()) {
                $phone = auth()->guard('client')->user()->phone;
                Cart::store($phone);
            }
            return true;
        }
    }


    public function asController(ActionRequest $request,Product $product)
    {
        try{
            $this->handle($request,$product);
        }catch(Throwable $e){

            return Response::json([
                'success' => false,
                'count'=>Cart::count(),
                'message' => trans('Something went wrong'),

           ]);
        }

        Session::flash(trans('Product deleted successfully'));


        return Response::json([
             'success' => true,
             'count'=>Cart::count(),
             'message' => trans('Product deleted successfully'),
        ]);
    }
}
