<?php

namespace App\Modules\ProductsLogic\Controllers;

use App\Imports\ProductImport;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Lorisleiva\Actions\Concerns\AsAction;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class ImportProducts
{
    use AsAction;

    public function handle()
    {

    }

    public function asController(Request $request,Vendor $vendor)
    {

        $validator = Validator::make(
            [
                'file' => $request->uploaded_file,
                'extension' => strtolower($request->uploaded_file->getClientOriginalExtension()),
            ],
            [
                'file' => 'required',
                'extension' => 'required|in:csv,xlsx,xls',
            ]
        );

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back();
        }
        DB::beginTransaction();

        try {

            Excel::import(new ProductImport($vendor), request()->file('uploaded_file'));

            Session::flash('success', 'fichier importé avec succès.');

            DB::commit();
        } catch (Throwable $e) {
            $failures = $e->failures();
            Log::alert('Product Upload failed',[$e]);
            DB::rollBack();
            Session::flash('error', 'insertion impossible');
            return redirect()->back()->withErrors($failures);

        }

        return redirect()->back();

    }
}
