<?php

namespace App\Http\Controllers\Teacher;

use App\TeacherGroup;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{

    public function index()
    {
        $teacher = 1;
        $couples = TeacherGroup::where('user_id',$teacher)->get();

        return view('teacher.index',compact('couples'));
    }
}
