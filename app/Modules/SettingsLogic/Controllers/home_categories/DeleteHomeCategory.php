<?php

namespace App\Modules\SettingsLogic\Controllers\home_categories;


use App\Models\HomeCategory;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteHomeCategory
{
    use AsAction;

    public function asController(ActionRequest $request, HomeCategory $category)
    {

        $this->handle($request, $category);

        Session::flash('message', 'Catégorie supprimé avec succès');
        return redirect()->back();
    }

    public function handle(ActionRequest $request, $category)
    {
        $category->delete();
    }


}
