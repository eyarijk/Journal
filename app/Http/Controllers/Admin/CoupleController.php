<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use App\Subject;
use App\TeacherGroup;
use App\User;
use Illuminate\Http\Request;

class CoupleController extends Controller
{
    public function index()
    {
        $couples = TeacherGroup::with('group')->with('subject')->with('teacher')->get();
        return view('admin.couple.index',compact('couples'));
    }

    public function create()
    {
        $teachers = User::where('role',User::TEACHER)->get();
        $groups   = Group::all();
        $subjects = Subject::all();

        return view('admin.couple.create',compact('teachers','groups','subjects'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'teacher'        => 'required|numeric',
            'subject'        => 'required|numeric',
            'group'        => 'required|numeric'
        ]);

        $checkCouple = TeacherGroup::where('user_id',$request->teacher)
            ->where('group_id',$request->group)
            ->where('subject_id',$request->subject)
            ->first();

        if ($checkCouple)
            return redirect()->route('couples.index');

        $couple = new TeacherGroup();
        $couple->group_id   = $request->group;
        $couple->user_id = $request->teacher;
        $couple->subject_id    = $request->subject;
        $couple->save();

        return redirect()->route('couples.index');
    }

    public function delete(TeacherGroup $couple)
    {
        if ($couple)
            $couple->delete();

        return redirect()->route('couples.index');
    }
}
