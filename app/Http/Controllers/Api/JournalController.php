<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $year   = $request->year;
        $month  = $request->month;
        $couple = $request->couple;

        $journals = Journal::where('teacher_group_id',$couple)->where('year',$year)->where('month',$month)->get();

        $usedDays = $this->usedDays($journals);

        $students = $this->getStudentsInfo($journals,$usedDays);


        $result = [
            'th'       => $usedDays,
            'students' => $students,
        ];

        return json_encode($result);
    }

    public function save(Request $request)
    {
        $year       = $request->year;
        $month      = $request->month;
        $couple     = $request->couple;
        $student_id = $request->student;
        $day        = 'day_' . $request->day;
        $number     = $request->number;

        $journal = Journal::where('teacher_group_id',$couple)
            ->where('year',$year)
            ->where('month',$month)
            ->where('student_id',$student_id)
            ->first();

        $journal->$day = $number;
        $journal->save();

        return 'Success';
    }

    private function usedDays($journals)
    {
        $days = range(1,31);
        $used = [];

        $used[] = [
            'name' => 'П. І.',
        ];

        $tempArray = [];

        foreach ($journals as $journal) {
            foreach ($days as $day) {
                $temp = 'day_' . $day;
                if ($journal->$temp != null) {
                    if (!in_array($day,$tempArray)){
                        $tempArray[] = $day;
                        $used[]['name'] = $day;
                    }
                }
            }
        }

        sort($used);

        return $used;
    }

    private function getStudentsInfo($journals,$usedDays)
    {
        array_shift($usedDays);

        $students = [];
        $index = 0;
        foreach ($journals as $journal) {
            $students[$index] = [
                'full_name'    => $journal->student->getFullName(),
                'student_id' => $journal->student_id,
                'days'       => [],
            ];

            foreach ($usedDays as $day){
                $temp = 'day_' . array_first($day);
                $students[$index]['days'][] = [
                    'day'    => array_first($day),
                    'number' => $journal->$temp,
                ] ;
            }
            $index++;
        }
        return $students;
    }
}
