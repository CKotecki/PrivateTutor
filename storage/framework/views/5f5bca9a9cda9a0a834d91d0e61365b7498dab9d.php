<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"> -->


    <!-- Styles -->
    <!-- <link href="/css/app.css" rel="stylesheet"> -->


    <!-- Scripts -->
    <!-- <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script> -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>





    <!--code old -->
    <title>Lesson Logistics</title>


        <!--EXTERNAL SCRIPT IMPORTS-->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.6.3/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/SiteStyle.css">

        <script>
            $(document).ready(function(){

                // $('#signIn').click(function(){
                //      console.log("open");
                //     $('#overlay').fadeIn(200,function(){
                //         $('#logPop').animate({'top':'400px'},200);
                //     });
                //      return false;
                // });
                //
                // //Close log in box
                // $('#boxclose').click(function(){
                //     console.log("close");
                //     $('#logPop').animate({'top':'-400px'},500,function(){
                //         $('#overlay').fadeOut('fast');
                //     });
                //
                // });

				//sign in functions
            $('#submit').click(function(){
                    console.log("sign in");
					var userName = $('#login-name').val();
					$('#UserName').text(userName);
					//Set username into cookie
					setCookie("username", userName, 30);
					console.log(userName);
					var pass = $('#login-pass').val();
					//Close the sign in box
					//TODO - Check for validation with the back end
                    $('#logPop').animate({'top':'-400px'},500,function(){
                        $('#overlay').fadeOut('fast');
                    });
                });
				//Check for cookies
				checkCookie();
            });

			//Set cookie
			function setCookie(cname,cvalue,exdays) {
				var d = new Date();
				d.setTime(d.getTime() + (exdays*24*60*60*1000));
				var expires = "expires=" + d.toGMTString();
				document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
			}

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
			} else {
				$('#UserName').text("Sign In");
			//   user = prompt("Please enter your name:","");
			//   if (user !== "" && user !== null) {
			//	   setCookie("username", "Sign In", 30);

				}
			}
        </script>
</head>

<body>
  <!-- Header Menu -->

<div class="title">
    <img id="title" src="img/logo.png" alt="Lesson Logistics">

    <div class="header">
        <div class = "icon_menu_open">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>

        <div class = "icon_menu_close">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>

         <div class="chip" id="signIn">
            <img src="img/male_profile_placeholder.png" alt="Person" width="96" height="96">

            <!-- <a id="UserName">Sign In</a> -->
            <a href="<?php echo e(route('login')); ?>">Sign In</a>
        </div>
    </div>

    <div class="menu">
        <ul id = "menu_items">
            <li><a href='<?php echo e(url("welcome")); ?>'  id="menu_nav_links">Home</a></li>
            <li><hr id = "menu_divider"></li>
            <li><a href='<?php echo e(url("student")); ?>' id="menu_nav_links">Student Dashboard</a></li>
            <li><hr id = "menu_divider"></li>
            <li><a href='<?php echo e(url("tutor")); ?>' id="menu_nav_links">Tutor Dashboard</a></li>
            <li><hr id = "menu_divider"></li>
            <li><a href="Settings.html" id="menu_nav_links">Settings</a></li>
            <li><hr id = "menu_divider"></li>
            <li><a href="ContactUs.html" id="menu_nav_links">Contact</a></li>
        </ul>
    </div>
</div>

<!-- Content -->
  <?php echo $__env->yieldContent('content'); ?>


</body>

<!-- footer -->
<footer>
<div class="Footer">
  <p style="margin: 0px;">
    Lesson Logistics</br>
    123 Living The Dream Drive</br>
    lessonlog@pleaseworkatleastforthepresentation.com</br>
    1-800-TUTOR
  </p>
</div>
  </div>

      <!--Login Form-->
      <div class="box" id="logPop">
          <div class="login">
              <div class="login-screen">
                  <a class="boxclose" id="boxclose"></a>
                  <div class="app-title">
                      <h1 class="app-title">Login</h1>
                  </div>

                  <div class="login-form">
                      <div class="control-group">
                          <input type="text" class="login-field" value="" placeholder="username" id="login-name">
                          <label class="login-field-icon fui-user" for="login-name"></label>
                      </div>

                      <div class="control-group">
                          <input type="password" class="login-field" value="" placeholder="password" id="login-pass">
                          <label class="login-field-icon fui-lock" for="login-pass"></label>
                      </div>

                      <a class="btn btn-primary btn-large btn-block" href="#" id="submit">login</a>
                      <a class="login-link" href="#">Lost your password?</a>
                      <a class="login-link" href="accountcreate.html">Create new account</a>
                  </div>
              </div>
          </div>
      </div>
      <div class="overlay" id="overlay" style="display:none;"></div>

</footer>

<!--SCRIPTS-->
<script src="js/Menu.js"></script>

</html>
