<?php $__env->startSection('content'); ?>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->


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

/*.chat_box{float:left !important; width:85% !important; border:none; border-radius:0px;}*/



</style>

<!-- Styles -->
<link rel="stylesheet" type="text/css" href="css/chat.css">
<div class="Main">
  <?php echo e(csrf_field()); ?>


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
<h2 id="student-name"><?php echo e(Auth::user()->name); ?> </h2>

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

<select name="Your Students" title="Your Students" class="studentSelect" id="tutorSelect">
  <?php $__currentLoopData = $tutors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($tutor->name); ?>"><?php echo e($tutor->name); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</form>






<p style="margin: 0px; margin-top: 45px;">Tutor Communication</p>

<a href="<?php echo e(route('search')); ?>" class="page-scroll btn btn-xl">Find a Tutor</a>
<!-- Chat setup -->








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
                        <h3 class="panel-title"><?php echo e(Auth::user()->name); ?></h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">

                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                    </div>
                </div>
                <div class="panel-body msg_container_base" id="scroll">

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



$( document ).ready(function() {
  var $this = $(this);

document.getElementById("minim_chat_window").click();

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>