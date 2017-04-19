<?php

use App\Events\MessagePosted;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tutor', 'TutorController@getTutor');

Route::get('/welcome', 'WelcomeController@getWelcome');

Route::get('/student', 'StudentController@getStudent');

Route::get('/settings', 'SettingsController@getSettings');

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
Route::get('/events',function() {

$events = DB::table('events');

  return view('student', compact('events'));

})->middleware('auth');
*/
Route::get('/chat', function () {
    return view('chat');
})->middleware('auth');

Route::get('/messages', function () {
    return App\Message::with('user')->get();
})->middleware('auth');

Route::post('/messages', function () {
    // Store the new message
    $user = Auth::user();

    $message = $user->messages()->create([
        'message' => request()->get('message')
    ]);

    // Announce that a new message has been posted
    broadcast(new MessagePosted($message, $user))->toOthers();

    return ['status' => 'OK'];
})->middleware('auth');
