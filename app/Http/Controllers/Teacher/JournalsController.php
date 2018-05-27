<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Journal;
use App\TeacherGroup;
use App\Traits\JournalTrait;
use Illuminate\Http\Request;

class JournalsController extends Controller
{
    use JournalTrait;

    public function couple(TeacherGroup $couple)
    {
        $teacher = 1;

        if ($couple->user_id != $teacher)
            abort(404);

        $journal = Journal::where('teacher_group_id',$couple->id)->orderBy('month','asc')->orderBy('year','asc')->get();

        $times = $this->getMonth($journal);

        $func = function ($num){ echo $this->getNameOfMonth($num); };

        return view('teacher.journal.index',compact('times','func','couple'));
    }

    public function show(int $month, int $year,int $couple)
    {
        $journals = Journal::where('teacher_group_id',$couple)->where('year',$year)->where('month',$month)->get()->toArray();

        if (sizeof($journals) < 1)
            abort(404);

        $sizeOfMonth = range(1,31);

        $nameOfMonth = $this->getNameOfMonth($month);

        $couple = TeacherGroup::with('group')->with('subject')->first()->toArray();

        return view('teacher.journal.show',compact('journals','sizeOfMonth','nameOfMonth','year','month','couple'));
    }

    public function create(TeacherGroup $couple)
    {
        $func = function ($num){ echo $this->getNameOfMonth($num); };

        $month = Journal::where('teacher_group_id',$couple->id)->pluck('month')->toArray();

        $freeMonth = array_diff(range(1,12),$month);

        return view('teacher.journal.create',compact('func','month','freeMonth','couple'));
    }

    public function store(Request $request, TeacherGroup $couple)
    {
        $students = $couple->group->student;
        $month = $request->month;
        $year  = date('Y');

        #check

        $check = Journal::where('teacher_group_id',$couple->id)->where('month',$month)->where('year',$year)->first();

        if ($check)
            abort(404);

        foreach ($students as $student) {
            $newJournal = new Journal();
            $newJournal->month      = $month;
            $newJournal->year       = $year;
            $newJournal->student_id = $student->id;
            $newJournal->teacher_group_id = $couple->id;
            $newJournal->save();
        }

        return redirect()->route('teacher.couple',$couple->id);
    }
}
