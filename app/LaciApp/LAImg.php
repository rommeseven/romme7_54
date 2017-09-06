<?php

namespace App\LaciApp;
use Illuminate\Support\Facades\Storage;
class LAImg
{
    public static function url($path)
    {
        dd(config('filesystems.default'));

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
