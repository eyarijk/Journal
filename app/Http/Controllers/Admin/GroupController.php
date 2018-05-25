<?php

namespace App\Http\Controllers\Admin;

use App\Faculty;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('admin.group.index',compact('groups'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        return view('admin.group.create',compact('faculties'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required|string|max:255',
            'faculty' => 'required|numeric',
        ]);

        $faculty = Faculty::findOrFail($request->faculty);

        $group = new Group();
        $group->name       = $request->name;
        $group->faculty_id = $faculty->id;
        $group->save();

        return redirect()->route('groups.index');
    }

    public function delete(Group $group)
    {
        if ($group)
            $group->delete();

        return redirect()->route('groups.index');
    }
}
