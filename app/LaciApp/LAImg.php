<?php

namespace App\LaciApp;
use Illuminate\Support\Facades\Storage;
class LAImg
{
    public static function url($path)
    {
        if (\App::environment('local'))
        {
            return Storage::url($path);
        }
        else
        {
            return Storage::getDriver()->getAdapter()->applyPathPrefix($path);
        }
    }
}
