<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use DB;
use Auth;

class StudentController extends Controller
{
    public function getStudent()
    {
      if(count($student = DB::table('students')->where('userID', '=', Auth::user()->id)->get()) != 0)
      {
        $student = DB::table('students')->where('userID', '=', Auth::user()->id)->get();
        $events = DB::table('events')->where('studentID', '=', $student[0]->studentID)->get();
      }
      else
      {
        $events = DB::table('events')->where('studentID', '=', '-1')->get();
      }

      foreach($events as $event)
      {
        $tutor = DB::table('tutors')->where('tutorID','=', $event->tutorID)->get();
        $tutorUser = DB::table('users')->where('id', '=', $tutor[0]->userID)->get();
      }


      return view('student', compact('events','tutorUser'));
    }
}
