<?php
include('../connection.php');

if(isset($_POST['update']))
{
	   $id=$_POST['id'];
  $firstname=$_POST['firstname'];
  $middlename=$_POST['middlename'];
  $lastname=$_POST['lastname'];
  $contact=$_POST['contact'];
  $address=$_POST['address'];
   $email=$_POST['email'];
  $password=$_POST['password'];
  $gender=$_POST['gender'];
	$sql="UPDATE `joiners` SET `firstname`='$firstname',`middlename`='$middlename',`lastname`='$lastname',`gender`='$gender',`contact`='$contact',`address`='$address',`email`='$email',`password`='$password' WHERE id='$id'";
	$query=mysqli_query($db,$sql);
	header('location:profile.php');
}
?>