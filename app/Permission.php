<?php

namespace App;

use Laratrust\LaratrustPermission;
use Nicolaslopezj\Searchable\SearchableTrait;
class Permission extends LaratrustPermission
{

    use SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'name', 'display_name', 'description'
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
            'permissions.name'  => 10,
            'permissions.description' => 4
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

}
