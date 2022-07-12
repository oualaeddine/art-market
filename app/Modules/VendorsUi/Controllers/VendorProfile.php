<?php

namespace App\Modules\VendorsUi\Controllers;


use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class VendorProfile
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Vendeur', 'icon-award', 'blue', 'Profil');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Profil', 'url' => route('vendor.profile')]);
        $vendor=\auth()->guard('vendor')->user()->vendor;

        return view('VendorsUi::Vendor.information', compact('vendor','header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Vendor']);
    }


}
