<?php

namespace App\Modules\ClientsLogic\Controllers\Client;

use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientPhone;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateClientDetail
{
    use AsAction,UploadImageTrait;


    public function handle(ActionRequest $request, Client $client)
    {

        $client->update($this->getClientFields($request));
    }

    private function getClientFields($request): array
    {
        return $request->only(['first_name', 'last_name', 'commune_id', 'wilaya','phone']);
    }

    public function prepareForValidation(ActionRequest $request): void
    {
        $request->merge(['phone' => $this->getPhoneNumberClean($request->phone)]);
    }

    private function getPhoneNumberClean($phone)
    {
        if (Str::startsWith($phone, '00213') && strlen($phone) ===14) return explode('00213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0213') && strlen($phone) ===13) return explode('0213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '+213') && strlen($phone) ===13) return explode('+213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '213') && strlen($phone) ===12) return explode('213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0') && strlen($phone) ===10) return explode('0', $phone, 2)[1];
        elseif ((Str::startsWith($phone, '6') || Str::startsWith($phone, '5') || Str::startsWith($phone, '7')) && strlen($phone) ===9) return $phone;
        else return 0;
    }


    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string','regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:45'],
            'last_name' => ['required', 'string','regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:45'],
            'commune_id' => ['required'],
            'wilaya_id' => ['required'],
            'phone' => ['required',new PhoneNumber,'numeric'],
           /*  'note' => ['nullable','string', 'max:191'], */
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'first_name' => 'nom',
            'last_name' => 'prènom',
            'commune_id' => 'commune',
            'wilaya_id' => 'wilaya',
            'phone' => 'tèlèlphone',
           /*  'note' => 'observation', */
        ];
    }

    public function asController(ActionRequest $request, Client $client)
    {
        if ($request->phone==0){
            Session::flash('error','Le format du champ téléphone est incorrect');
            return redirect()->back()->withInput();
        }

        $request->request->add(['wilaya' => YalidineWilaya::find($request->wilaya_id)->name]);

        $this->handle($request,$client);


        Session::flash('message','Client mis à jour avec succés');

        return redirect()->route('admin.clients.details',base64_encode($client->id) );
    }


}
