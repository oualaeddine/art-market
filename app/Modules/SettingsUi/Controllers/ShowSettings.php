<?php

namespace App\Modules\SettingsUi\Controllers;


use App\Modules\SettingsLogic\Models\Category;
use App\Modules\Extra\GenerateHeader;
use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowSettings
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("Paramètres", 'icon-grid', 'blue', "Liste des paramètres");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Paramètres", 'url' => '/admin-dash/settings']);

        if ($request->ajax()) {
            $data =  Setting::orderby('created_at', 'desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action','SettingsUi::actions.btn')
                    ->addColumn('responsive', function ($category) { return '';})
                    ->rawColumns(['action','responsive'])
                    ->make(true);

        }

        return view('SettingsUi::index', compact('header', 'user_info','breadcrumbs'))->with(['page_title' => "Paramètres"]);
    }


 /*    public function authorize()
    {
        return auth()->user()->can('view_bon_achat');
    } */

}
