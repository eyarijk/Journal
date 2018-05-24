<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index',compact('students'));
    }

    public function create()
    {
        $groups = Group::all();
        return view('admin.student.create',compact('groups'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'group'        => 'required|numeric'
        ]);

        $group = Group::findOrFail($request->group);

        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name  = $request->last_name;
        $student->group_id   = $group->id;
        $student->save();

        return redirect()->route('students.index');
    }

    public function delete(Student $student)
    {
        if ($student)
            $student->delete();

        return redirect()->route('students.index');
    }
}
