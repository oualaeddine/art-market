<?php

namespace App\Modules\WebsiteLogic\Controllers\Help;

use App\Modules\ClientsLogic\Models\Contact;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SavePhone
{
    use AsAction;

    public function prepareForValidation(ActionRequest $request): void
    {
        $request->merge(['phone' => $this->getPhoneNumberClean($request->phone),'message'=>$request->message??'Need Help!']);

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

    public function asController(ActionRequest $request)
    {
        if ($request->phone == 0) {
            Session::flash('error', Session::get('client_lang') ? 'حقل الهاتف غير صحيح':'Le format du champ téléphone est incorrect');
            return redirect()->back()->withInput();
        }

        if ($request->ajax()) {
            return $this->handle($request);
        } else {
            $this->handle($request);
            Session::flash('message', Session::get('client_lang') ? 'شكرا لك سوف نتصل بك قريبا' : "Merci, nous vous contacterons bientôt");
            return redirect()->back()->withInput();

        }

    }

    public function rules()
    {
        return [
            'phone'=>['required',new PhoneNumber()]
        ];
    }
    public function handle(ActionRequest $request)
    {
        Contact::create($request->all());
    }
}
