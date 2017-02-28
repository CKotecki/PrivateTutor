@extends('layouts.layout')
@section('content')
<script>
  $(document).ready(function(){
    //Check for cookie to populate name
    checkCookie();
  });
  //get Cookie
  function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) === 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

  //Check for user name
  function checkCookie() {
  console.log("Checking Cookie");
  var user = getCookie("username");
  if (user !== "") {
    //alert("Welcome again " + user);
    //Set test to Sign in
    $('#UserName').text(user);
    console.log(user);
  } else {
    $('#UserName').text("Sign In");
  //   user = prompt("Please enter your name:","");
  //   if (user !== "" && user !== null) {
  //	   setCookie("username", "Sign In", 30);

    }
  }


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

<h2 id="student-name">John Doe</h2>

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
