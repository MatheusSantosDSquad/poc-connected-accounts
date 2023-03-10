<?php

namespace App\Enums;

enum FeeType: string
{
    case PERCENTAGE = 'percentage';
    case VALUE      = 'value';

    public static function random(): self
    {
        $cases = self::cases();
        $key   = array_rand($cases);

        return $cases[$key];
    }
}
