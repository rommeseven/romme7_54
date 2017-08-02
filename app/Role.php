<?php

namespace App;

use Laratrust\LaratrustRole;
use Nicolaslopezj\Searchable\SearchableTrait;

class Role extends LaratrustRole
{
    use SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'name', 'display_name', 'description',
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
            'permissions.name'        => 10,
            'roles.name'              => 10,
            'permissions.description' => 4,
            'permissions.description' => 4,
/*
'users.bio' => 2,
'users.email' => 5,
'posts.title' => 2,
'posts.body' => 1,
 */
        ),
        'joins'   => array(

            'permission_role' => array('roles.id', 'permission_role.role_id'),
            'permissions'     => array('permissions.id', 'permission_role.permission_id'),
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
}
