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

// Route::get('/tutor', function () {
//     return view('tutor');
// });

Route::get('/tutor', 'TutorController@getTutor');

Route::get('/welcome', 'WelcomeController@getWelcome');

Route::get('/student', 'StudentController@getStudent');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/student', function (){
  return view('student');
})->middleware('auth');

Route::get('/messages', function(){
  return App\Message::with('user')->get();
})->middleware('auth');

Route::post('/messages', function(){

  $user = Auth::user();
  $message = $user-> messages()->create([
    'message' => request()->get('message')
  ]);

  //announce the message was posted
  event(new MessagePosted($message, $user));

  return ['status' => 'OK'];

})->middleware('auth');
