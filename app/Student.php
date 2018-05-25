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

    public function group()
    {
        return $this->belongsTo('App\Group');
    }


}