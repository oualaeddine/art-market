<?php

namespace App\Modules\SettingsUi\Controllers;


use App\Models\HomeOffer;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowHomeOffers
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("Dernières offres", 'icon-grid', 'blue', "Liste des dernières offres");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Dernières offres", 'url' => route('admin.home-offers.index')]);

        if ($request->ajax()) {
            $data = HomeOffer::query()->with('product')->orderby('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'SettingsUi::actions.btn-home-offers')
                ->addColumn('responsive', function ($product) {
                    return '';
                })
                ->addColumn('name_ar', function ($product) {
                    return '<span class="badge badge-primary shadow-sm">' .$product->product->name_ar. '</span> ';
                })
                ->addColumn('name_fr', function ($product) {
                    return '<span class="badge badge-primary shadow-sm">' .$product->product->name_fr. '</span> ';
                })
                ->rawColumns(['action','name_fr','name_ar', 'responsive'])
                ->make(true);

        }

        return view('SettingsUi::index-home-offers', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => "Dernières offres"]);
    }


    public function authorize()
    {
        return auth()->user()->can('view_param');
    }

}
