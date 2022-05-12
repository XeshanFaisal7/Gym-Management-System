<?php
include('navbar.php');
?>
<h3></b>Joiners Who Hired Me</b></h3>
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">BMI</th>
      <th scope="col">Height</th>
      <th scope="col">Mass</th>
      <th scope="col">Age</th>
      <th scope="col">Session</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$trainer_id=$row['trainer_id'];
    $query="SELECT * FROM `booked_packages` WHERE `trainer_id`='$trainer_id'";
    $result=mysqli_query($db,$query);
    $i=1;
    while($rows=mysqli_fetch_assoc($result))
    {
     $joiner_id=$rows['joiner_id'];
     $joiner_query="SELECT * FROM `joiners` WHERE `joiner_id`='$joiner_id'";
     $joiner_result=mysqli_query($db,$joiner_query);
    while($joiner_row=mysqli_fetch_assoc($joiner_result))
    {
    ?>
     <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $joiner_row['firstname'] ?> <?php echo $joiner_row['middlename'] ?> <?php echo $joiner_row['lastname']?></td>
      <td><?php echo $joiner_row['email'] ?></td>
      <td><?php echo $joiner_row['contact'] ?></td>
      <td><?php echo $joiner_row['bmi'] ?></td>
      <td><?php echo $joiner_row['height'] ?> cm</td>
      <td><?php echo $joiner_row['mass'] ?> kg</td>
      <td><?php echo $joiner_row['age'] ?> years</td>
      <td><?php echo $joiner_row['session'] ?></td>
    </tr>
    <?php
    $i++;
    }
    }
    	?>
    
  
  </tbody>
</table>

<?php
include('navbar_footer.php');
?>