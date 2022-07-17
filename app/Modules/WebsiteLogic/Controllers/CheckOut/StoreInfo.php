<?php

namespace App\Modules\WebsiteLogic\Controllers\CheckOut;

use App\Helpers\GetCleanPhoneNumber;
use App\Models\RawOrder;
use App\Models\RawOrderProduct;
use App\Modules\ClientsLogic\Models\ClientAddress;
use App\Modules\OrdersLogic\Models\Order;
use App\Modules\ProductsLogic\Models\Product;
use App\Rules\PhoneNumber;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class StoreInfo
{
    use AsAction;


    public function asController(ActionRequest $request)
    {
        $orders = Cart::content()->groupBy('options.vendor_id');

        if ($request->phone == 0) {
            Toastr::error(trans('The phone number is invalid'), '', ["positionClass" => "toast-bottom-right"]);
            return redirect()->back()->withInput();
        }


        DB::beginTransaction();

        try {
            $code = 'ART-' . strtoupper(Str::random(8));
            while (Order::query()->where('tracking_code', $code)->exists() || RawOrder::query()->where('tracking_code', $code)->exists()) {
                $code = 'ART-' . strtoupper(Str::random(8));
            }

            foreach ($orders as $order) {
                $sub_total = 0;
                foreach ($order as $item) {
                    $sub_total = $sub_total + ($item->qty * $item->price);
                }

                $vendor_id = $order->first()->options->vendor_id;
                $items = $order;
                if (auth()->guard('client')->check()) {
                    $order = $this->handleAuth($request, $sub_total, $vendor_id, $items);
                } else {
                    $order = $this->handleUnAuth($request, $sub_total, $vendor_id, $items);
                }

                $order->update([
                    'tracking_code' => $code
                ]);
            }

            Cart::destroy($request->phone);
            Cart::destroy();
            Cart::store($request->phone);

            Toastr::success(trans('Checkout successful'), '', ["positionClass" => "toast-bottom-right"]);
            DB::commit();

            Session::forget('non_logged_client_info');

            return redirect()->route('checkout.complete', $code);

        } catch (Throwable $exception) {
            DB::rollBack();
            Toastr::error(trans('Something went wrong'), '', ["positionClass" => "toast-bottom-right"]);
            return redirect()->back()->withInput();
        }


    }

    public function handleAuth($request, $sub_total, $vendor_id, $items)
    {

        $client = auth()->guard('client')->user();
        $address = ClientAddress::query()->with('commune.wilaya')->findOrFail($request->address_id);

        $raw = RawOrder::query()->create([
            'full_name' => $client->last_name . ' ' . $client->first_name,
            'phone' => $client->phone,
            'wilaya' => $address->commune->wilaya->name,
            'mode_payment' => 'COD',
            'commune' => $address->commune->name,
            'sub_total' => $sub_total,
            'total' => $sub_total,
            'address' => $address->address,
            'vendor_id' => $vendor_id
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

    private function handleUnAuth($request, $sub_total, $vendor_id, $items)
    {

//        create raw_orders
        $raw = RawOrder::query()->create(['full_name' => $request->full_name,
            'phone' => $request->phone,
            'wilaya' => $request->wilaya,
            'mode_payment' => 'COD',
            'commune' => $request->commune,
            'sub_total' => $sub_total,
            'total' => $sub_total,
            'address' => $request->address,
            'vendor_id' => $vendor_id
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

        if (auth()->guard('client')->check()) {
            $request->merge(['address_id'=>Session::get('logged_client_info')['address_id'],'phone' => GetCleanPhoneNumber::getPhone(auth()->guard('client')->user()->phone)]);

        } else {
            $request->merge([
                'full_name' => Session::get('non_logged_client_info')['full_name'],
                'phone' => GetCleanPhoneNumber::getPhone(Session::get('non_logged_client_info')['phone']),
                'wilaya' => Session::get('non_logged_client_info')['wilaya'],
                'commune' => Session::get('non_logged_client_info')['commune'],
                'address' => Session::get('non_logged_client_info')['address'],
            ]);


        }
    }

    public function rules(): array
    {
        if (auth()->guard('client')->check()) {
            $rules = ['address_id' => ['required', 'exists:client_addresses,id'],];
        } else {
            $rules = [
                'full_name' => ['required', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:190'],
                'phone' => ['required', new PhoneNumber],
                'wilaya' => ['required', 'sometimes', 'string', 'max:190'],
                'commune' => ['required', 'sometimes', 'string', 'max:190'],
                'address' => ['required', 'sometimes', 'string', 'max:190']
            ];
        }

        return $rules;
    }

    public function getValidationAttributes(): array
    {
        return [
            'address' => trans('Address'),
            'full_name' => trans('Full name'),
            'phone' => trans('Phone'),
            'wilaya' => trans('Wilaya'),
            'commune' => trans('Commune'),
        ];
    }

}
