<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;

    public function journal()
    {
        return $this->hasMany('App\Journal');
    }
}
