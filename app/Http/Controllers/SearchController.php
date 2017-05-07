<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function getTutors(Request $request)
    {
      $userid = $request->user()->id;
      //get course users from DB
      $coupled = DB::table('student_tutor_link')
          ->join('users','users.id','=', 'student_tutor_link.tutorID')
          ->select('users.name', 'users.id')
          ->where('student_tutor_link.studentID', '=', $userid)
          ->get();

        //get course users from DB
        $tutors = DB::table('users')
            ->select('id','name', 'email')
            ->get();


      return view('search')->with('tutors',$tutors)->with('coupled',$coupled);
    }

    public function addTutor(Request $request){
        $studentID = $_POST['studentID'];
        $tutorID = $_POST['tutorID'];

        //db insert for instructor-course association
    DB::table('student_tutor_link')->insert(['studentID'=>$studentID,'tutorID'=>$tutorID]);


    //get course lessons from DB
    $tutors = DB::table('users')
        ->select('id','name', 'email')
        ->get();



    return redirect()->route('student');
    }
}
