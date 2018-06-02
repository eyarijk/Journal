<?php

namespace App\Http\Controllers\Teacher;

use App\Journal;
use App\TeacherGroup;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $teacher = auth()->id();

        $selectYear = $request->year ? $request->year : date('Y');
        $semester = $request->semester ? $request->semester : $this->getSemester();

        $years = Journal::orderBy('year','asc')->pluck('year')->toArray();

        $years = array_unique( $years ? $years : [date('Y')]);

        $couples = TeacherGroup::where('year',$selectYear)->where('semester',$semester)->with('group');

        if (auth()->user()->role == User::TEACHER)
            $couples->where('user_id',$teacher);

        $couples = $couples->get();

        return view('teacher.index',compact('couples','years','selectYear','semester'));
    }

    private function getSemester()
    {
        $secondSemester = ['01','02','03','04','05','06'];

        if (in_array(date('m'),$secondSemester))
            return 2;

        return 1;
    }
}
