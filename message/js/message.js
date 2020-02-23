
$(document).ready(function() {
  $("#send_message").click(function() {
        location.replace('./message_box.php?mode=send');
        $("#send_message").toggleClass("select_tap");
        $("#receive_message").toggleClass("select_tap");
      
      
  });

  $("#receive_message").click(function() {
    location.replace('./message_box.php?mode=receive');
    $("#receive_message").toggleClass("select_tap");
    $("#send_message").toggleClass("select_tap");
    
  });

  
});
