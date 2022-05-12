<?php
//------ Database Connection ----- // 
require_once('connection.php');

//------ Session Start ----- // 
session_start();

//------ Login Request ----- // 
if(isset($_POST['login']))
{       
        $_SESSION["email"] = $_POST["email"];
        $_SESSION['last_time'] = time();
		$email=$_POST['email'];
		$password=$_POST['password'];
     
       
		$query = "SELECT * FROM `trainers` WHERE  (email='$email' or trainer_id='$email' and password='$password')";
       
		$result=mysqli_query($db,$query);
        
            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['login']=$_POST['email'];
                $password_count=strlen($password);
                if($password_count<=4)
                 {
                 header("location:trainer-profile/reset_password.php");
                 } 
                 else
                 {
                  header("location:trainer-profile/profile.php");
                 }  
                
            }
            else
            {
                header("location:login-trainer.php?Invalid= Invalid Email/ID or Password ");
            }
		
}
//------ Login Request ----- // 
?>