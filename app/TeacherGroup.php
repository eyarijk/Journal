<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherGroup extends Model
{
    public $timestamps = false;

    public function journal()
    {
        return $this->hasMany('App\Journal');
    }

    public function rating()
    {
        return $this->hasMany('App\Rating');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function teacher()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
