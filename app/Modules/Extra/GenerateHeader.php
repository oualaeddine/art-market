<?php

namespace App\Modules\Extra;


use Lorisleiva\Actions\Concerns\AsAction;
use stdClass;

class GenerateHeader
{
    use AsAction;

    public function handle(string $name,string $icon,string $color,string $text)
    {
        $header = new stdClass();
        $header->name = $name;
        $header->icon = $icon;
        $header->color = $color;
        $header->text = $text;

        return $header;
    }
}
