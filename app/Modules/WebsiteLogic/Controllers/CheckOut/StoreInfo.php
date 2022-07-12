<?php

namespace App\Modules\WebsiteLogic\Controllers\CheckOut;

use App\Models\RawOrder;
use App\Models\RawOrderProduct;
use App\Modules\ClientsLogic\Models\ClientAddress;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\OrdersLogic\Models\Order_product;
use App\Modules\ProductsLogic\Models\Product;
use App\Rules\PhoneNumber;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class StoreInfo
{
    use AsAction;


    public function asController(ActionRequest $request)
    {
       $orders=Cart::content()->groupBy('options.vendor_id');

        if ($request->phone == 0) {
            Session::flash('error', 'Le format du champ téléphone est incorrect');
            return redirect()->back()->withInput();
        }


        DB::beginTransaction();

        try {
            $code = 'VIA-'.strtoupper(Str::random(8));
            while (Order::query()->where('tracking_code', $code)->exists()|| RawOrder::query()->where('tracking_code', $code)->exists()){
                $code = 'VIA-'.strtoupper(Str::random(8));
            }

            foreach ($orders as $order){
                $sub_total = 0;
                foreach ($order as $item) {
                    $sub_total = $sub_total + ($item->qty * $item->price);
                }

                $vendor_id=$order->first()->options->vendor_id;
                $items=$order;
                if (auth()->guard('client')->check()) {
                  $order=  $this->handleAuth($request, $sub_total,$vendor_id,$items);
                } else {
                    $order=  $this->handleUnAuth($request, $sub_total,$vendor_id,$items);
                }

                $order->update([
                    'tracking_code'=>$code
                ]);
            }

            Cart::destroy($request->phone);
            Cart::destroy();
            Cart::store($request->phone);

            Session::flash('message', app()->getLocale() == 'ar' ? 'مسجلة بنجاح' : 'Checkout avec succés');
            DB::commit();
//            if (auth()->guard('client')->check()) {
//                Session::put(['profile_tab' => 'commandes-tab']);
//                return redirect()->route('client.account',['#step3']);
//            }

            return redirect()->route('checkout.overview',$code);

        } catch (Throwable $exception) {
            Log::error($exception, ['place' => 'checkout']);
            DB::rollBack();
            Session::flash('error', app()->getLocale() == 'ar' ? 'هناك خطأ ما' : 'quelque chose s\'est mal passé');
            return redirect()->back()->withInput();
        }


    }

    public function handleAuth($request, $sub_total,$vendor_id,$items)
    {

        $client=auth()->guard('client')->user();
        $address=ClientAddress::query()->with('commune.wilaya')->findOrFail($request->address_id);

        $raw = RawOrder::query()->create([
            'full_name' => $client->last_name.' '.$client->first_name,
            'phone' => $client->phone,
            'wilaya' => $address->commune->wilaya->name,
            'mode_payment'=>'COD',
            'commune' => $address->commune->name,
            'sub_total' => $sub_total,
            'total' => $sub_total,
            'address' => $address->address,
            'vendor_id'=>$vendor_id
        ]);

        foreach ($items as $item) {
            $product = Product::query()->findOrFail($item->id);

            RawOrderProduct::query()->create([
                'price' => $product->price,
                'qty' => $item->qty,
                'raw_order_id' => $raw->id,
                'product_id' => $product->id,
            ]);
        }



        return $raw;

    }

    private function handleUnAuth($request, $sub_total,$vendor_id,$items)
    {

//        create raw_orders
        $raw = RawOrder::query()->create(['full_name' => $request->full_name,
            'phone' => $request->phone,
            'wilaya' => $request->wilaya,
            'mode_payment'=>'COD',
            'commune' => $request->commune,
            'sub_total' => $sub_total,
            'total' => $sub_total,
            'address' => $request->address,
            'vendor_id'=>$vendor_id
        ]);

        foreach ($items as $item) {
            $product = Product::query()->findOrFail($item->id);

            RawOrderProduct::query()->create([
                'price' => $product->price,
                'qty' => $item->qty,
                'raw_order_id' => $raw->id,
                'product_id' => $product->id,
            ]);
        }

        return $raw;

    }

    public function prepareForValidation(ActionRequest $request): void
    {
        if (auth()->guard('client')->check()){
            $request->merge(['phone' => $this->getPhoneNumberClean(auth()->guard('client')->user()->phone)]);

        }else{
            $request->merge(['phone' => $this->getPhoneNumberClean($request->phone)]);

        }
    }

    private function getPhoneNumberClean($phone)
    {
        if (Str::startsWith($phone, '00213') && strlen($phone) === 14) return explode('00213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0213') && strlen($phone) === 13) return explode('0213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '+213') && strlen($phone) === 13) return explode('+213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '213') && strlen($phone) === 12) return explode('213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0') && strlen($phone) === 10) return explode('0', $phone, 2)[1];
        elseif ((Str::startsWith($phone, '6') || Str::startsWith($phone, '5') || Str::startsWith($phone, '7')) && strlen($phone) === 9) return $phone;
        else return 0;
    }


    public function rules(): array
    {
        if (auth()->guard('client')->check()) {
            $rules = ['address_id' => ['required', 'exists:client_addresses,id'],];
        } else {
            $rules = [
                'full_name' => ['required', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:190'],
                'phone' => ['required', new PhoneNumber],
                'wilaya' => ['nullable','sometimes','string', 'max:190'],
                'commune' => ['nullable','sometimes','string', 'max:190'],
                'address' => ['nullable','sometimes','string', 'max:190']
            ];
        }

        return $rules;
    }

    public function getValidationAttributes(): array
    {
        return [
            'address' => Session::get('client_lang')?'العنوان':'adresse',
            'full_name' => Session::get('client_lang')?'الاسم الكامل':'nom et prénom',
            'coupon' => Session::get('client_lang')?'القسيمة':'coupon',
            'phone' => Session::get('client_lang')?'رقم الهاتف':'téléphone',
            'wilaya' => Session::get('client_lang')?'الولاية':'wilaya',
            'commune' => Session::get('client_lang')?'البلدية':'commune',
        ];
    }

}
