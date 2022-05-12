<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM joiners where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<h3 style="color: #0080FF"><b>PERSONAL DETAILS</b></h3>
			<p>Name: <b><?php echo ucwords($name) ?></b></p>
			<p>Gender: <b><?php echo ucwords($gender) ?></b></p>
			<p>Email: </i> <b><?php echo $email ?></b></p>
			<p>Contact: </i> <b><?php echo $contact ?></b></p>
			<p>Address: </i> <b><?php echo $address ?></b></p>
			<p>Status: </i> <b><?php echo $status ?></b></p>
			<p>Session Timings: </i> <b><?php echo $session ?> <small style="font-size: 10px">(24-Hours Format)</small></b></p>
		</div>
		<div class="col-md-6">
			<h3 style="color: #0080FF"><b>PHYSIQUE DETAILS</b></h3>
			<p>BMI: <b><?php echo ucwords($bmi) ?></b></p>
			<p>HEIGHT: <b><?php echo ucwords($height) ?> CM</b></p>
			<p>MASS: </i> <b><?php echo $mass ?> KG</b></p>
			<p>AGE: </i> <b><?php echo $age ?> years Old</b></p>
			
		</div>
		
	</div>
</div>
<div class="modal-footer display">
	<div class="row">
		<div class="col-md-12">
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
<style>
	p{
		margin:unset;
	}
	#uni_modal .modal-footer{
		display: none;
	}
	#uni_modal .modal-footer.display {
		display: block;
	}
</style>
<script>
	
</script>