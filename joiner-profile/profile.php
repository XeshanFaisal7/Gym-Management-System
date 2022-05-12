<?php 
include('navbar.php');
$edit_state=false;	

$query="SELECT * FROM `joiners` WHERE `email`='$user_check' OR `joiner_id`='$user_check'";



  $result=mysqli_query($db,$query);
  $row=mysqli_fetch_assoc($result);
  $id=$row['id'];
  $firstname=$row['firstname'];
  $middlename=$row['middlename'];
  $lastname=$row['lastname'];
  $contact=$row['contact'];
  $address=$row['address'];
   $email=$row['email'];
  $password=$row['password'];
  $gender=$row['gender'];
  

if(isset($_GET['edit']))   
{
  $edit_state=true;	 
  $id=$_GET['edit'];

  $query="SELECT * FROM `joiners` WHERE id='$id'";

  $result=mysqli_query($db,$query);
  $row=mysqli_fetch_assoc($result);
   $id=$row['id'];
  $firstname=$row['firstname'];
  $middlename=$row['middlename'];
  $lastname=$row['lastname'];
  $contact=$row['contact'];
  $address=$row['address'];
   $email=$row['email'];
  $password=$row['password'];
  $gender=$row['gender'];

  
}
?>

 <?php if($edit_state==true):?>
 	<h2 class="mb-4">Edit Profile</h2>

 <?php else : ?>
 	<h2 class="mb-4"><?php echo $row['firstname'] ?> Profile <span><a href="profile.php?edit=<?php echo $row['id']?>" class="badge badge-warning float-right"><i class="fa fa-eye"></i>Edit</a></span></h2>
 <?php endif ?>	

	
<form method="POST" enctype="multipart/form-data" action="profile_request.php">
  <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <label for="exampleFormControlInput1">First Name</label>
    <?php if($edit_state==true):?>
   
    	<input type="text" name="firstname" class="form-control" id="exampleFormControlInput1" placeholder="enter name" value="<?php echo $firstname  ?>" required>
    	<?php else : ?>
    		<input type="text" name="firstname" class="form-control" id="exampleFormControlInput1" placeholder="enter title" value="<?php echo $firstname ?>" readonly>
       <?php endif ?>	
    
  </div>
    <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <label for="exampleFormControlInput1">Middle Name</label>
    <?php if($edit_state==true):?>
   
      <input type="text" name="middlename" class="form-control" id="exampleFormControlInput1" placeholder="enter name" value="<?php echo $middlename  ?>" required>
      <?php else : ?>
        <input type="text" name="middlename" class="form-control" id="exampleFormControlInput1" placeholder="enter title" value="<?php echo $middlename ?>" readonly>
       <?php endif ?> 
    
  </div>
      <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <label for="exampleFormControlInput1">Last Name</label>
    <?php if($edit_state==true):?>
   
      <input type="text" name="lastname" class="form-control" id="exampleFormControlInput1" placeholder="enter name" value="<?php echo $lastname  ?>" required>
      <?php else : ?>
        <input type="text" name="lastname" class="form-control" id="exampleFormControlInput1" placeholder="enter title" value="<?php echo $lastname ?>" readonly>
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
      
      <input type="text" name="password" class="form-control" id="exampleFormControlInput1" placeholder="enter password" value="<?php echo $password ?>" readonly>
      <?php else : ?>
        <input type="text" name="password" class="form-control" id="exampleFormControlInput1" placeholder="enter password" value="<?php echo $password ?>" readonly>
       <?php endif ?> 
    
  </div>

   <div class="form-group">
  
    <label for="exampleFormControlInput1">Gender</label>
    <?php if($edit_state==true):?>
      <select name="gender" class="form-control" id="exampleFormControlInput1"   required>
        <option value="<?php echo $gender?>"><?php echo $gender?></option>
        <?php
        if($gender=='male')
          {
         ?>
          <option value="female">Female</option>   
         <?php   
          }
        else
         {
         ?>
          <option value="male">Male</option>
         <?php

         } 
         ?>
      </select> 
      
      <?php else : ?>
        <input type="text" name="gender" class="form-control" id="exampleFormControlInput1" placeholder="enter gender" value="<?php echo $gender ?>" readonly>
       <?php endif ?> 
    
  </div>
   <div class="form-group">
  
    <label for="exampleFormControlInput1">Address</label>
    <?php if($edit_state==true):?>
      
      <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="enter birthday" value="<?php echo $address ?>" required>
      <?php else : ?>
        <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="enter gender" value="<?php echo $address ?>" readonly>
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