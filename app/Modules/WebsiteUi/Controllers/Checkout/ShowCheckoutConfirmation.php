<?php

namespace App\Modules\WebsiteUi\Controllers\Checkout;

use App\Modules\ClientsLogic\Models\ClientAddress;
use App\Rules\PhoneNumber;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowCheckoutConfirmation
{

    use AsAction;

    public function asController(ActionRequest $request)
    {

        if (!$this->checkCart()) return redirect()->route('shop');

        $client = Auth::guard('client')->user();

        if ($client) {
            $info = $this->getLoggedInClientInfo($request, $client);
        } else {
            $info = $this->getNonLoggedInClientInfo($request);

        }

        $cart=Cart::content();
        $shipping = number_format($cart->sum(function ($item) {return $item->qty * $item->options->shipping;}), 2);
        $sub_total=$cart->sum(function ($item) {return $item->qty * $item->price;});
        $total = number_format(($shipping+$sub_total), 2);


        return view('WebsiteUi::checkout-confirmation', compact('info', 'client','shipping','total'))->with(['page_title' => trans('Checkout confirmation')]);
    }

    private function checkCart(): bool
    {
        return Cart::count() != 0;
    }

    private function getLoggedInClientInfo($request, $client): array
    {
        $selected_address = ClientAddress::query()->find($request->address);
        Session::put('logged_client_info',[
            'address_id' => $selected_address->id,
        ]);
        return [
            'address_id' => $selected_address->id,
            'address' => $selected_address->address,
            'wilaya' => $selected_address->commune->wilaya->{app()->getLocale() == 'fr' ? 'name' : 'name_ar'},
            'commune' => $selected_address->commune->{app()->getLocale() == 'fr' ? 'name' : 'name_ar'},
            'phone' => '0' . $selected_address->client->phone,
            'full_name' => $client->last_name . ' ' . $client->first_name,
        ];


    }

    private function getNonLoggedInClientInfo($request): array
    {

        Session::put('non_logged_client_info',[
            'address' => $request->address,
            'wilaya' => $request->wilaya,
            'commune' => $request->commune,
            'phone' => $request->phone,
            'full_name' => $request->last_name . ' ' . $request->first_name,
        ]);
        return [
            'address' => $request->address,
            'wilaya' => $request->wilaya,
            'commune' => $request->commune,
            'phone' => $request->phone,
            'full_name' => $request->last_name . ' ' . $request->first_name,
        ];
    }

    public function rules(): array
    {
        if (auth()->guard('client')->check()) {
            $rules = ['address' => ['required', 'exists:client_addresses,id'],];
        } else {
            $rules = [
                'last_name' => ['required', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:190'],
                'first_name' => ['required', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:190'],
                'phone' => ['required', new PhoneNumber],
                'wilaya' => ['required', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:190'],
                'commune' => ['required', 'regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:190'],
                'address' => ['required', 'string', 'max:190']
            ];
        }

        return $rules;
    }

    public function getValidationAttributes(): array
    {
        return [
            'last_name' => trans('Last name'),
            'first_name' => trans('First name'),
            'phone' => trans('Phone'),
            'wilaya' => trans('Wilaya'),
            'commune' => trans('Commune'),
            'address' => trans('Address'),
        ];
    }

}
