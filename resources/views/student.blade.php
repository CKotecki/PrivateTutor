@extends('layouts.layout')
@section('content')
<script>
  $(document).ready(function(){
    //Check for cookie to populate name
    checkCookie();
  });



    </script>

<div class="Main">
    <div class="calendar">
        <div class="month">
            <ul>
                <li class="prev" onclick="monthChooser('arrows', 'previous');">&#10094;</li>
                <li class="next" onclick="monthChooser('arrows', 'next');">&#10095;</li>
                <li id="CalendarTitle" style="text-align:center; font-size: 30px;">
                </li>
            </ul>
        </div>

        <ul class="weekdays">
          <li>Su</li>
          <li>Mo</li>
          <li>Tu</li>
          <li>We</li>
          <li>Th</li>
          <li>Fr</li>
          <li>Sa</li>
        </ul>

        <ul class="days" id="days">
        </ul>
    </div>

  <div style="margin: 25px;">
<div id="student-info-section">
<img src="img/male_profile_placeholder.png" alt="Person" width="96" height="96" id="student-profilepic-dash">

<!-- Set Name -->
<h2 id="student-name">{{ Auth::user()->name }} </h2>

</br>
</br>
</br>
</br>
</br>

<h3 id="student-about-me">About Me</h2>

<p>
  I'm a two-dimensional vector graphic instead of a real human being. I enjoy existing in a dimension that really doesn't make sense
  other than being the surface of the three-dimensional objects of your universe. Also I have no face.
</p>

<select name="Your Students" title="Your Students" class="studentSelect">
    <option value="Clayton">Johnny Instruction</option>
    <option value="Luke">Leslie Learner</option>
    <option value="Curtis" selected>Tommy Tutor</option>
  </select>
</form>


<p style="margin: 0px; margin-top: 45px;">Tutor Communication</p>
<textarea cols="15" id="comment-to-student"></textarea>

</br>
<input type="button" value="Send" id="send-comment-student">

</div>
</div>
</div>

<!--SCRIPT REFERENCES-->
<script src="js/StudentDash.js"></script>
<script src="js/Menu.js"></script>
@endsection
