
<?php
include('../user_session.php');
if(!isset($user_check))
{
header("location:../login-joiner.php?Invalid=Please Login First");
exit(); // Redirecting To Login Page
}

$db=mysqli_connect('localhost','root','','gym_db');
$count=0;
 $current_date = date('Y-m-d');


$query="SELECT * FROM `announcements` WHERE `date_created`='$current_date' AND `audience`='joiners' order by id DESC";


$result=mysqli_query($db,$query);
$rows=mysqli_num_rows($result);

if($rows>0)
   {
while($row=mysqli_fetch_assoc($result))
 {
$announcement_id=$row['id'];

$announcement_title=$row['announcement_title'];
$announcement=$row['announcement'];
$audience=$row['audience'];
$get_data="SELECT * FROM `admin_announcement` WHERE announcement_id='$announcement_id'";

$data_query=mysqli_query($db,$get_data);
$data_rows=mysqli_num_rows($data_query);

if($data_rows>0)
{
 $query1="UPDATE `admin_announcement` SET `announcement_id`='$announcement_id',`announcement_title`='$announcement_title',`audience`='$audience',`announcement`='$announcement',`status`='1' WHERE `announcement_id`='$announcement_id'";

 $result1=mysqli_query($db,$query1);
  
}
else
{
$query2 = "INSERT INTO `admin_announcement`(`announcement_id`,`announcement_title`,`audience`, `announcement`,`status`) VALUES ('$announcement_id','$announcement_title','$audience','$announcement','0')";


$result2=mysqli_query($db,$query2);
   }
 }

}
 $sql3="SELECT * FROM `admin_announcement` WHERE status = 0";
$result3=mysqli_query($db, $sql3);
$count=mysqli_num_rows($result3);
?>
<style type="text/css">
  .notifications-item {
    display: flex;
    border-bottom: 1px solid #eee;
    padding: 6px 9px;
    margin-bottom: 0px;
    cursor: pointer
}

.notifications-item:hover {
    background-color: #eee
}

.notifications-item img {
    display: block;
    width: 50px;
    height: 50px;
    margin-right: 9px;
    border-radius: 50%;
    margin-top: 2px
}

.notifications-item .text h4 {
    color: #777;
    font-size: 16px;
    margin-top: 3px
}

.notifications-item .text p {
    color: #aaa;
    font-size: 12px
}
</style>
<!doctype html>
<html lang="en">
  <head>
  	<title>Joiner Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="Assets/navbar/css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a  class="img logo rounded-circle mb-5" style="background-image: url(Assets/navbar/images/user.png);"></a>
           <h5 style="color: #FFFFFF ; text-align: center;"><?php echo $roww['firstname']?> <?php echo $roww['middlename']?> <?php echo $roww['lastname']?></h5>

	        <ul class="list-unstyled components mb-5">
	          
              <li class="nav-item active">
                <a href="profile.php">My Profile</a>
            </li>
	          <li>
	              <a href="physique.php">Physique</a>
	          </li>
            <li>
                <a href="packages.php">Packages</a>
            </li>
             <li>
                <a href="booked_packages.php">Booked Packages</a>
            </li>
          
              <li>
                <a href="logout.php">Logout</a>
            </li>
          
	      
	        </ul>

	       
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
               
                <li class="nav-item active" >
                    <a class="nav-link" href="profile.php">My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="physique.php">Physique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="packages.php">Packages</a>
                </li>
                
                 <li class="nav-item">
                    <a class="nav-link" href="booked_packages.php">Booked Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="Announcement_Function()"> 
                      <span class="badge badge-secondary" id="announcement-count">
                <?php if($count>0) { echo $count; } ?>   
                </span>
                <i class="fa fa-bell" style="color: #008EC7"></i> Announcements</a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" 
              style="height:400px;width:390px;overflow: scroll;">
                <div id="announcement-latest">
                                                    
              </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
<script type="text/javascript">
   function Announcement_Function() 
         {
         
    $.ajax({
      url: "view_announcement.php",
      type: "POST",
      method:"POST",
      processData:false,
      success: function(data){
        $("#announcement-count").remove();          
        $("#announcement-latest").show();
        $("#announcement-latest").html(data);
        
      },
      error: function(){}           
    });
   }

</script>
      


       
     

  