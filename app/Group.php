<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;

    public function student()
    {
        return $this->hasMany('App\Student');
    }

    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }
}
