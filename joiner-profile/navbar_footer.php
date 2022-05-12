   </div>
</div>
    <script src="Assets/navbar/js/jquery.min.js"></script>
    <script src="Assets/navbar/js/popper.js"></script>
    <script src="Assets/navbar/js/bootstrap.min.js"></script>
    <script src="Assets/navbar/js/main.js"></script>
      <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
          $(document).ready(function() {
    $('body').click(function(e){
      if ( e.target.id != 'notification-icon'){
        $("#announcement-latest").hide();
      }
    });
    });

    

    function payment_dropdown()
 {

  var payment_option= document.getElementById("payment_option").value;
  if(payment_option=='')
  {
   alert('please select payment_option');
  return false; 
  }

  else if(payment_option=='credit_card')
  {
    $('#payment_card').show();
    $('#button_div').show();
  }

  else
  {
      data='  <img class="card-img-top" src="images/credit_card.jpg" alt="Card image cap"><div class="card-body"><input type="text" class="form-control" id="fee_id" name="fee_id"class="demoInputBox"><input type="text" class="form-control" id="joiner_id" name="joiner_id"class="demoInputBox"><input type="text" class="form-control" id="amount" name="amount"class="demoInputBox"></div>'; 
      $('#payment_card').html(data); 
     $('#payment_card').show();
    $('#button_div2').show();
  }  
  
 }

        
    function show_trainer()
 {
  var trainer_id= document.getElementById("trainer").value;
  if(trainer_id=='')
  {
    alert('Please Pick Your Trainer');
    return false;
  }
  else
  {
    
     $.ajax({
    url:"trainer_details.php",
    method:"post",
    data:{trainer_id:trainer_id},
    dataType :"text",
    success:function(data)
    {
      
         $('#trainer_card').show();
         $('#payment_div').show();
         $('#trainer_card').html(data);
    }
    });

  }  
 } 

function cardValidation () {
    var valid = true;
    var trainer=  $('#trainer').val();

     var payment_option= $('#payment_option').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var cardNumber = $('#credit_card_number').val();
    var month = $('#ccmonth').val();
    var year = $('#ccyear').val();
    var cvc = $('#cvv').val();


   
    if (trainer.length<1) 
    {
       alert('select trainer');
        valid = false;
        return valid;
    }
    if (payment_option.length<1) {
      alert('select paymemt option');
        valid = false;
        return valid;
    }

    if (name.length<1) {
      alert('enter name');
        valid = false;
        return valid;
    }
    if (email.length<1) {
      alert('enter email');
         valid = false;
         return valid;
    }
    if (cardNumber.length<1) {
      alert('enter credit card number');
         valid = false;
         return valid;
    }

    if (month.length<1) {
      alert('select expiry month');
          valid = false;
          return valid;
    }
    if (year.length<1) {
      alert('select expiry year');
        valid = false;
        return valid;
    }
    if (cvc.length<1) {
      alert('Enter cvc number');
        valid = false;
        return valid;
    }
   return true;
    
    
}

  
Stripe.setPublishableKey("<?php echo 'pk_test_GxrUxVYb61PxYKK4RzJww27Z00rtRoVfZu'; ?>");

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {

    if (response.error) {
        //enable the submit button
        $("#submit-btn").show();
        $( "#loader" ).css("display", "none");
        //display the errors on the form
        $("#error-message").html(response.error.message).show();
    } else {
        //get token id
        var token = response['id'];
    
        
        //insert the token into the form
        $("#form").append("<input type='hidden' name='token' value='" + token + "' />");
        //submit form to the server
        $("#form").submit();
    }
}
function stripePay(e) {
    e.preventDefault();
    var valid = cardValidation();

    if(valid == true) {

        $("#submit-btn").hide();
        $( "#loader" ).css("display", "inline-block");
        Stripe.createToken({
            number: $('#credit_card_number').val(),
            cvc: $('#cvv').val(),
            exp_month: $('#ccmonth').val(),
            exp_year: $('#ccyear').val()
        }, stripeResponseHandler);

        //submit from callback
        return false;
    }
}
</script>

  </body>
</html>