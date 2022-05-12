<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-package">
				<div class="card">
					<div class="card-header">
						   New Package Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div id="error_message" class="p-3 mb-2 bg-danger text-white" style="color:#C70039 ;  margin-bottom: 20px; padding: 10px; border-radius: 25px; margin-top: 15px; display: none;" ></div>
							<div class="form-group">
								<label class="control-label">Package ID</label>
								<input type="text" class="form-control" name="package_id" value="<?php echo mt_rand(1000,9999)?>" readonly>
							</div>
							<div class="form-group">
								<label class="control-label">Package Title</label>
								<input type="text" class="form-control" name="package" id="package" placeholder="Enter Package Name">
							</div>
							<div class="form-group">
								<label class="control-label">Select Plan</label>
								<select class="form-control" name="plan"  id="plan">
								<option value="1">1 Month</option>	
								<option value="3">3 Month</option>	
								<option value="6">6 Month</option>	
								<option value="9">9 Month</option>	
								<option value="12">12 Month</option>	
								</select>
								
							</div>
							<div class="form-group">
								<label class="control-label">Description</label>
								<textarea class="form-control" placeholder="Enter Services Included" cols="30" rows='3' name="description" wrap="hard" id="description"></textarea>
								<small>*Do Not Use Single Colon/Double Colon To Avoid Error*</small>
							</div>
							<div class="form-group">
								<label class="control-label">Amount</label>
								<input type="number" class="form-control text-left" placeholder="Enter Package Amount" step="any" name="amount" id="amount">
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
						<b>Package List</b>
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
									<th class="text-center">package</th>
									<th class="text-center">Amount</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$package = $conn->query("SELECT * FROM packages order by id asc");
								while($row=$package->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p>package: <b><?php echo $row['package'] ?></b></p>
										<p wrap="hard">Description: <small><b><?php echo $row['description'] ?></b></small></p>
										<p>Plan: <small><b><?php echo $row['plan'] ?> Months</b></small></p>
										
									</td>
									<td class="text-right">
										<b><?php echo number_format($row['amount'],2) ?></b>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_package" type="button" data-id="<?php echo $row['id'] ?>"  data-package_id="<?php echo $row['package_id'] ?>" data-package="<?php echo $row['package'] ?>"  data-plan="<?php echo $row['plan'] ?>" data-description="<?php echo $row['description'] ?>" data-amount="<?php echo $row['amount'] ?>" >Edit</button>
										<button class="btn btn-sm btn-danger delete_package" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
		$('#manage-package').get(0).reset()
		$('#manage-package input,#manage-package textarea').val('')
	}
	$('#manage-package').submit(function(e){

		 var package=document.getElementById('package').value;

		 var plan=document.getElementById('plan').value;

      
       var description=document.getElementById('description').value;

        var amount=document.getElementById('amount').value;
        
         var text ;
       if(package.length<1 || plan.length<1 || description.length<1 || amount.length<1)
       	 {
       error_message.style.display='block';
       }

       if(package.length<1)
        {
       text="Please Enter Valid Package Title ";
       error_message.innerHTML=text;
       return false; 
        }
         if(plan.length<1)
        {
       text="Please Select Plan ";
       error_message.innerHTML=text;
       return false; 
        }
         if(description.length<1)
        {
       text="Please Enter Description ";
       error_message.innerHTML=text;
       return false; 
        }
         if(amount.length<1)
        {
       text="Please Enter Package Amount";
       error_message.innerHTML=text;
       return false; 
        }
        
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_package',
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
	$('.edit_package').click(function(){
		start_load()
		var cat = $('#manage-package')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='package_id']").val($(this).attr('data-package_id'))
		cat.find("[name='package']").val($(this).attr('data-package'))
		cat.find("[name='plan']").val($(this).attr('data-plan'))
		cat.find("[name='description']").val($(this).attr('data-description'))
		cat.find("[name='amount']").val($(this).attr('data-amount'))
		end_load()
	})
	$('.delete_package').click(function(){
		_conf("Are you sure to delete this package?","delete_package",[$(this).attr('data-id')])
	})
	function delete_package($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_package',
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