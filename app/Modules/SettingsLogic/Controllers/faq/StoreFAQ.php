<?php

namespace App\Modules\SettingsLogic\Controllers\faq;


use App\Models\FAQ;
use App\Models\HomeOffer;
use App\Modules\ClientsLogic\Models\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreFAQ
{
    use AsAction;

    public function asController(ActionRequest $request)
    {

        $this->handle($request);

        Session::flash('message', 'FAQ ajouté avec succès');
        return redirect()->back();
    }

    public function handle(ActionRequest $request)
    {
       FAQ::query()->create([
          'question'=>$request->question,
          'answer'=>$request->answer ,
          'is_active'=>true,
          'lang'=>$request->lang
       ]);
    }


    public function rules(): array
    {
        return [
            'question' => ['required'],
            'answer' => ['required'],
//            'is_active'=>['required','in:0,1'],
            'lang'=>['required','in:fr,ar'],
        ];
    }

}
