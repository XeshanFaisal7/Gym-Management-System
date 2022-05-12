<?php
$db=mysqli_connect('localhost','root','','gym_db');
$output="";
$Search = $_POST['trainer_id'];
$result=mysqli_query($db,"SELECT * FROM `trainers` WHERE `trainer_id` LIKE '%$Search%'  
     order by `id` DESC ");
$total_rows=mysqli_num_rows($result);
$i=1;
if($total_rows>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
  $output.='
   <img class="card-img-top" src="images/trainer.jpg" alt="Card image cap">
  <div class="card-body">

    <h5 class="card-title"><small>Name:</small><b>'.$row['name'].'</b></h5>
    <p class="card-text" ><small>Area Of Expertise:</small> <span style="#151515">'.$row['area'].'</span></p>
    <p class="card-text"><small>Experience:</small> '.$row['experience_years'].'years</p>
    <p class="card-text"><small>Session Timings:</small> '.$row['starting_time'].'-'.$row['ending_time'].'</p>

  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">'.$row['email'].'</li>
    <li class="list-group-item">'.$row['contact'].'</li>
     <li class="list-group-item" style="background-color:#2EFE2E;color:#FFFFFF;font-size:20px">SELECTED</li>  
  </ul>
  
   ';
 }
 echo $output;
}
else
{
 $output.='No trainer Found';
 echo $output;
}	