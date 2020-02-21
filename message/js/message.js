
$(document).ready(function() {
  $("#send_message").click(function() {
        location.replace('./message_box.php?mode=send');
        $("#send_message").addClass("select_tap");
        $("#receive_message").removeClass("select_tap");
      
      
  });

  $("#receive_message").click(function() {
    location.replace('./message_box.php?mode=receive');
    $("#receive_message").addClass("select_tap");
    $("#send_message").removeClass("select_tap");
    
  });

  
});
