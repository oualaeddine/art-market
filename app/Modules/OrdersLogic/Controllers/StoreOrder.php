<?php

namespace App\Modules\OrdersLogic\Controllers;

use App\Models\RawOrder;
use App\Models\Vendor;
use App\Modules\ClientsLogic\Models\ClientAddress;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\OrdersLogic\Models\Order_product;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class StoreOrder
{
    use AsAction;

    public function asController(ActionRequest $request,Vendor $vendor)
    {
        DB::beginTransaction();

        try{

            $this->handle($request,$vendor);

        }catch(Throwable $e){

            DB::rollBack();

            Session::flash('error', "quelque chose s'est mal passé, vérifiez et réessayez ");

            return redirect()->route('admin.orders.create');
        }


        DB::commit();

        Session::flash('success', 'Command ajouté avec succès.');
        return redirect()->route('admin.orders.index');
    }

    public function handle(ActionRequest $request,$vendor): void
    {
        $address=ClientAddress::query()->firstOrCreate(['id'=>$request->address_id],[
            'address'=>$request->address,
            'commune_id'=>$request->commune_id,
            'client_id'=>$request->client_id
        ]);
        $code = 'VIA-'.strtoupper(Str::random(8));
        while (Order::query()->where('tracking_code', $code)->exists()|| RawOrder::query()->where('tracking_code', $code)->exists()){
            $code = 'VIA-'.strtoupper(Str::random(8));
        }
            $order = Order::create($this->getOrderFields($request)+[
                    'updated_by'=>auth()->id(),
                    'tracking_code'=>$code,
                    'address_id'=>$address->id,
                    'client'=>$request->client_id,
                    'vendor_id'=>$vendor->id
                ]);
            $order->mode_payment  = 'COD';
            $order->save();

            $products = $request->product;
           /*  $prices = $request->price; */
            $quantity = $request->quantity;
            $count = 0;

            $sub_total = 0;
            $total = 0;

            foreach($products as $product){

                $product = Product::findorfail($product);

                $sub_total = $sub_total + $product->price_old * $quantity[$count];
                $total = $total + $product->price * $quantity[$count];

               /*  $product = Product::findOrFail($c->id); */

                Order_product::create(['product_id' => $product->id , 'price' => $product->price , 'quantity' => $quantity[$count] ,'order_id' => $order->id ]);

                $count++;

            }

            $order->sub_total = $sub_total;
            $order->total = $total;
            $order->save();

    }

    private function getOrderFields($request): array
    {
        return $request->only([
            'client',
            'name',
            'phone',
            'wilaya_id',
            'commune_id',
            'address',
        ]);
    }

    public function rules(): array
    {
        return [
            'client_id' => ['required','exists:clients,id'],
            'name' => ['required','string','regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu','max:191'],
            'wilaya_id' => ['nullable'],
            'phone'=>['required','numeric'],
            'commune_id' => ['nullable'],
            'address_id' => ['nullable','sometimes','exists:client_addresses,id'],
            'address' => ['nullable','string','max:191'],

            'product' => ['required', 'array'],
            /*  'price' => ['required', 'array'], */
            'quantity' => ['required', 'array'],

            'product.*' => ['required','exists:products,id'],
            /*   'price.*' => ['required', 'numeric'], */
            'quantity.*' => ['required', 'numeric'],

        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'name' => 'nom',
            'phone' => 'Téléphone',
            'commune_id' => 'commune',
            'wilaya_id' =>  'wilaya',
            'address' => 'adresse',

            'product' => 'produit',
            'price' => 'prix',
            'quantity' => 'quantité',

            'product.*' => 'produit',
            'price.*' => 'prix',
            'quantity.*' => 'quantité',
        ];
    }


}
