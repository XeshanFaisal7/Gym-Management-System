<?php
include('navbar.php');
?>
<h3><B>DAILY WORKOUT INFORMATION </h3>
<?php 
$joiner_id=$roww['joiner_id'];

$query="SELECT * FROM `post_workout_information` WHERE `joiner_id`='$joiner_id'";
$result=mysqli_query($db,$query);
if($rows>0)
{
while($rows=mysqli_fetch_assoc($result))
{
	$package_id=$rows['package_id'];
$package_query="SELECT * FROM `packages` WHERE `package_id`='$package_id'";
$package_result=mysqli_query($db,$package_query);
$package_row=mysqli_fetch_assoc($package_result);
$package=$package_row['package'];

	$trainer_id=$rows['trainer_id'];
$trainer_query="SELECT * FROM `trainers` WHERE `trainer_id`='$trainer_id'";

$trainer_result=mysqli_query($db,$trainer_query);
$trainer_row=mysqli_fetch_assoc($trainer_result);
$trainer=$trainer_row['name'];
?>
<h2><?php echo $package ?><small style="float: right;"><?php echo $rows['date']?></small></h2>	 	
<h4><?php echo $trainer?></h4>	
<p><?php echo $rows['information']?></p>
<?php
}
}
else
{
?>
<h2>No Information Found</h2>	 	

<?php	
}
include('navbar_footer.php');
?>