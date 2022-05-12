<?php 
include('navbar.php');
$edit_state=false;	

$query="SELECT * FROM `trainers` WHERE `email`='$user_check' OR `trainer_id`='$user_check'";


  $result=mysqli_query($db,$query);
  $trainer_data=mysqli_fetch_assoc($result);
  $id=$trainer_data['id']; 
  $password=$trainer_data['password'];
  $name=$trainer_data['name'];
  $email=$trainer_data['email'];
  $contact=$trainer_data['contact'];
  $experience_years=$trainer_data['experience_years']; 
  $area=$trainer_data['area']; 
  $starting_time=$trainer_data['starting_time'];
  $ending_time=$trainer_data['ending_time'];
  

if(isset($_GET['edit']))   
{
  $edit_state=true;	 
  $id=$_GET['edit'];

  $query="SELECT * FROM `trainers` WHERE id='$id'";

  $result=mysqli_query($db,$query);
  $edit=mysqli_fetch_assoc($result);
  $id=$edit['id']; 
  $password=$edit['password'];
  $name=$edit['name'];
  $email=$edit['email'];
  $contact=$edit['contact'];
  $experience_years=$edit['experience_years']; 
  $area=$edit['area']; 
  $starting_time=$edit['starting_time'];
  $ending_time=$edit['ending_time'];

  
}
?>

 <?php if($edit_state==true):?>
 	<h2 class="mb-4">Edit Profile</h2>

 <?php else : ?>
 	<h2 class="mb-4"><?php echo $row['name'] ?> Profile <span><a href="profile.php?edit=<?php echo $row['id']?>" class="badge badge-warning float-right"><i class="fa fa-eye"></i>Edit</a></span></h2>
 <?php endif ?>	

	
<form method="POST" enctype="multipart/form-data" action="profile_request.php">
  <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <label for="exampleFormControlInput1">Name</label>
    <?php if($edit_state==true):?>
   
    	<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="enter name" value="<?php echo $name  ?>" required>
    	<?php else : ?>
    		<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="enter title" value="<?php echo $name ?>" readonly>
       <?php endif ?>	
    
  </div>
     <div class="form-group">
  
    <label for="exampleFormControlInput1">Email</label>
    <?php if($edit_state==true):?>
      
      <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="enter email" value="<?php echo $email ?>" required>
      <?php else : ?>
        <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="enter email" value="<?php echo $email ?>" readonly>
       <?php endif ?> 
    
  </div>
   <div class="form-group">
  
    <label for="exampleFormControlInput1">Contact</label>
    <?php if($edit_state==true):?>
      
      <input type="text" name="contact" class="form-control" id="exampleFormControlInput1" placeholder="enter birthday" value="<?php echo $contact ?>" required>
      <?php else : ?>
        <input type="text" name="contact" class="form-control" id="exampleFormControlInput1" placeholder="enter gender" value="<?php echo $contact ?>" readonly>
       <?php endif ?> 
    
  </div>
   <div class="form-group">
  
    <label for="exampleFormControlInput1">Password</label>
    <?php if($edit_state==true):?>
      
      <input type="text" name="password" class="form-control" id="exampleFormControlInput1" placeholder="enter password" value="<?php echo $password ?>" required>
      <?php else : ?>
        <input type="text" name="password" class="form-control" id="exampleFormControlInput1" placeholder="enter password" value="<?php echo $password ?>" readonly>
       <?php endif ?> 
    
  </div>
    <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <label for="exampleFormControlInput1">Experience Years</label>
    <?php if($edit_state==true):?>
   
      <input type="text" name="experience_years" class="form-control" id="exampleFormControlInput1" placeholder="enter name" value="<?php echo $experience_years  ?>" required>
      <?php else : ?>
        <input type="text" name="experience_years" class="form-control" id="exampleFormControlInput1" placeholder="enter title" value="<?php echo $experience_years ?>" readonly>
       <?php endif ?> 
    
  </div>
      <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <label for="exampleFormControlInput1">Area/Field</label>
    <?php if($edit_state==true):?>
   
      <input type="text" name="area" class="form-control" id="exampleFormControlInput1" placeholder="enter name" value="<?php echo $area  ?>" required>
      <?php else : ?>
        <input type="text" name="area" class="form-control" id="exampleFormControlInput1" placeholder="enter title" value="<?php echo $area ?>" readonly>
       <?php endif ?> 
    
  </div>


  
   <div class="form-group">
  
    <label for="exampleFormControlInput1">Starting Time</label>
    <?php if($edit_state==true):?>
      
      <input type="text" name="starting_time" class="form-control" id="exampleFormControlInput1" placeholder="enter starting time" value="<?php echo $starting_time ?>" required>
      <?php else : ?>
        <input type="text" name="starting_time" class="form-control" id="exampleFormControlInput1" placeholder="enter in this field" value="<?php echo $starting_time ?>" readonly>
       <?php endif ?> 
    
  </div>
   <div class="form-group">
  
    <label for="exampleFormControlInput1">Ending Time</label>
    <?php if($edit_state==true):?>
      
      <input type="text" name="ending_time" class="form-control" id="exampleFormControlInput1" placeholder="enter Ending time" value="<?php echo $ending_time ?>" required>
      <?php else : ?>
        <input type="text" name="ending_time" class="form-control" id="exampleFormControlInput1" placeholder="enter in this field" value="<?php echo $ending_time ?>" readonly>
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