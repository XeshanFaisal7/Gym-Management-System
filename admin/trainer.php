<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-trainer">
				<div class="card">
					<div class="card-header">
						    New Trainer Registration Form
				  	</div>
					<div class="card-body">
						 <div id="error_message" class="p-3 mb-2 bg-danger text-white" style="color:#C70039 ;  margin-bottom: 20px; padding: 10px; border-radius: 25px; margin-top: 15px;display: none" ></div>
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Trainer ID</label>
								<input type="text" class="form-control" name="trainer_id" value="<?php echo mt_rand(1000,9999)?>" readonly>
							</div>
							<h4><b>PERSONAL DETAILS</b></h4>
							<div class="form-group">
								<label class="control-label">Name</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name">
							</div>
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="email" class="form-control" name="email" id="email"  placeholder="xxxxxxx@gmail.com">
							</div>
							<div class="form-group">
								<label class="control-label">Contact</label>
								<input type="text" class="form-control" name="contact" id="contact" placeholder="XXXX-XXXXXXX">
							</div>
							<h4><b>EXPERIENCE</b></h4>
							<div class="form-group">
								<label class="control-label">Years Of Experiences</label>
								<input type="number" class="form-control" name="experience_years" id="experience_years" placeholder="No. Of Years">
							</div>
							<div class="form-group">
								<label class="control-label">Area Of Expertise</label>
								<input type="text" class="form-control" name="area" id="area" placeholder="Enter Area Of Expertise">

							</div>
							<h4><b>SESSION TIMINGS</b></h4>
							<div class="form-group">
								<label class="control-label">Starting Time</label>
								<input type="text" class="form-control text-left" name="starting_time" placeholder="Please Enter your starting time" id="starting_time">
								<p style="font-size: 11px">*Please Enter Timing as 24-Hour Format e.g :15:00*</p>
							</div>
							<div class="form-group">
								<label class="control-label">Ending Time</label>
								<input type="text" class="form-control text-left" name="ending_time" placeholder="Please Enter your ending time" id="ending_time">
								<p style="font-size: 11px">*Please Enter Timing as 24-Hour Format e.g :15:00*</p>
							</div>
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b>List of Trainers</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Information</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$trainer = $conn->query("SELECT * FROM trainers order by id asc");
								while($row=$trainer->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p><i class="fa fa-user"></i> <b><?php echo $row['name'] ?></b></p>
										<p><small>Email: <b><?php echo $row['email'] ?></b></small></p>
										<p><small>Phone: <b><?php echo $row['contact'] ?></b></small></p>
										<p><small>Experience: <b><?php echo $row['experience_years'] ?> years</b></small></p>
										<p><small>Area Of Expertise: <b><?php echo $row['area'] ?></b></small></p>
										<p><small>Session Timing: <b><?php echo $row['starting_time'] ?></b>-<b><?php echo $row['ending_time'] ?></b></small></p>
										
										
										
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_trainer" type="button" data-id="<?php echo $row['id'] ?>" data-trainer_id="<?php echo $row['trainer_id'] ?>"  data-name="<?php echo $row['name'] ?>" data-email="<?php echo $row['email'] ?>" data-contact="<?php echo $row['contact'] ?>" data-experience_years="<?php echo $row['experience_years'] ?>" data-area="<?php echo $row['area'] ?>" data-starting_time="<?php echo $row['starting_time'] ?> " data-ending_time="<?php echo $row['ending_time'] ?>">Edit</button>
										<button class="btn btn-sm btn-danger delete_trainer" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin:unset;
	}
</style>
<script>
	function _reset(){
		$('#manage-trainer').get(0).reset()
		$('#manage-trainer input,#manage-trainer textarea').val('')
	}
	$('#manage-trainer').submit(function(e){

		 var name=document.getElementById('name').value;
		 var email=document.getElementById('email').value;

      
       var contact=document.getElementById('contact').value;

        var experience_years=document.getElementById('experience_years').value;
        var area=document.getElementById('area').value;

       var starting_time=document.getElementById('starting_time').value;
       var ending_time=document.getElementById('ending_time').value; 
  
      
     var text ;
       if(name.length<1 || email.length<1 || contact.length <1 || experience_years.length <1 || area.length<1 || starting_time.length!=11 || ending_time.length<1 )
       	 {
       error_message.style.display='block';
       }
       
       if(name.length<1)
        {
       text="Please Enter Valid Name ";
       error_message.innerHTML=text;
       return false; 
        }
        if(email.length<1)
        {
       text="Please Enter Valid Email ";
       error_message.innerHTML=text;
       return false; 
        }
        if(contact.length<1)
        {
       text="Please Enter Valid Contact Number ";
       error_message.innerHTML=text;
       return false; 
        }
         if(contact.length>1 && contact.length!=13)
        {
       text="Please Enter Contact Number WIth Country Code(+XXXXXXXXXXXX)";
       error_message.innerHTML=text;
       return false; 
        }
        if(experience_years.length<1)
        {
       text="Please Enter Years Of Experience";
       error_message.innerHTML=text;
       return false; 
        }
        if(area.length<1)
        {
       text="Please Enter Area Of Expertise ";
       error_message.innerHTML=text;
       return false; 
        }
        if(starting_time.length<1)
        {
       text="Please Enter Starting Time";
       error_message.innerHTML=text;
       return false; 
        }
        if(ending_time.length<1)
        {
       text="Please Enter Ending Time ";
       error_message.innerHTML=text;
       return false; 
        }
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_trainer',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
		
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_trainer').click(function(){
		start_load()
		var cat = $('#manage-trainer')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='trainer_id']").val($(this).attr('data-trainer_id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='email']").val($(this).attr('data-email'))
		cat.find("[name='contact']").val($(this).attr('data-contact'))
		cat.find("[name='experience_years']").val($(this).attr('data-experience_years'))
		cat.find("[name='area']").val($(this).attr('data-area'))
		cat.find("[name='starting_time']").val($(this).attr('data-starting_time'))
		cat.find("[name='ending_time']").val($(this).attr('data-ending_time'))
		end_load()
	})
	$('.delete_trainer').click(function(){
		_conf("Are you sure to delete this trainer?","delete_trainer",[$(this).attr('data-id')])
	})
	function delete_trainer($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_trainer',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	$('table').dataTable()
</script>