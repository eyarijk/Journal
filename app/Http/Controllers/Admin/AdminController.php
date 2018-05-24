<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Student;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $groups   = Group::count();
        $students = Student::count();
        $subjects = Subject::count();
        $teachers = User::where('role',User::TEACHER)->count();

        return view('admin.index',compact('groups','students','subjects','teachers'));
    }
}
