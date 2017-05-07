<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function getStudent(Request $request)
    {
        $userid = $request->user()->id;
        //get course users from DB
        $tutors = DB::table('student_tutor_link')
            ->join('users','users.id','=', 'student_tutor_link.tutorID')
            ->select('users.name')
            ->where('student_tutor_link.studentID', '=', $userid)
            ->get();




      return view('student')->with('tutors',$tutors);
    }
}
