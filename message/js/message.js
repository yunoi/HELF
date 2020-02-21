
$(document).ready(function() {
    $("#send_message").click(function() {
      location.href = './message_box.php?mode=send';
      if($("#send_message").hasClass("select_tap") ==! false){
        $("#send_message").addClass("select_tap");
        $("#receive_message").removeClass("select_tap");
      }
        
    });
    $("#receive_message").click(function() {
      location.href = './message_box.php?mode=receive';
      if($("#receive_message").hasClass("select_tap") ==! false){
        $("#receive_message").addClass("select_tap");
        $("#send_message").removeClass("select_tap");
      }
    });

  });