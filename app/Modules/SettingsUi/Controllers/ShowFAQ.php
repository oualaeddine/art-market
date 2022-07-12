<?php

namespace App\Modules\SettingsUi\Controllers;


use App\Models\FAQ;
use App\Models\HomeOffer;
use App\Modules\Extra\GenerateHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowFAQ
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run("FAQ", 'icon-grid', 'blue', "Liste des faq");

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "FAQ", 'url' => route('admin.faq.index')]);

        if ($request->ajax()) {
            $data = FAQ::query()->orderby('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'SettingsUi::actions.btn-faq')
                ->addColumn('responsive', function ($faq) {
                    return '';
                })
                ->addColumn('is_active', function ($faq) {
                    if ($faq->is_active){
                        return '<span class="badge badge-info shadow-sm">Oui</span> ';
                    }else{
                        return '<span class="badge badge-danger shadow-sm">Non</span> ';

                    }
                })
                ->rawColumns(['action','is_active','question','answer', 'responsive'])
                ->make(true);

        }

        return view('SettingsUi::index-faq', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => "FAQ"]);
    }


    public function authorize()
    {
        return auth()->user()->can('view_param');
    }

}
