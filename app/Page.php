<?php

namespace App;

use Context;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Settings;

class Page extends Model
{
    use SearchableTrait;

    protected $fillable = array('title', 'url', 'slug', 'parent_id', 'display_order', 'published', 'step');

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = array(
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => array(
            'pages.title'  => 10,
            'pages.slug'   => 10,
            'pages.url'    => 10,
            'columns.html' => 5,
/*
'users.bio' => 2,
'users.email' => 5,
'posts.title' => 2,
'posts.body' => 1,
 */
        ),
        'joins'   => array(

            'rows'    => array('pages.id', 'rows.page_id'),
            'columns' => array('pages.id', 'rows.page_id', 'columns.row_id'),
        ),
    );



    /**
     * Get all the building blocks
     * @author Takács László
     * @date    2017-08-01
     * @version v1
     * @param   Page     $page    the page
     * @param   [string]     $key     the info
     * @param   string     $default when nothing comes
     */
    public static function GetBbs()
    {
        return \LABB::all();
    }

    /**
     * Get all the building blocks for the current page
     * @author Takács László
     * @date    2017-08-01
     * @version v1
     * @param   Page     $page    the page
     * @param   [string]     $key     the info
     * @param   string     $default when nothing comes
     */
    public function GetPageBbs()
    {
        $bbs = array(
                "layout" => "page"//$this->GetSetting("layout", "page")"
            );

        $bb          = collect(static::GetBbs());
        $bb_keys     = $bb->pluck("key");
        $bb_defaults = $bb->pluck("default");
        for ($i = 0; $i < sizeof($bb_keys); $i++)
        {
            $bbs = array_add($bbs,$bb_keys[$i],$this->GetSetting($bb_keys[$i], $bb_defaults[$i])    );
        }
        return $bbs;
    }

    /**
     * Get The setting for the current page
     * @author Takács László
     * @date    2017-08-01
     * @version v1
     * @param   Page     $page    the page
     * @param   [string]     $key     the info
     * @param   string     $default when nothing comes
     */
    public function GetSetting($key, $default = '')
    {
        $fallback = Settings::get($key, $default);
        return Settings::context(new Context(array("page" => $this->id)))->get($key, $fallback);
    }

    /**
     * Set The setting for the current page
     * @author Takács László
     * @date    2017-08-01
     * @version v1
     * @param   Page     $page    the page
     * @param   [string]     $key     the info
     * @param   string     $value the value to set the setting to
     */
    public function SetSetting($key, $value = '')
    {
        return Settings::context(new Context(array("page" => $this->id)))->set($key, $value);
    }

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
     * Format date fields
     * @author Takács László
     * @date    2017-08-02
     * @version v1
     * @param   unformatted     $date
     * @return  date           formatted
     */
    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.Y,H:i:s');
    }

    /**
     * Format date fields
     * @author Takács László
     * @date    2017-08-02
     * @version v1
     * @param   unformatted     $date
     * @return  date           formatted
     */
    public function getUpdatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y.m.d,H:i:s');
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
