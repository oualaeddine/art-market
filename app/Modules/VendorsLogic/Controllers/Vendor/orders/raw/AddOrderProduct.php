<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\orders\raw;



use App\Models\RawOrder;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class AddOrderProduct
{
    use AsAction;

    public function asController(ActionRequest $request,RawOrder $order)
    {
        DB::beginTransaction();
        try {
            $this->handle($request,$order);
            Session::flash('success', 'Produit ajouter avec succès');
            DB::commit();
        }catch (\Throwable$exception){
            DB::rollBack();
            Session::flash('error', 'quelque chose s\'est mal passé');
        }

        return redirect()->back();
    }

    public function handle($request,RawOrder $order): void
    {
        $product=Product::query()->findOrFail($request->product_id);
        $order->increment('sub_total',($product->price*$request->qty));
        $order->increment('total',($product->price*$request->qty));
        if ($p=$order->products()->where('product_id',$request->product_id)->first()){
            $p->increment('qty',$request->qty);

        }else{
            $order->products()->create([
                'price'=>$product->price,
                'qty'=>$request->qty??1,
                'raw_order_id'=>$order->id,
                'product_id'=>$product->id,
            ]);
        }

    }


    public function rules()
    {
        return[
          'product_id'=>['required','exists:products,id'],
          'qty'=>['required','min:1']
        ];
    }

}
