<?php

namespace App\Http\Controllers\Teacher;

use App\Group;
use App\Http\Controllers\Controller;
use App\Rating;
use App\Student;
use App\Subject;
use App\TeacherGroup;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function index()
    {
        $teacher = auth()->id();

        $couples = TeacherGroup::where('user_id',$teacher)->with('group')->get();

        return view('teacher.rating.index',compact('couples'));
    }

    public function show(Group $group)
    {
        $students = $group->student;
        $teacher = auth()->id();
        $year = 2018;
        $semester = 2;

        $couples = TeacherGroup::where('year',$year)
            ->where('semester',$semester)
            ->where('group_id',$group->id)
            ->with('subject')->get();

        $ratings = Rating::where('year',$year)->where('semester',$semester)->whereIn('teacher_group_id',$couples->pluck('id'))->pluck('id');

        if (sizeof($ratings) < 1)
            $ratings = $this->createRatingDb($couples,$students,$year,$semester);

        $ratings = Rating::whereIn('id',$ratings)->with('student')->with('subject')->get();

        $ratings = $this->formatRating($ratings);

        $subjects = array_get(array_first($ratings),'subjects');

        return view('teacher.rating.show',compact('teacher','ratings','subjects','year','semester'));

    }

    public function save(Request $request)
    {
        $year = $request->year;
        $semester = $request->semester;
        $student = $request->student;
        $number = $request->number;
        $subject = $request->subject;

        Rating::where('year',$year)
            ->where('semester',$semester)
            ->where('student_id',$student)
            ->where('subject_id',$subject)
            ->update(['rating' => $number]);

        return 'Success';
    }

    private function createRatingDb($couples,$students,$year,$semester)
    {
        $ratings = [];
        foreach ($students as $student){
            foreach ($couples as $couple) {
                $newRating = new Rating();
                $newRating->year = $year;
                $newRating->semester = $semester;
                $newRating->student_id = $student->id;
                $newRating->teacher_group_id = $couple->id;
                $newRating->subject_id = $couple->subject_id;
                $newRating->save();
                $ratings[] = $newRating->id;
            }
        }

        return $ratings;
    }

    private function formatRating($ratings)
    {
        $student = [];

        foreach ($ratings as $rating) {
            $student[$rating->student_id]['student'] = $rating->student;
            $student[$rating->student_id]['subjects'][$rating->subject_id] = [
                'rating' => $rating->rating,
                'subject' => $rating->subject,
            ];
        }

       return $student;
    }
}
