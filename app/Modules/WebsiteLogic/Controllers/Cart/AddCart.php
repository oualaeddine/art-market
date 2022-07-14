<?php

namespace App\Modules\WebsiteLogic\Controllers\Cart;

use App\Modules\ProductsLogic\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class AddCart
{
    use AsAction;


    public static function handle(ActionRequest $request, Product $product)
    {
        $qty = $request->qty??1;

        $item = Cart::content()->where('id', $product->id)->first();

        $row_id = $item->rowId ?? null;

        if ($row_id == null) {

            Cart::add([
                [
                    'id' => $product->id, 'name' => $product->name_fr, 'qty' => $qty, 'price' => $product->price, "tax" => 0,
                    'options' => [
                        'vendor_id'=>$product->vendor_id,
                        'name_ar'=>$product->name_ar,
                        'discount' => $product->discount,
                        'slug' => $product->slug,
                        'vendor_name_ar' => $product->vendor->name_ar,
                        'vendor_name_fr' => $product->vendor->name_fr,
                        'image' => $product->image,
                        'price_old' => $product->price_old,
                        'created_at'=>now()
                       /*  'sub_total' => $product->price_old * $qty, */
                    ]
                ],
            ]);


        } else {


            $new_qty =  $item->qty + $qty;

            Cart::update($row_id ,['qty' => $new_qty]);

        }

    }

    public function asController(ActionRequest $request,Product $product)
    {
        try{

            $this->handle($request,$product);

            if (auth()->guard('client')->check()){
                Cart::store(auth()->guard('client')->user()->phone);
            }

            return Response::json([
                'success' => true,
                'message' => Session::get('client_lang')?'تمت إضافة المنتج بنجاح إلى سلة التسوق الخاصة بك':'le produit a été ajouté à votre panier avec succès',
                'data' => ['count' => Cart::count()]
           ]);

        }catch(Throwable $e){

            return Response::json([
                'success' => false,
                'message' => Session::get('client_lang')?'حدث خطأ ما ، يرجى الانتظار والمحاولة مرة أخرى':'Quelque chose a mal tourné, veuillez patienter et réessayer',

           ]);
        }


    }

}
