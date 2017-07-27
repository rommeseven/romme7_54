<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
	protected $fillable=['align'];
	
    public function columns()
    {
        return $this->hasMany('App\Column');
    }
}
