<?php

include('navbar.php');

?>
<h3><B>POST DAILY WORKOUT INFORMATION </h3>

	<form method="post" action="workout_information_request.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Select Joiner</label>
    <SELECT class="form-control"   name="joiner" required>
    <OPTION value="">Select Joiner</OPTION>
    <?php
  	$trainer_id=$row['trainer_id'];
    $query="SELECT * FROM `booked_packages` WHERE `trainer_id`='$trainer_id'";
    $result=mysqli_query($db,$query);
    $i=1;
    while($rows=mysqli_fetch_assoc($result))
    {
    	 $joiner_id=$rows['joiner_id'];
     $joiner_query="SELECT * FROM `joiners` WHERE `joiner_id`='$joiner_id' AND `status`='Active'";
     $joiner_result=mysqli_query($db,$joiner_query);
    while($joiner_row=mysqli_fetch_assoc($joiner_result))
    {
    ?>
    <option value="<?php echo $joiner_row['joiner_id']?>"><?php echo $joiner_row['firstname'] ?> <?php echo $joiner_row['middlename'] ?> <?php echo $joiner_row['lastname']?></option>
    <?php
    }	
    
    }?>
    	
    </SELECT> 
    <small id="emailHelp" class="form-text text-muted">*Select Joiner to post information about workout*</small>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Select Package</label>
    <select class="form-control" name="package" required>
    <option value="">Select Package</option>
    <?php
  	$trainer_id=$row['trainer_id'];
  	$current_date=date('Y-m-d');
    $query="SELECT * FROM `booked_packages` WHERE `trainer_id`='$trainer_id' AND `expiry_date`>$current_date";

    $result=mysqli_query($db,$query);

    while($rows=mysqli_fetch_assoc($result))
    {
    	
    ?>
    <option value="<?php echo $rows['package_id']?>"><?php echo $rows['package'] ?> </option>
    <?php

    }
    ?>
    	
    </select> 
    <small id="emailHelp" class="form-text text-muted">*Select Appropriate Package according to selected joiner to avoid error*</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Date</label>
    <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d')?>" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Workout Information</label>
    <textarea rows="3" cols="5" class="form-control" wrap="hard" id="exampleInputPassword1" name="information" placeholder="Enter information" required></textarea>
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<?php
include('navbar_footer.php');
?>