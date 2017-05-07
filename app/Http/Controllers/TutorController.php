<?php

namespace App\Http\Controllers;
use DB;
use Auth;

use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function getTutor(Request $request)
    {
      //HOLD student INFO FOR EACH EVENT FOR student NAME LOOKUP IN USER TABLE
      $studentNames = [];
      $studentIDs = [];

      if(count($tutor = DB::table('tutors')->where('userID', '=', Auth::user()->id)->get()) != 0)
      {
        $tutor = DB::table('tutors')->where('userID', '=', Auth::user()->id)->get();
        $events = DB::table('events')->where('tutorID', '=', $tutor[0]->tutorID)->get();
      }
      else
      {
        $events = DB::table('events')->where('studentID', '=', '-1')->get();
      }

      //ADD ID FOR student FOR ALL EVENTS FOUND FOR USER
      foreach($events as $event)
      {
        $studentInfo = DB::table('students')->select('userID')->where('studentID','=', $event->studentID)->get();
        array_push($studentIDs, $studentInfo[0]->userID);
      }

      //GET NAME FOR EACH student OF EACH EVENT FOR USER AND ADD TO ARRAY
      foreach($studentIDs as $student)
      {
        $studentUser = DB::table('users')->select('name')->where('id', '=', $student)->get();
        array_push($studentNames, $studentUser[0]->name);
      }

      return view('tutor', compact('events', 'studentNames'));

    }
}
