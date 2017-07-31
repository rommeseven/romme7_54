<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * children relationship
     * @author Takács László
     * @date    2017-07-23
     * @version v1
     * @return  relationship     children
     */
    public function children()
    {
        return $this->hasMany('App\Page', 'parent_id', 'id');
    }

    /**
     * parent relationship
     * @author Takács László
     * @date    2017-07-23
     * @version v1
     * @return  relationship     parent
     */
    public function parent()
    {
        return $this->hasOne('App\Page', 'id', 'parent_id');
    }

    /**
     * row can be assigned to pages as well
     * @author Takács László
     * @date    2017-07-26
     * @version v1
     * @return  relationship
     */
    public function rows()
    {
        return $this->hasMany('App\Row');
    }

    /**
     * scope for nav
     * @author Takács László
     * @date    2017-07-23
     * @version v1
     * @param   Query     $query init
     * @return  Query            with scope
     */
    public function scopeNav($query)
    {
        return $query->with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', 0)->where('published', '=', true);
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder)
        {
            $builder->orderBy('display_order', 'asc');
        });
    }
}
