<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
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

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function getFullName()
    {

        return $this->last_name . ' ' . $this->first_name;
    }
}
