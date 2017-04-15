@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
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

				<h2 id="student-name">{{ Auth::user()->name }} </h2>

				<div id="ratings">
					<i id="s1" class="fa fa-star" aria-hidden="true" onClick="starColor(0,this.id);"></i>
					<i id="s2" class="fa fa-star" aria-hidden="true" onClick="starColor(0,this.id);"></i>
					<i id="s3" class="fa fa-star" aria-hidden="true" onClick="starColor(0,this.id);"></i>
					<i id="s4" class="fa fa-star" aria-hidden="true" onClick="starColor(0,this.id);"></i>
					<i id="s5" class="fa fa-star" aria-hidden="true" onClick="starColor(0,this.id);"></i>
				</div>

				<p style="margin: 0px; margin-top: 25px;">
					Positive Reviews: 45 </br>
					Total Reviews: 49
				</p>

				<h3 id="student-about-me">About Me</h2>

				<div class="skill_bars">
						<table>
							<tr>
								<td>Mathematics</td>

								<td style="width:400px">
									<div class="myProgress">
										<div class="myBar" id="skill-1"></div>
									</div>
								</td>
							</tr>

							<tr>
								<td>Computer Science</td>

								<td>
									<div class="myProgress">
										<div class="myBar" id="skill-2"></div>
									</div>
								</td>
							</tr>

							<tr>
								<td>Physics</td>

								<td>
									<div class="myProgress">
										<div class="myBar" id="skill-3"></div>
									</div>
								</td>
							</tr>

							<tr>
								<td>Biology</td>

								<td>
									<div class="myProgress">
										<div class="myBar" id="skill-4"></div>
									</div>
								</td>
							</tr>
						</table>
					</div>
			</div>

			<div style="width: 30%;">
				<h3 style="margin-top: 45px; text-align: left;">Subjects</h3>

				<select multiple="multiple" class="subject-select">
				   <optgroup label="Mathematics">
					  <option value="Algebra" class="optionChild">Algebra</option>
					  <option value="Calculus" class="optionChild">Calculus</option>
					  <option value="Geometry" class="optionChild">Geometry</option>
					  <option value="Trigonometry" class="optionChild">Trigonometry</option>
				   </optgroup>

				   <optgroup label="Natural Sciences">
						<option value="Physics" class="subOptGroup">Physics</option>
							<option value="Classical Physics" class="optionChild">Classical Physics</option>
							<option value="Modern Physics" class="optionChild">Modern Physics</option>
							<option value="Quantum Physics" class="optionChild">Quantum Physics</option>

						<option value="Chemistry" class="subOptGroup">Chemistry</option>
							<option value="Bio Chemistry" class="optionChild">Bio Chemistry</option>
							<option value="Organic Chemistry" class="optionChild">Organic Chemistry</option>

						<option value="Biology" class="subOptGroup">Biology</option>
							<option value="Microbiology" class="optionChild">Microbiology</option>
							<option value="Ecology" class="optionChild">Ecology</option>
							<option value="Virology" class="optionChild">Virology</option>
				   </optgroup>
				</select>

				<select name="Your Students" title="Your Students" class="studentSelect">
						<option value="Clayton">Clayton</option>
						<option value="Luke">Luke</option>
						<option value="Curtis" selected>Curtis</option>
					</select>
				</form>


			<p style="margin: 0px; margin-top: 45px;">Student Communication</p>
			<textarea cols="15" id="comment-to-student"></textarea>
			<input type="button" value="Send" id="send-comment-student">

			</div>
		</div>


		<div class="main"></div>

				<!-- The Modal -->
		<div id="myModal" class="modal">

		  <!-- Modal content -->
		  <div class="modal-content">
				<span class="close">&times;</span>
				<table>
					<tr>
						<td>Student:</td>
						<td> {{ Auth::user()->name }}</td>
					</tr>
					<tr>
						<td>Time:</td>
						<td>8:00 PM</td>
					</tr>
					<tr>
						<td>Location:</td>
						<td>  @{{ DB::select('SELECT location FROM event') }}</td>
					</tr>
				</table>
		  </div>
		</div>
  </body>

      <!--SCRIPT REFERENCES-->
    <script src="js/StudentDash.js"></script>
    <script src="js/Menu.js"></script>
	<!--script src="js/TutorRating.js"></script-->

	<script>
		// function viewAccountInfo() {
		//
    //         if(typeof(Storage) !== "undefined") {
		//
    //         		var username;
    //                 var firstName;
    //                 var lastName;
		// 			var email;
		// 			var password;
		// 			var telephone;
    //                 var address;
    //                 var city;
		// 			var state;
    //                 //var StudentTutor;
		//
		// 	   if (localStorage.username !== "undefined") {
    //                username = localStorage.getItem("UserName");
    //            }
    //            if (localStorage.firstName !== "undefined") {
    //                 firstName = localStorage.getItem("FirstName");
    //            }
    //            if (localStorage.lastName !== "undefined") {
    //                lastName = localStorage.getItem("LastName");
    //            }
    //            if (localStorage.email !== "undefined") {
    //                  email = localStorage.getItem("NewEmail");
    //            }
    //            if (localStorage.password !== "undefined") {
    //                  password = localStorage.getItem("newPassword");
		// 	   }
		// 	   if (localStorage.telephone !== "undefined") {
		//
		// 			telephone = localStorage.getItem("TelephoneNumber");
		//
    //            }
    //            if (localStorage.address !== "undefined") {
    //                 address = localStorage.getItem("Address");
    //            }
    //            if (localStorage.city !== "undefined") {
    //                city = localStorage.getItem("City");
    //            }
    //            if (localStorage.state !== "undefined") {
    //                  state = localStorage.getItem("State");
    //            }
		//
		// 	  $('#student-name').text(firstName + " " + lastName);
		//
    //         } else {
    //             $("#accountInfo").html("Sorry, your browser does not support web storage...");
    //         }
    //     }
		//
		// viewAccountInfo();
	</script>

	<script>
		//SCROLL RESUME EXPERIENCE BARS FUNCTION
		var triggered = false;

		$(document).on('scroll',function()
		{
				var elemOffset = $('.myProgress').offset().top;
				var elemHeight = $('.myProgress').height();
				var windowHeight = $(window).height();
				var offset = elemOffset - ((windowHeight / 2)-(elemHeight / 2));

				if($(window).scrollTop() > offset && triggered == 0 )
				{
				console.log("made it");
					$('#skill-1').animate
					({
						width: "90%"
					}, 1000);

					$('#skill-2').animate
					({
						width: "40%"
					}, 1000);

					$('#skill-3').animate
					({
						width: "30%"
					}, 1000);

					$('#skill-4').animate
					({
						width: "80%"
					}, 1000);

					triggered = true;
				}
		});


	</script>
@endsection
