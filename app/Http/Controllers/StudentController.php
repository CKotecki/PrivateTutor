<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class StudentController extends Controller
{
    public function getStudent()
    {

      //HOLD TUTOR INFO FOR EACH EVENT FOR TUTOR NAME LOOKUP IN USER TABLE
      $tutorNames = [];
      $tutorIDs = [];

      if(count($student = DB::table('students')->where('userID', '=', Auth::user()->id)->get()) != 0)
      {
        $student = DB::table('students')->where('userID', '=', Auth::user()->id)->get();
        $events = DB::table('events')->where('studentID', '=', $student[0]->studentID)->get();
      }
      else
      {
        $events = DB::table('events')->where('studentID', '=', '-1')->get();
      }

      //ADD ID FOR TUTOR FOR ALL EVENTS FOUND FOR USER
      foreach($events as $event)
      {
        $tutorInfo = DB::table('tutors')->select('userID')->where('tutorID','=', $event->tutorID)->get();
        array_push($tutorIDs, $tutorInfo[0]->userID);
      }

      //GET NAME FOR EACH TUTOR OF EACH EVENT FOR USER AND ADD TO ARRAY
      foreach($tutorIDs as $tutor)
      {
        $tutorUser = DB::table('users')->select('name')->where('id', '=', $tutor)->get();
        array_push($tutorNames, $tutorUser[0]->name);
      }

      return view('student', compact('events', 'tutorNames'));
    }
}
