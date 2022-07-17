<?php

namespace App\Modules\WebsiteUi\Controllers;

use App\Helpers\SetLocal;
use App\Models\FAQ;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowFAQ
{

    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(ActionRequest $request)
    {

        return view('WebsiteUi::faq',[
            'faqs'=>FAQ::query()->where('is_active',1)->where('lang',app()->getLocale())->get()
        ])->with(['page_title' => trans('FAQ')]);
    }

}
