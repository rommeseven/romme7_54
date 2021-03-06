<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayoutTemplate extends Model
{

    protected $fillable = array("name");

    protected $table = "layout_templates";

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

    public function rows()
    {
        return $this->hasMany('App\Row', 'layout_template_id', 'id');
    }

    /**
     * get the creator
     * @author Takács László
     * @date    2017-09-13
     * @version v1
     * @return  mixed     the USer instance
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }    
}
