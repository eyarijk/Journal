<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    public $timestamps = false;

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
