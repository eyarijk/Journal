<?php

namespace App\Http\Controllers\Admin;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = User::where('role',USER::TEACHER)->get();
        return view('admin.teachers.index',compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:users',
            'username'     => 'required|string|min:3|',
            'password'     => 'required|string|min:6|',
        ]);

        $teacher = new User();
        $teacher->role       = User::TEACHER;
        $teacher->first_name = $request->first_name;
        $teacher->last_name  = $request->last_name;
        $teacher->email      = $request->email;
        $teacher->username   = $request->username;
        $teacher->password   = bcrypt($request->password);
        $teacher->save();

        return redirect()->route('teachers.index');
    }

    public function delete(User $user)
    {
        if ($user)
            $user->delete();

        return redirect()->route('teachers.index');
    }
}
