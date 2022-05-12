<?php
include('../trainer_session.php');
if(!isset($user_check))
{
header("location:login-trainer.php?Invalid=Please Login First");
exit(); // Redirecting To Login Page
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <style>
 .form-gap {
    padding-top: 70px;
}
</style>
<style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #04B431;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 40%;
  bottom: 30px;
  font-size: 17px;
  align-content: center;
  border-radius: 25px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>

<body style="background-image: url('images/background.jpg')">
<div id="snackbar" align="center" >You Have Successfully Logged in ! Please reset your password to proceed..</div>





 <div class="form-gap"></div>
<div class="container" >
	<div class="row">
		<div class="col-md-4 col-md-offset-4" >
            <div class="panel panel-default" >
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Reset Your Password</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" onsubmit="return Validation()" action="reset_password_request.php" role="form" autocomplete="off" class="form" method="post">
                      <div id="error_message" class="p-3 mb-2 bg-danger text-white" style="color:#C70039 ;  margin-bottom: 20px; padding: 10px; border-radius: 25px; margin-top: 15px; display: none;" ></div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="new_password" name="new_password" placeholder="new password" class="form-control"  type="text">
                        </div>
                        <br>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="confirm_password" name="confirm_password" placeholder="confirm password" class="form-control"  type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

<script>
  $( document ).ready(function() {
    var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
});

  function Validation()
  {
 var new_password=document.getElementById('new_password').value;

     var confirm_password=document.getElementById('confirm_password').value;
       if(new_password.length<1 || confirm_password.length<1 || new_password.length<6)
         {
       error_message.style.display='block';
       }
     if(new_password.length<1)
        {
       text="Please Enter New Password ";
       error_message.innerHTML=text;
       return false; 
        }

     if(new_password.length>1 && new_password.length<6)
        {
       text="Please Enter Password More than 6 digits";
       error_message.innerHTML=text;
       return false; 
        }

          if(confirm_password.length<1)
        {
       text="Please Enter Confirm Password ";
       error_message.innerHTML=text;
       return false; 
        }

        if(confirm_password!==new_password)
        {
         text="Please Write same password as above";
       error_message.innerHTML=text;
       return false;  
        }
  }
  

</script>
