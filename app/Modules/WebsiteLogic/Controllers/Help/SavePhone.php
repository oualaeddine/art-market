<?php

namespace App\Modules\WebsiteLogic\Controllers\Help;

use App\Helpers\GetCleanPhoneNumber;
use App\Modules\ClientsLogic\Models\Contact;
use App\Rules\PhoneNumber;
use Brian2694\Toastr\Facades\Toastr;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SavePhone
{
    use AsAction;

    public function prepareForValidation(ActionRequest $request): void
    {
        $request->merge(['phone' => GetCleanPhoneNumber::getPhone($request->phone)]);

    }


    public function asController(ActionRequest $request)
    {
        if ($request->phone == 0) {
            Toastr::error(trans('Wrong phone format'), '', ["positionClass" => "toast-bottom-right"]);
            return redirect()->back()->withInput();
        }

        if ($request->ajax())
            return $this->handle($request);

        $this->handle($request);
        Toastr::success(trans('Thank you we will be in touch'), '', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back()->withInput();


    }

    public function handle(ActionRequest $request)
    {
        return Contact::create($request->all() + ['message' => $request->message ?? 'Need Help!']);
    }

    public function rules()
    {
        return [
            'phone' => ['required', new PhoneNumber()]
        ];
    }
}
