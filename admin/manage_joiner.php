<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM joiners where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
	<form action="" id="manage-joiner">
		<div id="msg"></div>
				<input type="hidden" name="id" id="id" value="<?php echo isset($_GET['id']) ? $_GET['id']:'' ?>" class="form-control">
				 <div id="error_message" class="p-3 mb-2 bg-danger text-white" style="color:#C70039 ;  margin-bottom: 20px; padding: 10px; border-radius: 25px; margin-top: 15px;display: none" ></div>
		<div class="row form-group">

			<div class="col-md-4">
						<label class="control-label">ID No.</label>
						<input type="number" name="joiner_id" class="form-control" value="<?php echo isset($joiner_id) ? $joiner_id:'' ?>" >
						<small><i>Leave this blank if you want to a auto generate ID no.</i></small>
					</div>
		</div>
		<h5>PERSONAL DETAILS</h5>
		<div class="row form-group">
			
			<div class="col-md-4">
				<label class="control-label">First Name</label>
				<input type="text" name="firstname" id="firstname" placeholder="Enter First Name" class="form-control" value="<?php echo isset($firstname) ? $firstname:'' ?>" required>
			</div>
			<div class="col-md-4">
				<label class="control-label">Middle Name</label>
				<input type="text" name="middlename" id="middlename" placeholder="Enter Middle Name" class="form-control" value="<?php echo isset($middlename) ? $middlename:'' ?>">
			</div>
			<div class="col-md-4">
				<label class="control-label">Last Name</label>
				<input type="text" name="lastname" id="lastname" placeholder="Enter Last Name" class="form-control" value="<?php echo isset($lastname) ? $lastname:'' ?>" required>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-4">
				<label class="control-label">Email</label>
				<input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" value="<?php echo isset($email) ? $email:'' ?>" required>
			</div>
			<div class="col-md-4">
				<label class="control-label">Contact #</label>
				<input type="number" name="contact" id="contact" placeholder="Enter Phone #" class="form-control" value="<?php echo isset($contact) ? $contact:'' ?>" required>
			</div>
			<div class="col-md-4">
				<label class="control-label">Gender</label>
				<select name="gender" id="gender" required="" placeholder="Select Gender" class="custom-select" id="">
					<option <?php echo isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
					<option <?php echo isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
				</select>
			</div>
		</div>
		
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Address</label>
				<textarea name="address" id="address" placeholder="Enter Your Address" class="form-control"><?php echo isset($address) ? $address : '' ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-6">
				<label class="control-label">Status</label>
				<select name="status" id="status" required="" placeholder="Select Status" class="custom-select" id="">
					<option <?php echo isset($status) && $status == 'Active' ? 'selected' : '' ?>>Active</option>
					<option <?php echo isset($status) && $status == 'DeActive' ? 'selected' : '' ?>>DeActive</option>
				</select>
			</div>
			<div class="col-md-6">
				<label class="control-label">Session Timings</label>
				<select name="session" id="session" required="" placeholder="Select Session" class="custom-select" id="">
					<option <?php echo isset($session) && $session == '' ? 'selected' : '' ?>>Select Session Timings</option>
					<option <?php echo isset($session) && $session == '9:00-11:00' ? 'selected' : '' ?>>9:00-11:00</option>
					<option <?php echo isset($session) && $session == '13:00-15:00' ? 'selected' : '' ?>>13:00-15:00</option>
					<option <?php echo isset($session) && $session == '17:00-19:00' ? 'selected' : '' ?>>17:00-19:00</option>
					<option <?php echo isset($session) && $session == '20:00-22:00' ? 'selected' : '' ?>>20:00-22:00</option>
				</select>
				<p style="font-size: 12px">Timing of sessiom is in 24-Hours Format</p>
			</div>
		</div>
		
		<h5>PHYSIQUE PORTION</h5>
		<div class="row form-group">
			<div class="col-md-3">
				<label class="control-label">BMI</label>
				<input type="number" name="BMI" id="BMI" placeholder="Enter YOUR BMI" class="form-control" value="<?php echo isset($bmi) ? $bmi:'' ?>" required>

			</div>
			<div class="col-md-3">
				<label class="control-label">Height</label>
				<input type="text" name="height" id="height" placeholder="in cm" class="form-control" value="<?php echo isset($height) ? $height:'' ?>" required>
			</div>
			<div class="col-md-3">
				<label class="control-label">Mass</label>
				<input type="text" name="mass" id="mass"  class="form-control" placeholder="Enter Your Mass Weight" value="<?php echo isset($mass) ? $mass:'' ?>" required>
			</div>
			<div class="col-md-3">
				<label class="control-label">Age</label>
				<input type="number" placeholder="What's Your Age?" name="age" id="age" class="form-control" value="<?php echo isset($age) ? $age:'' ?>" required>
			</div>
			
			
		</div>
	</form>
