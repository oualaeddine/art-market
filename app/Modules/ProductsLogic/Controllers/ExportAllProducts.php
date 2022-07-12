<?php

namespace App\Modules\ProductsLogic\Controllers;

use App\Exports\ProductsExport;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Maatwebsite\Excel\Facades\Excel;

class ExportAllProducts
{
    use AsAction;

    public function asController(ActionRequest $request)
    {
       return $this->handle($request);
    }

    public function handle(ActionRequest $request)
    {
        return Excel::download(new ProductsExport, 'produits.xlsx');
    }



}
