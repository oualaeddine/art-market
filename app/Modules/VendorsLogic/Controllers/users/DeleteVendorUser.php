<?php

namespace App\Modules\VendorsLogic\Controllers\users;


use App\Models\Vendor;
use App\Models\VendorUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteVendorUser
{
    use AsAction;

    public function asController(VendorUser $user)
    {
        $this->handle($user);
        $vendor_id=$user->vendor_id;
        Session::flash('success', 'Utilisateur supprimé avec succès.');
        return redirect()->route('admin.vendors.detail',['vendor'=>$vendor_id,'type'=>'all','#Users']);
    }

    public function handle($user): void
    {

        $user->delete();
    }


}
