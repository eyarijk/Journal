<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    public $timestamps = false;

    public function teacherGroup()
    {
        return $this->belongsTo('App\TeacherGroup');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

}
