<?php include 'navbar.php'; 
require_once "config.php";
use \PhpPot\Service\StripePayment;

if(isset($_GET['id']))
{

$id=$_GET['id'];
$query="SELECT * FROM `packages` WHERE id='$id'";
$result=mysqli_query($db,$query);
$row=mysqli_fetch_assoc($result);
$package_id=$row['package_id'];
$package=$row['package'];
$description=$row['description'];
$amount=$row['amount'];
$plan=$row['plan'];
} 

?>

<div class="card bg-dark text-white">
  <img class="card-img" src="images/card-background.jpg" alt="Card image">
  <div class="card-img-overlay">
    <h1 class="card-title" style="color:#FF8000"><?php echo $package?></h1>
    <p class="card-text"><i><?php echo $description?></i></p>
    
     <p class="card-text" style="position: absolute;
  bottom: 0px;
  left: 16px;
  font-size: 72px;">
  <small style="font-size: 14px">Plan :</small><?php echo $plan?><small style="font-size: 14px">Months</small></p>
    <p class="card-text" style="position: absolute;
  bottom: 8px;
  right: 16px;
  font-size: 72px;"><small style="font-size: 14px">Price :</small><?php echo $amount?>$</p>

  </div>
</div>
<br>
<form method="POST" action="package_enrollment_request.php" id="form" enctype="multipart/form-data"> 
<div class="row">
  <div class="col-md-4">
     <h4>Select Trainer</h4>
    <select class="form-control" id="trainer" name="trainer" onchange="show_trainer()">
      <option value="">Pick Your Trainer</option>
    <?php
    $query='SELECT * FROM `trainers` order by `id` DESC';
    $result=mysqli_query($db,$query);
    while($row=mysqli_fetch_assoc($result))
    {
    ?>
    <option value="<?php echo $row['trainer_id']?>"><?php echo $row['name']?></option>  
    <?php  
    }  
    ?>
    </select>
  </div>
  <div class="col-md-4" id="payment_div" style="display: none">
    <h4>Select Payment Option</h4>
    <select class="form-control" id="payment_option" name="payment_option" onchange="return payment_dropdown()">
      <option value="">Select Option</option>
      <option value="credit_card">Credit Card/Debit Card</option>

      
    </select>
  </div>
 
</div>
<br>
<div class="row">
   <div class="col-md-4">
  <div class="card" style="width: 19rem; display: none" id="trainer_card">
 
  </div>
 
</div> 
  <div class="col-md-4">
  <div class="card" style="width: 19rem; display: none" id="payment_card">
  <img class="card-img-top" src="images/credit_card.jpg" alt="Card image cap">
  <div class="card-body">
    <div class="form-group">
                                <label>Card Holder Name</label> <span
                        id="card-holder-name-info" class="info"></span><br>
                    <input type="text" id="name" class="form-control" name="name"
                        class="demoInputBox">
   </div>
   <div class="form-group">
                               <label>Email</label> <span id="email-info"
                        class="info"></span><br> <input type="text"
                        id="email" name="email" class="form-control" class="demoInputBox">
   </div>
    <div class="form-group">
                               <label>Card Number</label> <span
                        id="card-number-info" class="info"></span><br> <input
                        type="text" id="credit_card_number" class="form-control" name="credit_card_number"
                        class="demoInputBox">
                            </div>
                <div class="row">
                         <div class="contact-row column-right">
                        <label>Expiry Month / Year</label> <span
                            id="userEmail-info" class="info"></span><br>
                        <select name="ccmonth" id="ccmonth"
                            class="form-group">
                            <option value="08">08</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> <select name="ccyear" id="ccyear"
                            class="form-group">
                            <option value="18">2018</option>
                            <option value="19">2019</option>
                            <option value="20">2020</option>
                            <option value="21">2021</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                            <option value="24">2024</option>
                            <option value="25">2025</option>
                            <option value="26">2026</option>
                            <option value="27">2027</option>
                            <option value="28">2028</option>
                            <option value="29">2029</option>
                            <option value="30">2030</option>
                        </select>
                    </div>
                   
                    </div>
                      <div class="form-group">
                               <label>CVC</label> <span
                        id="card-number-info" class="info"></span><br> <input
                        type="number" id="cvv" class="form-control" name="cvv"
                        class="demoInputBox">
                            </div>                            

  </div>
  </div>
  </div>
  
  <div class="col-md-4" id="button_div" style="display: none">
     <input type="submit" name="pay_now" value="Submit"
                        id="submit-btn" class="btnAction"
                        onClick="stripePay(event);">
 <div id="loader" style="display: none">
                        <img alt="loader" src="images/LoaderIcon.gif" >
                    </div>  
  <input class="form-control" id="package" name="package" value="<?php echo $package ?>" type="hidden" placeholder="123">
   <input class="form-control" id="description" name="description" value="<?php echo $description ?>" type="hidden" placeholder="123">
    <input class="form-control" id="amount" name="amount" type="hidden" value="<?php echo $amount ?>" placeholder="123">
     <input class="form-control" id="plan" name="plan" type="hidden" value="<?php echo $plan ?>" placeholder="123">
     <input class="form-control" id="package_id" name="package_id" type="hidden" value="<?php echo $plan ?>" placeholder="123">
     <input type='hidden' name='currency_code' value='USD'> 
                    <input type='hidden' name='item_name' value='<?php echo $package ?>'>
                <input type='hidden' name='package_id' value='<?php echo $package_id ?>'>                                           
  </div> 
  </div>
</form>  
</div>

<?php include 'navbar_footer.php'; ?>