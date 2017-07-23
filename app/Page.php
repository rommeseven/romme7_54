<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Page extends Model
{
	    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('display_order','asc');
        });
    }


    public function children()
    {

        return $this->hasMany('App\Page', 'parent_id', 'id');

    }

    public function parent()
    {

        return $this->hasOne('App\Page', 'id', 'parent_id');

    }

    public static function tree()
    {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', null)->get();
    }
    public function scopeNav($query)
    {
    	return $query->with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', 0);
    }
}
