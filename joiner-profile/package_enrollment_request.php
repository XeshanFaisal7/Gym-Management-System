<?php
  require_once('../user_session.php');
  require_once('./config.php');

   $trainer= $_POST['trainer'];
   $joiner_id=$roww['joiner_id'];
   $payment_option= $_POST['payment_option'];
   $package_id= $_POST['package_id'];
   $package= $_POST['package'];
   $description= $_POST['description'];
   $fee_id=mt_rand(1000,9999);
   $amount= $_POST['amount'];
   $plan= $_POST['plan'];
   $name= $_POST['name'];
   $email= $_POST['email'];
   $credit_card_number= $_POST['credit_card_number'];
    $cvv= $_POST['cvv'];
   $token= $_POST['token'];
   $expiry_date = date("Y-m-d", strtotime(" +".$plan." months"));
   
    $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $amount,
      'currency' => 'usd'
  ));

  $fee_query="INSERT INTO `fees`(`fee_id`, `joiner_id`, `package_id`, `sum`) VALUES ('$fee_id','$joiner_id','$package_id','$amount')";
  $fee_result=mysqli_query($db,$fee_query);



  $package_query="INSERT INTO `booked_packages`(`package_id`,`joiner_id`, `plan`, `package`, `description`, `amount`, `trainer_id`,`expiry_date`) VALUES ('$package_id','$joiner_id','$plan','$package','$description','$amount','$trainer','$expiry_date')";
  $package_result=mysqli_query($db,$package_query);
 
   echo "<script>alert('Your Package Amount has successfully transferred from your account.Thankyou')</script>";  
   echo "<script>alert('You have successfully enrolled in this package.Thankyou!')</script>";  
		echo "<script>location='booked_packages.php'</script>";  

 
   

  