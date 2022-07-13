<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use stdClass;

class GetCleanPhoneNumber
{
   static function getPhone($phone){

        if (Str::startsWith($phone, '00213')) return explode('00213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0213')) return explode('0213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '+213')) return explode('+213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '213')) return explode('213', $phone, 2)[1];
        elseif (Str::startsWith($phone, '0')) return explode('0', $phone, 2)[1];
        elseif (Str::startsWith($phone, '6') || Str::startsWith($phone, '5') || Str::startsWith($phone, '7')) return $phone;
        else return 0;
   }
}
