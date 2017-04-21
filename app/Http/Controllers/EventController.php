<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class EventController extends Controller
{
    //CREATES EVENTS IN THE DATABASE
    function createEvent()
    {
        DB::table('events')->insert(
        [
            'location' => 'Unicorn Bloodbath',
            'tutorID' => '4',
            'date' => '2000-01-01',
            'time' => '12:03:04',
            'studentID' => '3'
        ]);

        //return view('student');
    }
}
