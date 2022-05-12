<?php
$db=mysqli_connect('localhost','root','','gym_db');
include('../trainer_session.php');
if(!isset($user_check))
{
header("location:login-joiner.php?Invalid=Please Login First");
exit(); // Redirecting To Login Page
}
if(isset($_POST['recover-submit']))
{
	$password=$_POST['new_password'];
	$query="UPDATE `joiners` SET `password`='$password' WHERE `email`='$user_check' OR `joiner_id`='$user_check'";
   
	
	$result=mysqli_query($db,$query);
   if($result)
   {
   	echo "<script>alert('You Password has successfully reset Thankyou!')</script>";  
		echo "<script>location='profile.php'</script>";
   }
   else
   {
   	echo "<script>alert('There is error on resetting password.Please Try Again!')</script>";  
		echo "<script>location='reset_password.php'</script>";
   }	

}

	?>