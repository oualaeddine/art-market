<?php

namespace App\Modules\CategoriesLogic\Controllers;

use App\Modules\CategoriesLogic\Models\Category;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateCategories
{
    use AsAction,UploadImageTrait;

    public function handle(ActionRequest $request, Category $category)
    {
        if ($request->icon != null) {

            $image_path = $this->storeAndOptimizeImage($request, 'icon', 'categories_icons');
            $path = 'storage/categories_icons/' . $image_path;

            if($category->icon != null){
                File::delete(public_path($category->icon));
            }
            
            $category->update(['icon' => $path]);
        }


        $bon = $category->update($this->getCategoryFields($request));

        return $bon;

    }


    private function getCategoryFields($request): array
    {
        return $request->only([  'name_ar',
                                'name_fr',
                                'is_active',
                                'parent_id'
                              ]);
    }

    public function rules(): array
    {
        return [
            'name_ar' => ['required','string','max:45',Rule::unique('categories', 'name_ar')->ignore(request()->category->id)],
            'name_fr' => ['required','string','max:45',Rule::unique('categories', 'name_fr')->ignore(request()->category->id)],
            'is_active' => ['required'],
            'parent_id' => ['nullable'],
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

    public function asController(ActionRequest $request, Category $category)
    {

        $bon = $this->handle($request,$category);

        Session::flash('message',"Catégorie mis a jour avec succès");

        return redirect()->route('admin.categories.index');
    }

   /*  public function authorize()
    {
        return auth()->user()->can('edit_bon_achat');
    } */
}
