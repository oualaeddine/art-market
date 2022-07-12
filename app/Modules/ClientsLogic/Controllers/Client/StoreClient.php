<?php

namespace App\Modules\ClientsLogic\Controllers\Client;

use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Controllers\ClientAddress\StoreArrayClientAddress;
use App\Modules\ClientsLogic\Controllers\ClientContactInfo\StoreArrayContactInfo;
use App\Modules\ClientsLogic\Controllers\ClientPhones\StoreClientPhone;
use App\Modules\ClientsLogic\Controllers\ClientPieces\StoreArrayClientPieces;
use App\Modules\ClientsLogic\Controllers\ClientProfile\StoreArrayClientProfile;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\Client_wallet;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreClient
{
    use AsAction, UploadImageTrait;


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
            'first_name' => ['required', 'string','regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu' ,'max:45'],
            'last_name' => ['required', 'string','regex:/^(?!.*\d)[a-z\p{Arabic}\s]+$/iu', 'max:45'],
            'commune_id' => ['required'],
            'email' => ['required','email','unique:clients,email'],
            'password'=>['required','confirmed'],
            'wilaya_id' => ['required'],
            'avatar' => ['sometimes', 'file', 'mimes:png,jpg,jpeg'],
            'phone' => ['required','unique:clients,phone',new PhoneNumber],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'first_name' => 'prènom',
            'last_name' => 'nom',
            'commune_id' => 'commune',
            'wilaya_id' => 'wilaya',
            'avatar' => 'photo de profil',
            'phone'=>'Téléphone',
            'email'=>'Email',
            'password'=>'mot de pass',
            'password_confirmation'=>'confirmation mot de pass',
        ];
    }

    public function asController(ActionRequest $request)
    {
        if ($request->phone==0){
            Session::flash('error','Le format du champ téléphone est incorrect');
            return redirect()->back()->withInput();
        }


        $request->request->add(['wilaya' => YalidineWilaya::find($request->wilaya_id)->name]);

        DB::beginTransaction();


        $client = $this->handle($request);


        $client_wallet = Client_wallet::create(['amount' => 0 , 'client_id' => $client->id]);

//        if ($request->address_store != null) {
//            $client_address = StoreArrayClientAddress::run($request, $client);
//
//            if ($client_address['success'] == false) {
//
//                DB::rollBack();
//
//                return redirect('cod-dash/clients/creer')->withErrors($client_address['data'])->withInput();
//            }
//        }


        DB::commit();

        Session::flash('message', 'Client ajouté avec succès');

        return redirect()->route('admin.clients.special',$client->id);
    }

    public function handle(ActionRequest $request)
    {

        $client = Client::create($this->getClientFields($request)+['password'=>Hash::make($request->password)]);
//        if ($request->hasFile('avatar')) $client->update([
//            'avatar' => 'storage/clients/avatars/' . $this->storeAndOptimizeImage($request, 'avatar', 'clients/avatars')
//
//        ]);

        return $client;

    }

    private function getClientFields($request): array
    {
        return $request->only(['first_name', 'last_name', 'commune_id', 'wilaya','phone','email']);
    }

//    public function authorize()
//    {
//        return auth()->user()->can('create_client');
//    }


}
