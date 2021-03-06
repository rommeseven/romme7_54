<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Nicolaslopezj\Searchable\SearchableTrait;
class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'name', 'email', 'password', 'username',
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = array(
        'password', 'remember_token',
    );

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
            'users.name'       => 10,
            'users.username'   => 10,
            'users.email'      => 8,
            'users.created_at' => 4,
/*
'users.bio' => 2,
'users.email' => 5,
'posts.title' => 2,
'posts.body' => 1,
 */
        ),
        'joins'   => array(
            //   'posts' => ['users.id','posts.user_id'],
        ),
    );
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
     * layout_template can be assigned to pages as well
     * @author Takács László
     * @date    2017-07-26
     * @version v1
     * @return  relationship
     */
    public function layout_templates()
    {
        return $this->hasMany('App\LayoutTemplate');
    }

}
