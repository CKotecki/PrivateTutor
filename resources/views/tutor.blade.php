@extends('layouts.layout')
@section('content')

<link rel="stylesheet" href="css/app.css">


<style type="text/css">

#scroll {

    height: 500px;
    overflow-y: scroll;
}


.col-md-2, .col-md-10{
padding:0;
}
.panel{
margin-bottom: 0px;
width:100%;
}
.chat-window{
bottom:0;
position:fixed;

margin-left:10px;
right:0;
}
.chat-window > div > .panel{
border-radius: 5px 5px 0 0;
}
.icon_minim{
/*padding:2px 10px;*/
}
.msg_container_base{
background: #e5e5e5;
margin: 0;
padding: 0;
max-height:500px;
overflow-y: scroll;
overflow-x:hidden;

}
.top-bar {
background: #666;
color: white;
padding: 10px;
position: relative;
overflow: hidden;
}

.bottom-bar{
  /*background: #666;
  color: white;
  padding: 30px;
  position: relative;
  overflow: hidden;*/
}
.msg_receive{
padding-left:0;
margin-left:0;
}
.msg_sent{
padding-bottom:20px !important;
margin-right:0;
}
.messages {
background: white;
padding: 10px;
border-radius: 2px;
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
max-width:100%;
}
.messages > p {
font-size: 13px;
margin: 0 0 0.2rem 0;
}
.messages > time {
font-size: 11px;
color: #ccc;
}
.msg_container {
padding: 10px;
overflow: hidden;
display: flex;
}

.avatar {
position: relative;
}
.base_receive > .avatar:after {
content: "";
position: absolute;
top: 0;
right: 0;
width: 0;
height: 0;
border: 5px solid #FFF;
border-left-color: rgba(0, 0, 0, 0);
border-bottom-color: rgba(0, 0, 0, 0);
}

.base_sent {
justify-content: flex-end;
align-items: flex-end;
}
.base_sent > .avatar:after {
content: "";
position: absolute;
bottom: 0;
left: 0;
width: 0;
height: 0;
border: 5px solid white;
border-right-color: transparent;
border-top-color: transparent;
box-shadow: 1px 1px 2px rgba(black, 0.2);

.msg_sent > time{
/*float: right;*/
}




.btn-group.dropup{
position:fixed;
left:0px;
bottom:0;
}

.panel-footer { padding:0px !important;}

.chat_box{float:left !important; width:85% !important; border:none; border-radius:0px;}





</style>



<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" type="text/css" href="css/chat.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">

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

  <h2 id="student-name" class="student-name">{{ Auth::user()->name }} </h2>

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
			<!-- Chat window -->
			<div class="page">
					<div class="container">
					<div class="row chat-window col-xs-5 col-md-4" id="chat_window_1" style="margin-left:10px;">
							<div class="col-xs-12 col-md-12">
								<div id="app">
								<div class="panel panel-default">
											<div class="panel-heading top-bar">
													<div class="col-md-8 col-xs-8">
															<h3 class="panel-title">{{ Auth::user()->name }}</h3>
													</div>
													<div class="col-md-4 col-xs-4" style="text-align: right;">

															<a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
															<a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
													</div>
											</div>
											<div class="panel-body msg_container_base" id="scroll">
												<div id='app'>

												</div>
													<chat-log :messages="messages" ></chat-log>

							</div>
							<div class="panel-footer bottom-bar">

										<chat-composer v-on:messagesent="addMessage"></chat-composer>

							</div>
							</div>
							</div>
					</div>

			</div>
			</div>
			</div>


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
					<td>Curtis</td>
				</tr>
				<tr>
					<td>Time:</td>
					<td>8:00 PM</td>
				</tr>
				<tr>
					<td>Location:</td>
					<td>The Rhino</td>
				</tr>
			</table>
		  </div>

		</div>
  </body>



	<script>
		//SCROLL RESUME EXPERIENCE BARS FUNCTION
		var triggered = false;

		$(window).on('scroll', function()
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

	<!--SCRIPT REFERENCES-->
	<script>
	$(document).on('click', '.panel-heading span.icon_minim', function (e) {
	    var $this = $(this);
	    if (!$this.hasClass('panel-collapsed')) {
	        $this.parents('.panel').find('.panel-body').slideUp();
	        $this.parents('.panel').find('.panel-footer').slideUp();
	        $this.addClass('panel-collapsed');
	        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
	    } else {
	        $this.parents('.panel').find('.panel-body').slideDown();
	        $this.parents('.panel').find('.panel-footer').slideDown();
	        $this.removeClass('panel-collapsed');
	        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
	    }
	});
	$(document).on('focus', '.panel-footer input.chat_input', function (e) {
	    var $this = $(this);
	    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
	        $this.parents('.panel').find('.panel-body').slideDown();
	        $('#minim_chat_window').removeClass('panel-collapsed');
	        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
	    }
	});
	$(document).on('click', '#new_chat', function (e) {
	    var size = $( ".chat-window:last-child" ).css("margin-left");
	     size_total = parseInt(size) + 400;
	    alert(size_total);
	    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
	    clone.css("margin-left", size_total);
	});
	$(document).on('click', '.icon_close', function (e) {
	    //$(this).parent().parent().parent().parent().remove();
	    $( "#chat_window_1" ).remove();
	});


	  $(function () {
	    var wtf = $('#scroll');
	    var height = wtf[0].scrollHeight;
	    wtf.scrollTop(height);
	});
	</script>

	<!--SCRIPT REFERENCES-->
<script src="js/StudentDash.js"></script>
<script src="js/Menu.js"></script>
<script src="js/TutorRating.js"></script>


@endsection
