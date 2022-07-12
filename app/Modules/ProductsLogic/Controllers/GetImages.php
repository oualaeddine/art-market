<?php

namespace App\Modules\ProductsLogic\Controllers;

use App\Modules\ProductsLogic\Models\Product;
use App\Modules\ProductsLogic\Models\Product_image;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetImages
{
    use AsAction;

    public function handle(ActionRequest $request,Product $product)
    {
        $product_images = $product->images;

        return [
            'images' => $product_images,
            'main_image' => $product->image
        ];
    }




}
