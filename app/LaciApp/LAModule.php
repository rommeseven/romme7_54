<?php

namespace App\LaciApp;
class LAModule
{
    public static function all()
    {
        $prefix = 'modules.' . config("modules.app");
        return config($prefix);
    }
}   
