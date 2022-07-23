<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdatePassword
{
    use AsAction;


    public function handle(ActionRequest $request, $client)
    {
        $client->update(['password' => Hash::make($request->password)]);
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'current_password:client'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password'],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'password' => trans('New password'),
            'current_password' => trans('Current password')
        ];
    }

    public function getValidationMessages(): array
    {
        return [
            'current_password' => trans('Current password is wrong')
        ];
    }

    public function asController(ActionRequest $request)
    {
        $client = auth()->guard('client')->user();
        $this->handle($request, $client);
        Toastr::success(trans('Password Updated successfully'), '', ["positionClass" => "toast-bottom-right"]);


        return redirect()->back()->with(['tab' => 'password']);

    }


}
