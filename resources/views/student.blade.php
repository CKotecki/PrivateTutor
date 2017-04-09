@extends('layouts.layout')
@section('content')
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->


<link rel="stylesheet" href="css/app.css">
<script>
$(function(){
$("#addClass").click(function () {
  $('#sidebar_secondary').addClass('popup-box-on');
    });

    $("#removeClass").click(function () {
  $('#sidebar_secondary').removeClass('popup-box-on');
    });
})
</script>

<!-- Styles -->
<link rel="stylesheet" type="text/css" href="css/chat.css">
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
<!-- Chat setup -->
<div id="app">
  <chat-log :messages="messages"></chat-log>
  <chat-composer v-on:messagesent="addMessage"></chat-composer>
</div>







<div>
    <div class="row">
		<h2 style="color: rgb(24, 157, 14);"><i aria-hidden="true" class="fa fa-whatsapp"></i> Whatsapp Chat Box POPUP</h2>
        <div class="round hollow text-center">
        <a class="open-btn" id="addClass"><i class="fa fa-whatsapp" aria-hidden="true"></i> Click Here</a>
        </div>
	</div>
</div>



</div>
</div>
</div>


<!-- Chat window -->
<aside id="sidebar_secondary" class="tabbed_sidebar ng-scope chat_sidebar">

<div class="popup-head">
    			<div class="popup-head-left pull-left"><a Design and Developmenta title="Gurdeep Osahan (Web Designer)" target="_blank" href="https://web.facebook.com/iamgurdeeposahan">
<img class="md-user-image" alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" title="Gurdeep Osahan (Web Designer)" alt="Gurdeep Osahan (Web Designer)">
<h1>Person Name</h1><small><br> <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Web Designer</small></a></div>
					  <div class="popup-head-right pull-right">
                      <button class="chat-header-button" type="button"><i class="glyphicon glyphicon-facetime-video"></i></button>
						<button class="chat-header-button" type="button"><i class="glyphicon glyphicon-earphone"></i></button>
                        <div class="btn-group gurdeepoushan">
    								  <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
									   <i class="glyphicon glyphicon-paperclip"></i> </button>
									  <ul role="menu" class="dropdown-menu pull-right">
										<li><a href="#"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Gallery</a></li>
										<li><a href="#"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Photo</a></li>
										<li><a href="#"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Video</a></li>
										<li><a href="#"><span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> Audio</a></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Location</a></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Contact</a></li>
									  </ul>
						</div>

						<button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                      </div>
			  </div>

<div id="chat" class="chat_box_wrapper chat_box_small chat_box_active" style="opacity: 1; display: block; transform: translateX(0px);">
                        <div class="chat_box touchscroll chat_box_colors_a">
                            <div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                    <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)"  src="http://www.webncc.in/images/gurdeeposahan.jpg" class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, eum? </p>
                                    </li>
                                    <li>
                                        <p> Lorem ipsum dolor sit amet.<span class="chat_message_time">13:38</span> </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                    <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="md-user-image">
                                </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem delectus distinctio dolor earum est hic id impedit ipsum minima mollitia natus nulla perspiciatis quae quasi, quis recusandae, saepe, sunt totam.
                                            <span class="chat_message_time">13:34</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                    <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="http://www.webncc.in/images/gurdeeposahan.jpg" class="md-user-image">
                                </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.https://www.facebook.com/iamgurdeeposahan
                                            <span class="chat_message_time">23 Jun 1:10am</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                    <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="md-user-image">
                                </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p> Lorem ipsum dolor sit amet, consectetur. </p>
                                    </li>
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            <span class="chat_message_time">Friday 13:34</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
<div class="chat_submit_box">
    <div class="uk-input-group">
        <div class="gurdeep-chat-box">
        <span style="vertical-align: sub;" class="uk-input-group-addon">
        <a href="#"><i class="fa fa-smile-o"></i></a>
        </span>
        <input type="text" placeholder="Type a message" id="submit_message" name="submit_message" class="md-input">
        <span style="vertical-align: sub;" class="uk-input-group-addon">
        <a href="#"><i class="fa fa-camera"></i></a>
        </span>
        </div>

    <span class="uk-input-group-addon">
    <a href="#"><i class="glyphicon glyphicon-send"></i></a>
    </span>
    </div>
</div>

        </div>
<!--SCRIPT REFERENCES-->
<script src="js/StudentDash.js"></script>
<script src="js/Menu.js"></script>
<script src="js/app.js"></script>
@endsection
