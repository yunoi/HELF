
$(document).ready(function() {
  
  $("#receive_message").trigger('click');

  $("#send_message").click(function() {
    var url = "./message_box.php?mode=send";
    $(location).attr('href',url);
    $("#send_message").addClass("select_tap");
    $("#receive_message").removeClass("select_tap");
    
  });

  $("#receive_message").click(function() {
    var url = "./message_box.php?mode=receive";
    $(location).attr('href',url);
    $("#receive_message").addClass("select_tap");
    $("#send_message").removeClass("select_tap");
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