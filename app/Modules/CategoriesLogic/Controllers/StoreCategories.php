<?php

namespace App\Modules\CategoriesLogic\Controllers;

use App\Modules\CategoriesLogic\Models\Category;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreCategories
{
    use AsAction,UploadImageTrait;

    public function handle(ActionRequest $request)
    {
        if ($request->icon != null) {

            $image_path = $this->storeAndOptimizeImage($request, 'icon', 'categories_icons');
            $path = 'storage/categories_icons/' . $image_path;
            return $bon = Category::create($this->getCategoryFields($request) + ['is_active'=>true,'icon' => $path]);
        } else {
            return  $bon = Category::create($this->getCategoryFields($request)+['is_active'=>true]);
        }



        $bon = Category::create($this->getCategoryFields($request));
        return $bon;
    }

    private function getCategoryFields($request): array
    {
        return $request->only([  'name_ar',
                                'name_fr',
//                                'is_active',
                                'parent_id'
                              ]);
    }

    public function rules(): array
    {
        return [
            'name_ar' => ['required','string','max:45','unique:categories,name_ar'],
            'name_fr' => ['required','string','max:45','unique:categories,name_fr'],
//            'is_active' => ['required'],
            'parent_id' => ['nullable'],
            'icon' => 'nullable|max:2048|mimes:jpeg,png,jpg',
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


    public function asController(ActionRequest $request)
    {

        $bon = $this->handle($request);

        Session::flash('message',"Catégories ajoutée avec succès");


        return redirect()->route('admin.categories.index');
    }

    /*   public function authorize()
    {
        return auth()->user()->can('create_bon_achat');
    } */

}
