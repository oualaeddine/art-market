<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Models\Vendor;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\ProductsLogic\Models\Product;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowVendorDetail
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request, Vendor $vendor)
    {


        if (!$this->checkSroting($request->trier)) return redirect()->route('vendor-detail', ['vendor' => $vendor->name_fr]);

        $categories = $this->getCategories($vendor);

        $brands = $this->getBrands($request, $vendor);

        $price = $request->price ?? null;

        $per_page = $request->par_page ?? 24;


        $sort_by = $request->trier ?? 'name_fr-asc';

        $sort_by_array = explode('-', $sort_by);

        $selected_category = $request->category ?? null;

        $selected_brand = $request->marque ?? null;

        $products = $this->getProducts($request, $vendor, $sort_by_array, $selected_category, $selected_brand, $price, $per_page);

        $vendor->loadCount('active_products as products_count');
        $vendor->loadCount('orders as sales_count');
        $vendor->load('images');


        return view('WebsiteUi::vendor-detail', compact('price', 'selected_brand', 'selected_category', 'categories', 'brands', 'products', 'per_page', 'sort_by', 'vendor'))->with(['page_title' => trans('Vendor Detail')]);
    }

    private function checkSroting($sort)
    {
        return in_array($sort, ['', 'name_fr-asc', 'name_fr-desc', 'created_at-desc', 'price-asc', 'price-desc', 'rating-desc', 'rating-asc']);
    }


    private function getCategories($selected_vendor)
    {
        return Category::query()->whereIsActive(true)
            ->whereHas('products', function ($query) use ($selected_vendor) {
                $query->where('vendor_id', $selected_vendor->id);

            })->whereHas('products')->get();
    }

    private function getBrands($request, $selected_vendor)
    {
        return Brand::query()->whereHas('products')
            ->whereIsActive(true)
            ->whereHas('products', function ($query) use ($selected_vendor) {
                $query->where('vendor_id', $selected_vendor->id);

        })->get();

    }

    private function getProducts($request, $vendor, $sort_by_array, $selected_category, $selected_brand, $price, $per_page)
    {
        return Product::query()->orderby($sort_by_array[0], $sort_by_array[1])
            ->withWhereHas('vendor')
            ->where('vendor_id', $vendor->id)
            ->where('is_active', 1)
            ->when($request->filled('category'), function ($query) use ($selected_category) {
                $query->where(function ($query) use ($selected_category) {
                    $query->wherehas('categories', function ($q) use ($selected_category) {
                        $q->where('name_fr', $selected_category)->orWhere('name_ar', $selected_category);
                    });
                });

            })
            ->when($request->filled('marque'), function ($query) use ($selected_brand) {
                $query->where(function ($query) use ($selected_brand) {
                    $query->wherehas('brands', function ($q) use ($selected_brand) {
                        $q->where('name_fr', $selected_brand)->orWhere('name_ar', $selected_brand);
                    });
                });

            })
            ->when($request->filled('price'), function ($query) use ($price) {
                $query->where(function ($query) use ($price) {
                    $query->whereBetween('price', [0, $price]);
                });
            })
            ->with('categories')
            ->paginate($per_page)
            ->withQueryString();
    }

}
