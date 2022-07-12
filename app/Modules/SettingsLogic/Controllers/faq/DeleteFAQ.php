<?php

namespace App\Modules\SettingsLogic\Controllers\faq;


use App\Models\FAQ;
use App\Models\HomeOffer;
use App\Modules\ClientsLogic\Models\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteFAQ

{
    use AsAction;

    public function asController(ActionRequest $request,FAQ $faq)
    {

        $this->handle($faq);

        Session::flash('message', 'FAQ supprimé avec succès');
        return redirect()->back();
    }

    public function handle($faq)
    {
         $faq->forceDelete();
    }


}
