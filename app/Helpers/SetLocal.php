<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use stdClass;

class SetLocal
{
    static function generate(string $lang)
    {
        App::setLocale($lang);
    }
}