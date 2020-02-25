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

function check_back(){
  
    var con_val = confirm('페이지를 나가시겠습니까? 지금까지 작성된 내용은 저장되지 않습니다!');
if(con_val === true){
  history.go(-1);
}
else if(con_val === false){
return;
}
  
  
}