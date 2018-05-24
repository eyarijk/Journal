<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subject.index',compact('subjects'));
    }

    public function create()
    {
        return view('admin.subject.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required|string|max:255',
        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->save();

        return redirect()->route('subjects.index');
    }

    public function delete(Subject $subject)
    {
        if ($subject)
            $subject->delete();

        return redirect()->route('subjects.index');
    }
}
