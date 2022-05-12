<?php
include('../connection.php');

if(isset($_POST['update']))
{
	$id=$_POST['id']; 
  $password=$_POST['password'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  $experience_years=$_POST['experience_years']; 
  $area=$_POST['area']; 
  $starting_time=$_POST['starting_time'];
  $ending_time=$_POST['ending_time'];

	$sql="UPDATE `trainers` SET `password`='$password',`name`='$name',`email`='$email',`contact`='$contact',`experience_years`='$experience_years',`area`='$area',`starting_time`='$starting_time',`ending_time`='$ending_time' WHERE id='$id'";
	$query=mysqli_query($db,$sql);
	header('location:profile.php');
}
?>