</div>

<script>
	$('#manage-joiner').submit(function(e){
		

		 var firstname=document.getElementById('firstname').value;
		 var id=document.getElementById('id').value;

      
       var middlename=document.getElementById('middlename').value;

        var lastname=document.getElementById('lastname').value;
        var email=document.getElementById('email').value;

       var contact=document.getElementById('contact').value;
       var gender=document.getElementById('gender').value;  
       var address=document.getElementById('address').value;  
     var body_mass=document.getElementById('BMI').value;
     var height=document.getElementById('height').value;
     var mass=document.getElementById('mass').value;
     var age=document.getElementById('age').value;
     var status=document.getElementById('status').value;

     var text ;
       if(firstname.length<1 || middlename.length<1 || lastname.length <1 || email.length <1 || contact.length<1 || contact.length!=11 || gender.length<1 || address.length<1 ||session.length<1 || body_mass.length<1 || height.length<1 || mass.length<1 || age.length<1 || status.length<1)
       	 {
       error_message.style.display='block';
       }
       
       if(firstname.length<1)
        {
       text="Please Enter Valid First Name ";
       error_message.innerHTML=text;
       return false; 
        }
    
    if(middlename.length<1)
        {
       text="Please Enter Valid Middle Name ";
       error_message.innerHTML=text;
       return false; 
        }

        if(lastname.length<1)
        {
       text="Please Enter Valid Last Name ";
       error_message.innerHTML=text;
       return false; 
        }

        if(email.length<1)
        {
       text="Please Enter Valid Email ";
       error_message.innerHTML=text;
       return false; 
        }

        if(contact.length != 11)
        {
      text="Please Enter Valid Phone Number(XXXXXXXXXX)";
      error_message.innerHTML=text;
        return false;
        }

        if(gender.length <1)
        {
      text="Please Select Gender";
      error_message.innerHTML=text;
        return false;
        }

        if(address.length <1)
        {
      text="Please Enter Your Address";
      error_message.innerHTML=text;
        return false;
        }
        
          if(status.length <1)
        {
      text="Please Select Status";
      error_message.innerHTML=text;
        return false;
        }

         if(session.length <1)
        {
      text="Please Select Session Timings";
      error_message.innerHTML=text;
        return false;
        }


        if(body_mass.length <1)
        {
      text="Please Enter Your Body Mass Index";
      error_message.innerHTML=text;
        return false;
        }

      //   if(height.length <1)
      //   {
      // text="Please Enter Your Height In CM";
      // error_message.innerHTML=text;
      //   return false;
      //   }

         if(mass.length <1)
        {
      text="Please Enter Your Mass in KG";
      error_message.innerHTML=text;
        return false;
        }

          if(age.length <1)
        {
      text="Please Enter Your Age";
      error_message.innerHTML=text;
        return false;
        }

       
         if(id.length>0)
         {
         	e.preventDefault()
		start_load()
         	$.ajax({
			url:'ajax.php?action=update_joiner',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				
				if(resp == 1){
					alert_toast("Data successfully Updated.",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}else if(resp == 2){
					$('#msg').html('<div class="alert alert-danger">ID No already existed.</div>')
					end_load();
				}
			}
		})
         } 
         else
         {  
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_joiner',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				
				if(resp == 1){
					alert_toast("Data successfully saved.",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}else if(resp == 2){
					$('#msg').html('<div class="alert alert-danger">ID No already existed.</div>')
					end_load();
				}
			}
		})
	}
	})
</script>