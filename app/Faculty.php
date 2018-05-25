<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public $timestamps = false;

    public function group()
    {
        return $this->hasMany('App\Group');
    }
}
