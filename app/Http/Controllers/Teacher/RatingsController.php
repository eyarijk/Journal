<?php

namespace App\Http\Controllers\Teacher;

use App\Group;
use App\Http\Controllers\Controller;
use App\Rating;
use App\TeacherGroup;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function index(Request $request)
    {
        $teacher = auth()->id();

        $selectYear = $request->year ? $request->year : date('Y');
        $semester = $request->semester ? $request->semester : $this->getSemester();

        $years = Rating::orderBy('year','asc')->pluck('year')->toArray();

        $years = array_unique( $years ? $years : [date('Y')]);

        $couples = TeacherGroup::where('user_id',$teacher)->where('year',$selectYear)->where('semester',$semester)->with('group')->get();

        return view('teacher.rating.index',compact('couples','semester','years','selectYear','semester'));
    }

    public function show(Group $group,Request $request)
    {
        $students = $group->student;
        $teacher = auth()->id();
        $year = $request->year ? $request->year : date('Y');
        $semester = $request->year ? $request->year : $this->getSemester();

        $ratings = Rating::where('year',$year)->where('semester',$semester)->whereIn('student_id',$students->pluck('id'))->pluck('id');

        if (sizeof($ratings) < 1){
            $couples = TeacherGroup::where('year',$year)
                ->where('semester',$semester)
                ->where('group_id',$group->id)
                ->with('subject')->get();
            $ratings = $this->createRatingDb($couples,$students,$year,$semester);
        }

        $ratings = Rating::whereIn('id',$ratings)->with('student')->with('subject')->get();


        $ratings = $this->formatRating($ratings);

        $subjects = array_get(array_first($ratings),'subjects');

        return view('teacher.rating.show',compact('teacher','ratings','subjects','year','semester','group'));

    }

    public function save(Request $request)
    {
        $year = $request->year;
        $semester = $request->semester;
        $student = $request->student;
        $number = $request->number;
        $subject = $request->subject;
        $teacher = $request->teacher;

        $rating = Rating::where('year',$year)
            ->where('semester',$semester)
            ->where('student_id',$student)
            ->where('subject_id',$subject)
        ->first();

        if($rating->teacherGroup->user_id != $teacher)
            return 'Ви не можете поставити оцінки не на свої предмети!';

        $rating->rating = $number;
        $rating->save();

        return 'Success';
    }

    public function extra(Request $request)
    {
        $year = $request->year;
        $semester = $request->semester;
        $student = $request->student;
        $number = $request->number;

        Rating::where('year',$year)
            ->where('semester',$semester)
            ->where('student_id',$student)
            ->where('is_extra',true)
            ->update(['rating' => $number]);

        return 'Success';
    }

    public function all(Request $request)
    {
        $year = $request->year;
        $semester = $request->semester;
        $student = $request->student;
        $number = $request->number;

        Rating::where('year',$year)
            ->where('semester',$semester)
            ->where('student_id',$student)
            ->where('is_all',true)
            ->update(['rating' => $number]);

        return 'Success';
    }

    // Other methods
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
            // Create extra
            $newRating = new Rating();
            $newRating->year = $year;
            $newRating->semester = $semester;
            $newRating->student_id = $student->id;
            $newRating->is_extra = true;
            $newRating->save();
            $ratings[] = $newRating->id;
            // Create All
            $newRating = new Rating();
            $newRating->year = $year;
            $newRating->semester = $semester;
            $newRating->student_id = $student->id;
            $newRating->is_all = true;
            $newRating->save();
            $ratings[] = $newRating->id;
        }

        return $ratings;
    }

    private function formatRating($ratings)
    {
        $student = [];

        foreach ($ratings as $rating) {
            if ($rating->teacher_group_id != null){
                $student[$rating->student_id]['student'] = $rating->student;
                $student[$rating->student_id]['subjects'][] = [
                    'rating' => $rating->rating,
                    'subject' => $rating->subject,
                ];
            } else {
                if ($rating->is_extra == true)
                    $student[$rating->student_id]['extra'] = $rating->rating != null ? $rating->rating : 0;
                else
                    $student[$rating->student_id]['all'] = $rating->rating != null ? $rating->rating : 0;
            }


        }
        return $student;
    }

    private function getSemester()
    {
        $secondSemester = ['01','02','03','04','05','06'];

        if (in_array(date('m'),$secondSemester))
            return 2;

        return 1;
    }
}
