<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Modules\ClientsLogic\Models\Client;
use App\Rules\PhoneNumber;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdatePassword
{
    use AsAction;


    public function handle(ActionRequest $request, Client $client)
    {
        $client->update(['password' => Hash::make($request->password)]);
    }

    private function getClientFields($request): array
    {
        return $request->only(['old_password','password','current_password']);
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required','current_password:client'],
            'password' => ['required', 'string', 'min:8', 'confirmed','different:current_password'],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'password' => 'mot de passe',
            'current_password' => 'ancien mot de passe'
        ];
    }

    public function asController(ActionRequest $request, Client $client)
    {

        $this->handle($request,$client);

        Session::flash('message','Mot de pass mis à jour avec succés');

        return redirect()->route('client.account');

    }

    public function getValidationRedirect(UrlGenerator $url): string
    {
        return $url->to('account#step5');
    }

}
