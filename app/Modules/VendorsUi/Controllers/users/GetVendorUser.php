<?php

namespace App\Modules\VendorsUi\Controllers\users;


use App\Models\Vendor;
use App\Models\VendorUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class GetVendorUser
{
    use AsAction;


    public function handle(VendorUser $user)
    {
            return [
              'phone'=>$user->phone,
              'email'=>$user->email,
              'is_active'=>$user->is_active,
              'roles'=>$user->roles()->pluck('id')->toArray()
            ];
    }


}
