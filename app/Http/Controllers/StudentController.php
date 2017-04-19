<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class StudentController extends Controller
{
    public function getStudent()
    {

      $events = Event::find(2);
      // /$date = strtotime($events->date);
      //echo date(“j F Y”, $date);

      return view('student', compact('events'));
    }
}
