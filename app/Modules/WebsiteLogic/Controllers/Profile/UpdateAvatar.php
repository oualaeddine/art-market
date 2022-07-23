<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Traits\UploadImageTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateAvatar
{
    use AsAction,UploadImageTrait;

    public function rules(): array
    {

        return [
            'avatar' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ];
    }

    public function asController(ActionRequest $request)
    {

        $client = auth()->guard('client')->user();
        $this->handle($request, $client);

        Toastr::success(trans('Avatar Updated successfully'),'', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('client.account', '#step2');
    }

    public function handle(ActionRequest $request, $client)
    {
        $client->update(['avatar'=>'storage/avatars/'.$this->storeAndOptimizeImage($request,'avatar','avatars')]);
    }


}
