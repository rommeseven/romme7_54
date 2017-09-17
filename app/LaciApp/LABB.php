<?php

namespace App\LaciApp;
class LABB
{
    public static function all()
    {
        $prefix = 'building_blocks.' . config("building_blocks.app");
        return config($prefix);
    }
     public static function simpleAll()
    {
        $prefix = 'building_blocks.' . config("building_blocks.app");
        return collect(config($prefix))->pluck('name','key')->toArray();
    }
}