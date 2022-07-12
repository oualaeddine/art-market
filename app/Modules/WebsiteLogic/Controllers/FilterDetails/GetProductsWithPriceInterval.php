<?php

namespace App\Modules\WebsiteLogic\Controllers\FilterDetails;


use App\Modules\ProductsLogic\Models\Product;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetProductsWithPriceInterval
{
    use AsAction;
    public function handle($request)
    {
        return Product::query()->whereBetween('price',[$request->min,$request->max])->get();
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle($request);
    }

    public function rules()
    {
        return [
            'min_price'=>'required|numeric',
            'max_price' => 'required|numeric|gt:min_price'
        ];
    }
}
