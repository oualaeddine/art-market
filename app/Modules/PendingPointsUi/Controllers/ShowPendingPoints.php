<?php

namespace App\Modules\PendingPointsUi\Controllers;


use App\Modules\Extra\GenerateHeader;
use App\Modules\PendingPointsLogic\Models\ClientPendingPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Yajra\DataTables\Facades\DataTables;

class ShowPendingPoints
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request $request)
    {
        $header = GenerateHeader::run('Points en attente', 'icon-package', 'blue', 'Liste des points en attente');

        $user_info = Auth::user();

        $breadcrumbs = array(['name' => "Points en attente", 'url' => route('admin.points.index')]);

        if ($request->ajax()) {

            $data = ClientPendingPoint::query()->with('client')->orderby('created_at', 'desc');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'PendingPointsUi::actions.btn')
                ->addColumn('responsive', function ($product) {
                    return '';
                })
                ->addColumn('created_at', function ($product) {

                    return $product->created_at;

                })
                ->addColumn('client', function ($product) {

                    return '<span class="badge badge-primary">'.$product->client->last_name .' '.$product->client->first_name.'</span>' ;

                })
                ->addColumn('amount', function ($product) {

                    return '<span class="badge badge-info">'.$product->amount.'</span>' ;

                })
                ->rawColumns(['action','amount','client' ,'responsive', 'created_at'])
                ->make(true);
        }

        return view('PendingPointsUi::index', compact('header', 'user_info', 'breadcrumbs'))->with(['page_title' => "Coupon | Points"]);
    }


    /*    public function authorize()
       {
           return auth()->user()->can('view_bon_achat');
       } */

}
