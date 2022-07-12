<?php

namespace App\Modules\ClientsLogic\Controllers\Special;

use App\Models\YalidineWilaya;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\ClientsLogic\Models\ClientPhone;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateClientSpecialPhoto
{
    use AsAction,UploadImageTrait;


    public function handle(ActionRequest $request, Client $client)
    {

            if($request->hasFile('avatar')) $client->update([
                'avatar'=>'storage/clients/avatars/'.$this->storeAndOptimizeImage($request,'avatar','clients/avatars')

            ]);

    }



    public function rules(): array
    {
        return [

            'avatar' => ['required','file','max:2048','mimes:png,jpg,jpeg'],
        ];
    }

    public function getValidationAttributes(): array
    {
        return [

            'avatar' => 'avatar',
        ];
    }

    public function asController(ActionRequest $request, Client $client)
    {


        $this->handle($request,$client);


        Session::flash('message','Client mis à jour avec succés');

        return redirect()->back();
    }

//    public function authorize()
//    {
//        return auth()->user()->can('view_detail_client');
//    }


}
