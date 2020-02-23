
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

function check_message(){
  if(!document.message_form.rv_id.value){
    alert('수신 아이디를 입력하세요!');
    document.message_form.rv_id.focus();
    return;
  }
  if(!document.message_form.subject.value){
    alert('제목을 입력하세요!');
    document.message_form.subject.focus();
    return;
  }
  if(!document.message_form.content.value){
    alert('내용을 입력하세요!');
    document.message_form.content.focus();
    return;
  }
  document.message_form.submit();
}