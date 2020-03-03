$(document).ready(function() {
  var child = 2;

  $(".btn_regist").click(function(){
    document.program_regist.submit();

  });

  $("#option_plus").click(function(){
    console.dir('들어옴');

    var html = `<li><input type="text" name="choose[]" id="option_choose" value="" placeholder=" 옵션명을 입력하세요. "> &
    <input type="number" name="price[]" value="" placeholder=" 가격을 입력하세요. "> 원</li>`;
    $("#ul_plus").append(html);
    child++;




  });

  $("#option_minus").click(function(){
    if(child != 1){
      var list = document.getElementById("ul_plus");
      list.removeChild(list.childNodes[child]);
      child--;
    }
  });

  var input_shop = $("#input_shop");
  var input_subject = $("#input_subject");
  var input_content = $("#input_content");
  var sub_shop = $("#sub_shop");
  var sub_subject = $("#sub_subject");
  var sub_content = $("#sub_content");

  input_shop.blur(function(){
    var shopValue = input_shop.val();
    var exp = /^[A-Z가-힣\s]{3,12}$/;
    if(shopValue === ""){
        sub_shop.html("<span style='margin-left:5px; color:red;'>샵 이름을 입력해주세요</span>");
      }else if(!exp.test(shopValue)){
        sub_shop.html("<span style='margin-left:5px; color:red;'>한글,영문(대문자) 3~12자 입력가능</span>");
      }else{
        sub_shop.html("");
      }
  });

  input_subject.blur(function(){
    var subjectValue = input_subject.val();
    var exp = /^[a-zA-Z가-힣\s]{1,50}$/;
    if(subjectValue === ""){
        sub_subject.html("<span style='margin-left:5px; color:red'>제목을 입력해주세요</span>");
      }else if(!exp.test(subjectValue)){
        sub_subject.html("<span style='cmargin-left:5px; color:red'>한글,영문 50자까지 입력 가능합니다</span>");
      }else{
        sub_subject.html("");
      }
  });

  input_content.blur(function(){
    var contentValue = input_content.val();
    if(contentValue === ""){
        sub_content.html("<span style='margin-left:5px; color:red'>내용을 입력해주세요</span>");
      }else{
        sub_content.html("");
      }
  });

});
