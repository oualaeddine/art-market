<?php

namespace App\Modules\VendorsLogic\Controllers\Vendor\users;

use App\Models\Vendor;
use App\Models\VendorUser;
use App\Rules\PhoneNumber;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ToggleUser
{
    use AsAction;

    public function asController(VendorUser $user)
    {
        $this->handle($user);
        Session::flash('success', 'Utilisateur mis à jour avec succès.');
        return redirect()->route('vendor.users.index');
    }

    public function handle($user)
    {

        $user->update([
            'is_active'=>!$user->is_active
        ]);


    }



}
