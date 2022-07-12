<?php

namespace App\Modules\WebsiteLogic\Controllers\FilterDetails;

use App\Modules\ProductsLogic\Models\Product;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetProductsWithBrand
{
    use AsAction;

    public function handle()
    {
        return Product::query()->whereHas('brands')->with('brands')->get();
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle($request);
    }
}
