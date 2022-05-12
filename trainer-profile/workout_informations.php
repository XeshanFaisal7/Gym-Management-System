<?php
include('navbar.php');
?>
<h3><B>DAILY WORKOUT INFORMATION </h3>
<?php 
$trainer_id=$row['trainer_id'];
$query="SELECT * FROM `post_workout_information` WHERE `trainer_id`='$trainer_id'";
$result=mysqli_query($db,$query);

while($rows=mysqli_fetch_assoc($result))
{
	$package_id=$rows['package_id'];
$package_query="SELECT * FROM `packages` WHERE `package_id`='$package_id'";
$package_result=mysqli_query($db,$package_query);
$package_row=mysqli_fetch_assoc($package_result);
$package=$package_row['package'];

	$joiner_id=$rows['joiner_id'];
$joiner_query="SELECT * FROM `joiners` WHERE `joiner_id`='$joiner_id'";

$joiner_result=mysqli_query($db,$joiner_query);
$joiner_row=mysqli_fetch_assoc($joiner_result);
$joiner=$joiner_row['firstname'];
?>
<h2><?php echo $package ?><small style="float: right;"><?php echo $rows['date']?></small></h2>	 	
<h4><?php echo $joiner?></h4>	
<p><?php echo $rows['information']?></p>
<?php
}
include('navbar_footer.php');
?>