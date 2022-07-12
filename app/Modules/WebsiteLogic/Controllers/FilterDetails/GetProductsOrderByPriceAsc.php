<?php

namespace App\Modules\WebsiteLogic\Controllers\FilterDetails;

use App\Modules\ProductsLogic\Models\Product;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetProductsOrderByPriceAsc
{
    use AsAction;

    public function handle($request)
    {
        return Product::query()->orderBy('price')->get();
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle($request);
    }

}
