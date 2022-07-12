<?php

namespace App\Helpers;

use stdClass;

class HeaderGenerator
{
    static function generate(string $name,string $icon,string $color,string $text)
    {
        $header = new stdClass();
        $header->name = $name;
        $header->icon = $icon;
        $header->color = $color;
        $header->text = $text;

        return $header;
    }
}