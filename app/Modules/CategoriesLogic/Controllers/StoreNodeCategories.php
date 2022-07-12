<?php

namespace App\Modules\CategoriesLogic\Controllers;

use App\Modules\CategoriesLogic\Models\Category;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreNodeCategories
{
    use AsAction, UploadImageTrait;

    public function rules(): array
    {
        return [
            'name_ar' => ['required', 'string', 'max:65', 'unique:categories,name_ar'],
            'name_fr' => ['required', 'string', 'max:65', 'unique:categories,name_fr'],
            'image' => 'nullable|max:2048|mimes:jpeg,png,jpg',
        ];
    }

    public function getValidationAttributes(): array
    {
        return [
            'name_ar' => 'nom en arabe',
            'name_fr' => 'nom en français',
            'is_active' => 'actif',
            'parent_id' => 'catégorie principale',
        ];
    }

    public function asController(ActionRequest $request, Category $category = null)
    {

        $this->handle($request, $category);

        Session::flash('message', "Catégorie ajoutée avec succès");

        return redirect()->back();

    }

    public function handle($request, $category)
    {

        $image_path = null;
        if ($request->hasFile('image')) {
            $image_path = 'storage/categories_images/' . $this->storeAndOptimizeImage($request, 'image', 'categories_images');
        }
        Category::query()->create($this->getCategoryFields($request) + ['image' => $image_path, 'is_active' => 1, 'parent_id' => $category?->id]);

    }

    private function getCategoryFields($request): array
    {
        return $request->only([
            'name_ar',
            'name_fr',
        ]);
    }

    public function authorize()
    {
        return auth()->user()->can('create_categories');
    }

}
