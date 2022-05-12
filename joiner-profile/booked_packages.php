<?php include('navbar.php')?>
<h3><b>Booked Packages</b></h3>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Package</th>

      <th scope="col">Amount</th>
      <th scope="col">Plan</th>
      <th scope="col">Hired Trainer</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$joiner_id=$roww['joiner_id'];
  	$package_query="SELECT * FROM `booked_packages` WHERE `joiner_id`='$joiner_id'";

  	$result=mysqli_query($db,$package_query);
  	$total_rows=mysqli_num_rows($result);
  	$i=1;
  	if($total_rows>0)
  	{
    while ($data=mysqli_fetch_assoc($result)) 
    {
    ?>
    <th scope="row"><?php echo $i ?></th>
      <td><?php echo $data['package']?></td>
      <td><?php echo $data['amount']?>$</td>
      <td><?php echo $data['plan']?></td>
     	<?php
     	$trainer_id=$data['trainer_id'];
  	$trainer_query="SELECT * FROM `trainers` WHERE `trainer_id`='$trainer_id'";
  	$trainer_result=mysqli_query($db,$trainer_query); 
  	$trainer_row=mysqli_fetch_assoc($trainer_result);
  	$trainer_id=$trainer_row['name'];
   ?>
       <td><?php echo $trainer_row['name']?></td>
     <?php
     $current_date=date("Y-m-d");
     if($data['expiry_date']>$current_date)
     {
     ?>
     <td><button type="button" class="btn btn-success" readonly>Active</button></td>
     <?php
     }
     else
     {
      ?>
      <td> <button type="button" class="btn btn-danger" readonly>Expired</button></td>
      <?php
     }	
     ?>  
      <td> <a href="daily_workout_instructions.php" type="button" class="btn btn-warning" style="color: #FFFFFF"> Daiy Workout Instructions</a></td>  
    <?php
    $i++;	# code...
    }
  	}	
  	?>
    
  
  </tbody>
</table>
<?php include('navbar_footer.php')?>