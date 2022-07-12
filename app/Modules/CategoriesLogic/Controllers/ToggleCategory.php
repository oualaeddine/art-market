<?php

namespace App\Modules\CategoriesLogic\Controllers;

use App\Modules\CategoriesLogic\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class ToggleCategory
{
    use AsAction;

    public function handle($category)
    {


        $category->update([
            'is_active'=>!$category->is_active
        ]);
    }

    public function asController(Category $category)
    {
        $this->handle($category);
        Session::flash('message',"Catégorie mis à jour avec succès");
        return redirect()->back();
    }

}
