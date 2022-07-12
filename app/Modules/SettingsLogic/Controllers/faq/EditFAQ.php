<?php

namespace App\Modules\SettingsLogic\Controllers\faq;


use App\Models\FAQ;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class EditFAQ

{
    use AsAction;

    public function asController(ActionRequest $request, FAQ $faq)
    {

        return $faq;


    }


}
