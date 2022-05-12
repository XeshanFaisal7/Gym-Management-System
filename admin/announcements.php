<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-announcement">
				<div class="card">
					<div class="card-header">
						    Add New Announcement 
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div id="error_message" class="p-3 mb-2 bg-danger text-white" style="color:#C70039 ;  margin-bottom: 20px; padding: 10px; border-radius: 25px; margin-top: 15px; display: none;" ></div>
							<div class="form-group">
								<label class="control-label">Announcement Title</label>
								<input type="text" class="form-control text-left" name="announcement_title" id="announcement_title" >
							</div>
							<div class="form-group">
								<label class="control-label">Audience</label>
								<select class="form-control" name="audience"  id="audience">
									<option value="">Select Audience</option>	
								<option value="joiners">Joiners</option>	
								<option value="trainers">Trainers</option>	
								</select>
								
							</div>
							<div class="form-group">
								<label class="control-label">Announcement</label>
								<textarea class="form-control text-left" rows="5" cols="2" step="any" name="announcement" id="announcement" wrap="hard"></textarea>
								<p style="font-size: 11px">Do Not Use These Symbols (single colon '',double colon "" )in announcement</p>
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
						<b>Announcement List</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<colgroup>
								<col width="5%">
								<col width="55%">
								<col width="20%">
								<col width="20%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Announcement</th>
									<th class="text-center">Audience</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$plan = $conn->query("SELECT * FROM announcements order by id asc");
								while($row=$plan->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p>Title: <b><?php echo $row['announcement_title'] ?></b></p>
										<p wrap="hard">Announcement: <b><?php echo $row['announcement'] ?></b></p>
									</td>
									<td class="text-right">
										<b><?php echo $row['audience'] ?></b>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_announcement" type="button" data-id="<?php echo $row['id'] ?>" data-announcement_title="<?php echo $row['announcement_title'] ?>" data-announcement="<?php echo $row['announcement'] ?>" data-audience="<?php echo $row['audience'] ?>" >Edit</button>
										<br><br>
										<button class="btn btn-sm btn-danger delete_announcement" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
</style>
<script>
	function _reset(){
		$('#manage-announcement').get(0).reset()
		$('#manage-announcement input,#manage-announcement textarea').val('')
	}
	$('#manage-announcement').submit(function(e){
		 var announcement_title=document.getElementById('announcement_title').value;

		 var audience=document.getElementById('audience').value;

      
       var announcement=document.getElementById('announcement').value;

         var text ;
       if(announcement_title.length<1 || audience.length<1 || announcement.length<1)
       	 {
       error_message.style.display='block';
       }

       if(announcement_title.length<1)
        {
       text="Please Enter Valid Announcement Title ";
       error_message.innerHTML=text;
       return false; 
        }

         if(audience.length<1)
        {
       text="Please Select Audience";
       error_message.innerHTML=text;
       return false; 
        }

         if(announcement.length<1)
        {
       text="Please Enter Announcement ";
       error_message.innerHTML=text;
       return false; 
        }

		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_announcement',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
			
				if(resp==1){
					alert_toast("Announcement successfully announced to Audience",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Announcement successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_announcement').click(function(){
		start_load()
		var cat = $('#manage-announcement')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='announcement_title']").val($(this).attr('data-announcement_title'))
		cat.find("[name='announcement']").val($(this).attr('data-announcement'))
		cat.find("[name='audience']").val($(this).attr('data-audience'))
		end_load()
	})
	$('.delete_announcement').click(function(){
		_conf("Are you sure to delete this Announcement?","delete_announcement",[$(this).attr('data-id')])
	})
	function delete_announcement($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_announcement',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Announcement successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	$('table').dataTable()
</script>