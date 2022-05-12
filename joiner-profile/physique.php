<?php 
include('navbar.php');
$edit_state=false;	

$query="SELECT * FROM `joiners` WHERE `email`='$user_check' OR joiner_id='$user_check'";


  $result=mysqli_query($db,$query);
  $row=mysqli_fetch_assoc($result);
  $id=$row['id'];
  $bmi=$row['bmi'];
  $height=$row['height'];
  $mass=$row['mass'];
  $age=$row['age'];
  
  

if(isset($_GET['edit']))   
{
  $edit_state=true;	 
  $id=$_GET['edit'];

  $query="SELECT * FROM `joiners` WHERE id='$id'";

  $result=mysqli_query($db,$query);
  $row=mysqli_fetch_assoc($result);
   $id=$row['id'];
  $bmi=$row['bmi'];
  $height=$row['height'];
  $mass=$row['mass'];
  $age=$row['age'];

  
}
?>

 <?php if($edit_state==true):?>
 	<h2 class="mb-4">Edit Physique</h2>

 <?php else : ?>
 	<h2 class="mb-4"><?php echo $row['firstname'] ?> PHYSIQUE <span><a href="physique.php?edit=<?php echo $row['id']?>" class="badge badge-warning float-right"><i class="fa fa-eye"></i>Edit</a></span></h2>
 <?php endif ?>	

	
<form method="POST" enctype="multipart/form-data" action="physique_request.php">
  <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <label for="exampleFormControlInput1">Your Age</label>
    <?php if($edit_state==true):?>
   
    	<input type="text" name="age" class="form-control" id="exampleFormControlInput1" placeholder="enter name" value="<?php echo $age  ?>" required>
    	<?php else : ?>
    		<input type="text" name="age" class="form-control" id="exampleFormControlInput1" placeholder="enter title" value="<?php echo $age ?>" readonly>
       <?php endif ?>	
    
  </div>
    <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <label for="exampleFormControlInput1">Your Height</label>
    <?php if($edit_state==true):?>
   
      <input type="text" name="height" class="form-control" id="exampleFormControlInput1" placeholder="enter name" value="<?php echo $height  ?>" required>
      <?php else : ?>
        <input type="text" name="height" class="form-control" id="exampleFormControlInput1" placeholder="enter title" value="<?php echo $height ?>" readonly>
       <?php endif ?> 
    
  </div>
      <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <label for="exampleFormControlInput1">Your Weight</label>
    <?php if($edit_state==true):?>
   
      <input type="text" name="mass" class="form-control" id="exampleFormControlInput1" placeholder="enter name" value="<?php echo $mass  ?>" required>
      <?php else : ?>
        <input type="text" name="mass" class="form-control" id="exampleFormControlInput1" placeholder="enter title" value="<?php echo $mass ?>" readonly>
       <?php endif ?> 
    
  </div>
   <div class="form-group">
  
    <label for="exampleFormControlInput1">BMI (Body Mass Index)</label>
    <?php if($edit_state==true):?>
      
      <input type="text" name="bmi" class="form-control" id="exampleFormControlInput1" placeholder="enter email" value="<?php echo $bmi ?>" required>
      <?php else : ?>
        <input type="text" name="bmi" class="form-control" id="exampleFormControlInput1" placeholder="enter email" value="<?php echo $bmi ?>" readonly>
       <?php endif ?> 
    
  </div>

 

 

  	<?php if($edit_state==true):?>
							<button align="text-center" class="btn btn-success" type="submit" name="update">Update</button>
							 <?php else : ?>
						
							<?php endif ?> 	
</form>
    
<?php
include('navbar_footer.php')
?>