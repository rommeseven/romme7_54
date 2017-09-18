<?php

namespace App\LaciApp;

class LABB
{
    public static function all()
    {
        $prefix = 'building_blocks.'.config("building_blocks.app");
        return collect(config($prefix))->where('module',"all")->toArray();
    }

    public static function getTypeName($type)
    {
        return config('building_blocks.types.'.$type);

    }

    public static function onlyType($type)
    {
        return collect(static::all())->where('type' ,$type)->toArray();
    }

    public static function simpleAll()
    {
        $prefix = 'building_blocks.'.config("building_blocks.app");
        return collect(config($prefix))->pluck('name', 'key')->toArray();
    }

    public static function types()
    {
        return collect(static::all())->pluck("type")->unique();
    }
}
