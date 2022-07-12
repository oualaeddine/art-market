<?php

namespace App\Modules\VendorsUi\Controllers;


use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class Profile
{
    use AsAction;

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Profil', 'icon-award', 'blue', 'Profil');
        $user_info = Auth::user();
        $breadcrumbs = array(['name' => 'Profil', 'url' => route('vendor.user.profile')]);
        $vendor=\auth()->guard('vendor')->user();

        return view('VendorsUi::Vendor.profile', compact('vendor','header', 'user_info', 'breadcrumbs'))->with(['page_title' => 'Profil']);
    }


}
