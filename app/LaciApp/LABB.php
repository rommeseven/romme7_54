<?php

namespace App\LaciApp;
class LABB
{
    public static function all()
    {
        $prefix = 'building_blocks.' . config("building_blocks.app");
        return config($prefix);
    }
}