<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Models\Vendor;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\ProductsLogic\Models\Product;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowShop
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {
        if (!$this->checkSroting($request->trier)) return redirect()->route('shop');

        $selected_vendor = $this->getSelectedVendor($request);

        $categories = $this->getCategories($selected_vendor);

        $brands = $this->getBrands($request, $selected_vendor);

        $serach = $request->search ?? null;

        $price = $request->price ?? null;

        $per_page = $request->par_page ?? 24;

        $vendors = $this->getVendors();

        $sort_by = $request->trier ?? 'name_fr-asc';

        $sort_by_array = explode('-', $sort_by);

        $selected_category = $request->category ?? null;

        $selected_brand = $request->marque ?? null;

        $products = $this->getProducts($request, $sort_by_array, $selected_category, $selected_brand, $price, $per_page);

        return view('WebsiteUi::shop', compact('price', 'selected_brand', 'selected_category', 'vendors', 'selected_vendor', 'categories', 'brands', 'products', 'per_page', 'sort_by', 'serach'))->with(['page_title' => trans('Shop')]);
    }

    private function checkSroting($sort)
    {
        return in_array($sort, ['', 'name_fr-asc', 'name_fr-desc', 'created_at-desc', 'price-asc', 'price-desc', 'rating-desc', 'rating-asc']);
    }

    private function getSelectedVendor($request): Vendor|null
    {
        return Vendor::query()->withCount('active_products as products_count')->where('name_fr', $request->vendor)->first();
    }

    private function getCategories($selected_vendor)
    {
        return Category::query()->where('is_active', 1)
            //->with('sub_categories')
            ->when($selected_vendor, function ($query) use ($selected_vendor) {
                $query->whereHas('products', function ($query) use ($selected_vendor) {
                    $query->where('vendor_id', $selected_vendor->id);
                });
            })->whereHas('products')->withCount('products')->get();
    }

    private function getBrands($request, $selected_vendor)
    {
        return Brand::query()->whereHas('products')->when($selected_vendor, function ($query) use ($selected_vendor) {
            $query->whereHas('products', function ($query) use ($selected_vendor) {
                $query->where('vendor_id', $selected_vendor->id);
            });
        })->withCount('products')->get();

    }

    private function getVendors()
    {
        return Vendor::query()
            ->whereHas('products')
            ->withCount('active_products as products_count')
            ->whereHas('vendors', function ($query) {
                $query->where('is_active', 1);
            })->get();
    }

    private function getProducts($request, $sort_by_array, $selected_category, $selected_brand, $price, $per_page)
    {
        return Product::query()->orderby($sort_by_array[0], $sort_by_array[1])->with('vendor')
            ->when($request->filled('vendor'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->whereHas('vendor', function ($query) use ($request) {
                        $query->where('name_fr', $request->vendor);
                    });
                });

            })
            ->where('is_active', 1)
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('name_fr', 'like', '%' . $request->search . '%')->orWhere('slug', 'like', '%' . $request->search . '%')->orWhere('ref', 'like', '%' . $request->search . '%')->orWhere('name_ar', 'like', '%' . $request->search . '%');
                });
            })
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
            })->with('categories')
            ->paginate($per_page)
            ->withQueryString();
    }

}
