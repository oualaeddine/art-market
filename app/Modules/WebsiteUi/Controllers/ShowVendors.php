<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use App\Models\Vendor;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowVendors
{

    use AsAction;

    public function asController(ActionRequest $request)
    {
        return view('WebsiteUi::vendors')->with(['page_title' => trans('Vendeurs')]);
    }

}
