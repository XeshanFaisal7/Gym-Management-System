<?php
include('../connection.php');

if(isset($_POST['update']))
{
  $id=$_POST['id'];
  $bmi=$_POST['bmi'];
  $height=$_POST['height'];
  $mass=$_POST['mass'];
  $age=$_POST['age'];
	$sql="UPDATE `joiners` SET `bmi`='$bmi',`height`='$height',`mass`='$mass',`age`='$age' WHERE id='$id'";
	$query=mysqli_query($db,$sql);
	header('location:physique.php');
}
?>