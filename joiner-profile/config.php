
<?php
require_once('stripe/init.php');

$stripe = array(
  "secret_key"      => "sk_test_51FYzc0DRI8xYDh5TVBLHyTaRfnucHPklc9RABm5bfVzEJH7WzeOe86D1QSLsR8BCDxb9DFxAbM82Q5YCkGeULWpc009rRMFYUk",
  "publishable_key" => "pk_test_GxrUxVYb61PxYKK4RzJww27Z00rtRoVfZu"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>