   </div>
</div>
  <script src="Assets/navbar/js/jquery.min.js"></script>
    <script src="Assets/navbar/js/popper.js"></script>
    <script src="Assets/navbar/js/bootstrap.min.js"></script>
    <script src="Assets/navbar/js/main.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    	 $(document).ready(function() {
    $('body').click(function(e){
      if ( e.target.id != 'notification-icon'){
        $("#announcement-latest").hide();
      }
    });
    });
  
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
  </body>
</html>