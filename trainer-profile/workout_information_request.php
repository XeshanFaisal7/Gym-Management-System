<?php
include('../trainer_session.php');
$db=mysqli_connect('localhost','root','','gym_db');

if(isset($_POST['submit']))
{
	$joiner_id=$_POST['joiner'];
	$package_id=$_POST['package'];
	$date=$_POST['date'];
	$information=$_POST['information'];
	$trainer_id=$row['trainer_id'];


	$query="INSERT INTO `post_workout_information`(`joiner_id`, `package_id`, `date`, `information`,`trainer_id`) 
	VALUES ('$joiner_id','$package_id','$date','$information','$trainer_id')";
	$result=mysqli_query($db,$query);

	   echo "<script>alert('Todays Information about workout is posted successfully')</script>";  
 
		echo "<script>location='workout_informations.php'</script>";  

}	
?>