@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" type="text/css" href="css/chat.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<body>
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
  {{-- <div id="app">
    <chat-log :messages="messages"></chat-log>
    <chat-composer v-on:messagesent="addMessage"></chat-composer>
  </div> --}}

  </div>
  </div>
  </div>

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

                      <chat-log :messages="messages"></chat-log>

      		</div>
          <div class="panel-footer bottom-bar">

                <chat-composer v-on:messagesent="addMessage"></chat-composer>

          </div>
          </div>
          </div>
      </div>

  </div>
  </div>
  <div id="myModal" class="modal">

    <!-- Modal content -->
<<<<<<< HEAD
    <div class="modal-content" id="view-events">
      <span class="close">&times;</span>
=======
    <div class="modal-content">
      <!--span class="close">&times;</span-->
      <table class="eventTable">
        @if(count($events) != 0)
          @foreach($events as $index=>$event)
            @if(time(strtotime($event->date)) >= time())
              <tr>
                <td class="tableLabel">Tutor:</td>
                @if(count($tutorNames) != 0)
                  <td> {{ $tutorNames[$index] }} </td>
                @else
                  <td> Tutor Not Available </td>
                @endif
              </tr>
              <tr>
                <td class="tableLabel">Date:</td>
                <td> {{ date('l, F jS, Y',strtotime($event->date)) }} </td>
              </tr>
              <tr>
                <td class="tableLabel">Time:</td>
                <td> {{ date('g:i',strtotime($event->time)) }} </td>
              </tr>
              <tr>
                <td class="tableLabel">Location:</td>
                <td>{{ $event->location }} </td>
              </tr>
              <tr>
                <td><hr></td>
                <td><hr></td>
              </tr>
            @endif
          @endforeach
        @else
          <tr>
            <td>No Events Scheduled</td>
          </tr>
        @endif
      </table>
      </br> <!--COMMENT THIS OUT AND ADD PADING-BOTTOM TO TABLE-->
      <button class="btn btn-primary btn-large btn-block" onclick="showEventWindow()">New Appointment</button>
    </div>

    <div class="modal-content" id="create-events">
      <table>
        <tr>
          <td style="text-align:center;">New Appointment:</td>
        </tr>
        <tr>
          <td></td>
          <td>
            <div class="input-group date">
              <input type="text" class="form-control" value="12-02-2012">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>

            <script>
              $('#datepicker').datepicker();
              $('#datepicker').on('changeDate', function()
              {
                $('#my_hidden_input').val($('#datepicker').datepicker('getFormattedDate'));
              });
            </script>
          </td>
        </tr>
      </table>
      </br> <!--COMMENT THIS OUT AND ADD PADING-BOTTOM TO TABLE-->
    </div>
  </div>
</body>


<!--SCRIPT REFERENCES-->
<script>
$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
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




$('.glyphicon-facetime-video').click(function(event) {

      window.open($('#popup_video').attr("href"), "popupWindow", "width=800,height=800,scrollbars=yes");
      return false;
  });

  $(function () {
    var wtf = $('#scroll');
    var height = wtf[0].scrollHeight;
    wtf.scrollTop(height);
});
</script>
<script src="js/StudentDash.js"></script>
<script src="js/Menu.js"></script>
<script src="js/app.js"></script>
<script src="js/NewEvent.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection
