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
            //     setCookie("username", "Sign In", 30);
                    
                }
            }
            

        
    
    $(function () {
        $("#txtmyPassword").bind("keyup", function () {
            //TextBox left blank.
            if ($(this).val().length === 0) {
                $("#password_mystrength").html("");
                return;
            }
 
            //Regular Expressions.
            var regex = new Array();
            regex.push("[A-Z]"); //Uppercase Alphabet.
            regex.push("[a-z]"); //Lowercase Alphabet.
            regex.push("[0-9]"); //Digit.
            regex.push("[$@$!%*#?&]"); //Special Character.
 
            var passed = 0;
 
            //Validate for each Regular Expression.
            for (var i = 0; i < regex.length; i++) {
                if (new RegExp(regex[i]).test($(this).val())) {
                    passed++;
                }
            }
 
 
            //Validate for length of Password.
            if (passed > 2 && $(this).val().length > 8) {
                passed++;
            }
 
            //Display status.
            var color = "";
            var strength = "";
            switch (passed) {
                case 0:
                case 1:
                    strength = "Weak";
                    color = "red";
                    break;
                case 2:
                    strength = "Good";
                    color = "darkorange";
                    break;
                case 3:
                case 4:
                    strength = "Strong";
                    color = "green";
                    break;
                case 5:
                    strength = "Very Strong";
                    color = "darkgreen";
                    break;
            }
            $("#password_mystrength").html(strength);
            $("#password_mystrength").css("color", color);
        });
    });
    
    
           // Save user datat in local storage. 
    $(function() {
        $("#AccountSubmit").click(function(){
        
            saveAccount();
            getExtra();
            clearBoxes();

           
        });
        
        $("#btnViewAccount").click(function(){
           
            viewAccountInfo();
        });
        
         $("#btnClearAccount").click(function(){
           
            clearAccountInfo();
        });
        
    });
      
      function clearBoxes() {
          $('#tblContainer').find('input:text').each(
            function() {
                $(this).val('');
            }
        );
      }
        function saveAccount() {
          
            if(typeof(Storage) !== "undefined") {
          
                    var background = $("#Background").val();
                    var hobbies = $("#Hobbies").val();
                    
                    /*var username = $("#UserName").val();
                    var firstName = $("#FirstName").val();
                    var lastName = $("#LastName").val();
                    var email = $("#NewEmail").val();
                    var password = $("#newPassword").val();
                    var telephone = $("#TelephoneNumber").val();
                    var address = $("#Address").val();
                    var city = $("#City").val();
                    var state = $("#State").val();*/
                    //var StudentTutor = $("#choice").val();
    
                    localStorage.setItem("Background", background);
                    localStorage.setItem("Hobbies", hobbies);
                    /*
                    localStorage.setItem("UserName", username);
                    localStorage.setItem("FirstName", firstName);
                    localStorage.setItem("LastName", lastName);
                    localStorage.setItem("NewEmail", email);
                    localStorage.setItem("newPassword", password);
                    localStorage.setItem("TelephoneNumber", telephone);
                    localStorage.setItem("lastname", lastName);
                    localStorage.setItem("Address", address);
                    localStorage.setItem("City", city);
                    localStorage.setItem("State", state);*/
                    //localStorage.setItem("choice", StudentTutor);
                    

                    $("#extraInfo").html("Hobbies and Background Saved!");
               
               
            } else {
                $("#extraInfo").html("Sorry, your browser does not support web storage...");
            }
        }
        function getExtra(){
            if(typeof(Storage) !== "undefined") {
                var hobbies;
                var background;
        
               if (localStorage.background !== "undefined") {                  
                   background = localStorage.getItem("Background");       
               }
               if (localStorage.hobbies !== "undefined") {                  
                   hobbies = localStorage.getItem("Hobbies");       
               }
               
              // this allows us to iterate through all the local storage items
              for (var i = 0; i < localStorage.length; i++){
                    var key = localStorage.key(i);
                    $('#extraInfo').append("</br>" + key + "   :        " + localStorage.getItem(key) );
               }
               
            } else {
                $("#extraInfo").html("Sorry, your browser does not support web storage...");
            }
               
               
        }
        
        function getContent() {
          
            if(typeof(Storage) !== "undefined") {
                    
                    var username;
                    var firstName;
                    var lastName;
                    var email;
                    var password;
                    var telephone;
                    var address;
                    var city;
                    var state;
            
                    <!--var StudentTutor;
               

               if (localStorage.username !== "undefined") {                  
                   username = localStorage.getItem("UserName");       
               }
               if (localStorage.firstName !== "undefined") { 
                    firstName = localStorage.getItem("FirstName");
               }
               if (localStorage.lastName !== "undefined") {
                   lastName = localStorage.getItem("LastName");
               }
               if (localStorage.email !== "undefined") {
                     email = localStorage.getItem("NewEmail");
               }
               if (localStorage.password !== "undefined") {
                     password = localStorage.getItem("newPassword");
               }     
               if (localStorage.telephone !== "undefined") {          
                    telephone = localStorage.getItem("TelephoneNumber");                
               }
               if (localStorage.address !== "undefined") { 
                    address = localStorage.getItem("Address");
               }
               if (localStorage.city !== "undefined") {
                   city = localStorage.getItem("City");
               }
               if (localStorage.state !== "undefined") {
                     state = localStorage.getItem("State");
               }
               <!--if (localStorage.StudentTutor !== "undefined") {
                   <!--  StudentTutor = localStorage.getItem("choice");
               
              // this allows us to iterate through all the local storage items
              for (var i = 0; i < localStorage.length; i++){
                    var key = localStorage.key(i);
                    $('#accountInfo').append("</br>" + key + "   :        " + localStorage.getItem(key) );
               }
               
            } else {
                $("#accountInfo").html("Sorry, your browser does not support web storage...");
            }
        }
        
        function clearAccountInfo() {
          
            if(typeof(Storage) !== "undefined") {                   
               // this allows us to iterate through all the local storage items
              for (var i = 0; i < localStorage.length; i++){
                    var key = localStorage.key(i);
                    localStorage.removeItem(key);
               }                  
               $("#accountInfo").html("Local Storage Cleared");                           
            } else {
                $("#accountInfo").html("Sorry, your browser does not support web storage...");
            }
        }

</script>
    </head>       
    <body onload="getContent()">
        <div class="Main" align="center" width="50%">

            <div>Your Information.</div> 
             <div id="accountInfo"></div>
             <div> Please give some personal information</div>
                 
            <table width="70%" >
                <tbody width="60">
                    <tr>
                      <td>Background</td>
                      <td><textarea type="text" id="Background"></textarea></td>
                    </tr>
                    <tr>
                      <td>Hobbies</td>
                      <td><textarea type="text" id="Hobbies"></textarea></td>
                    </tr>
                    <tr>
                      <td>Resume</td>
                      <td><input type="file" id="Resume"></td>
                    </tr>
                    <tr>

                      <td>Please check the subjects you are interested in.</td>
                      <td><select name="courses" onchange="">
                                <option value="tutor" id="Algebra I"> Algebra I </option>
                                <option value="student" id="Algebra II">Algebra II</option>
                                <option value="tutor" id="Pre-Algebra">Pre-Algebra</option>
                                <option value="student" id="Geometry">Geometry</option>
                                <option value="tutor" id=" Pre-Calculus"> Pre-Calculus</option>
                                <option value="student" id=" Calculus"> Calculus</option>
                                <option value="tutor" id=" Statistics"> Statistics</option>
                                <option value="student" id=" Earth Science"> Earth Science</option>
                                <option value="tutor" id=" Biology"> Biology</option>
                                <option value="student" id="Chemistry">Chemistry</option>
                                <option value="tutor" id=" Physics"> Physics</option>
                                <option value="student" id="Writing">Writing</option>
                                <option value="tutor" id="SatTest">SAT/Test Prep</option>                                       
                    </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><button id="AccountSubmit" >Submit</button></td>
                    </tr>
                    <tr>
                      <td>Test button</td>
                      
                      <td><button id="btnViewAccount" >View Account</button></td>
                    </tr>
                        <tr>
                      <td>test button </td>
                       
                      <td><button id="btnClearAccount">Clear Account</button></td>
                    </tr>
                  </tbody>
                </table>
                <p><div id="extraInfo"></div></p>
        </div>
        <!--div class="Footer"><p></p></div-->
    </body>
    
    <!--SCRIPT REFERENCES-->
    <script src="StudentDash.js"></script>
    <script src="Menu.js"></script>
</html>
@endsection
