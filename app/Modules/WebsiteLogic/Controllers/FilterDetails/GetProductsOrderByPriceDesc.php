<?php

namespace App\Modules\WebsiteLogic\Controllers\FilterDetails;

use App\Modules\ProductsLogic\Models\Product;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetProductsOrderByPriceDesc
{
    use AsAction;

    public function handle($request)
    {
        return Product::query()->orderByDesc('price')->get();
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle($request);
    }
}
