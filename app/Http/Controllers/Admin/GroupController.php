<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.group.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required|string|max:255',
        ]);

        $group = new Group();
        $group->name = $request->name;
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
