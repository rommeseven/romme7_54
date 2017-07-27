<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $fillable=['size','valign','offset','small','medium','large'];
    
}
