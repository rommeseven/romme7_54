<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayoutTemplate extends Model
{
    protected $table = "layout_templates";
    protected $fillable = ["name"];
    
    public function rows()
    {
        return $this->hasMany('App\Row', 'layout_template_id', 'id');
    }
}
