<?php

namespace App\Modules\SettingsLogic\Controllers\home_categories;


use App\Models\HomeCategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreHomeCategory
{
    use AsAction;

    public function asController(ActionRequest $request)
    {

        $this->handle($request);

        Session::flash('message', 'Catégorie ajouté avec succès');
        return redirect()->back();
    }

    public function handle(ActionRequest $request)
    {
        HomeCategory::query()->updateOrCreate([
            'category_id' => $request->category_id,
        ], [
            'category_id' => $request->category_id,
        ]);
    }


    public function rules(): array
    {
        return [
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ];
    }

}
