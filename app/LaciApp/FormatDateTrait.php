<?php
namespace App\LaciApp;

use Carbon\Carbon;
trait FormatDateTrait
{
    protected $newDateFormat = 'd.m.Y, H:i';

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format($this->newDateFormat);
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format($this->newDateFormat);
    }
}
