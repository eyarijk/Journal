<?php

namespace App\Http\Controllers;

use App\Group;
use App\Journal;
use App\Student;
use App\TeacherGroup;
use Illuminate\Http\Request;

class BlackListController extends Controller
{
    public function index(int $couple)
    {
        $couple = TeacherGroup::with('group')->with('subject')->where('id',$couple)->first();
        return view('black-list.index',compact('couple'));
    }

    public function show(Request $request)
    {
        $year  = $request->year;
        $months = $request->months;
        $ban = [];

        $students = Student::where('group_id',$request->group)->get(['id','first_name','last_name']);

        foreach ($students as $student){
            $journal = Journal::where('year',$year)->whereIn('month',$months)->where('student_id',$student->id)->get();
            if ($this->searchForBlackList($journal))
                $ban[] = $student->getFullName();
        }


        return json_encode(['ban' => $ban]);
    }

    private function searchForBlackList($journal)
    {
        $daysCount = 0;
        $missing = 0;
        $sizeOfMonth = range(1,31);

        foreach ($journal as $item){
            foreach ($sizeOfMonth as $day){
                $temp = 'day_'.$day;
                if ($item->$temp != null) {
                    $daysCount++;
                    if ($item->$temp == 'н')
                        $missing++;
                }
            }
        }

        if (($daysCount * 0.7) < $missing)
            return true;

        return false;
    }
}
