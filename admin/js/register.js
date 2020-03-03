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
    // var list = document.getElementById("ul_plus");
    // list.childNodes[1].$("#option_choose").attr("disabled", true);
    // list.childNodes[1].$("#price_choose").attr("disabled", true);
    $("#option_plus").attr("disabled", true);

    child++;


  });

  $("#option_minus").click(function(){
    if(child != 1){
      var list = document.getElementById("ul_plus");
      list.removeChild(list.childNodes[child]);
      child--;
    }
  });

  var input_shop = $("#input_shop"); //상호명 체크
  var input_subject = $("#input_subject");  //제목 체크
  var input_content = $("#input_content");  //내용 체크
  var input_num = $("#input_num");  //인원수체크
  var option_choose = $(".option_choose");  //옵션명 체크
  var price_choose = $(".price_choose");  //가격체크
  var input_location = $("#input_location");  //상세주소 체크

  var sub_shop = $("#sub_shop");
  var sub_subject = $("#sub_subject");
  var sub_content = $("#sub_content");

  var shop_pass = false,
  subject_pass = false,
  content_pass = false,
  num_pass = false,
  option_pass = false,
  price_pass = false,
  location_pass = false;

  input_shop.blur(function(){
    var shopValue = input_shop.val();
    var exp = /^[A-Z가-힣\s]{3,12}$/;
    if(shopValue === ""){
        sub_shop.html("<span style='margin-left:5px; color:red;'>샵 이름을 입력해주세요</span>");
      }else if(!exp.test(shopValue)){
        sub_shop.html("<span style='margin-left:5px; color:red;'>한글,영문(대문자) 3~12자 입력가능</span>");
      }else{
        shop_pass = true;
        isAllPass();
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
        subject_pass = true;
        isAllPass();
        sub_subject.html("");
      }
  });

  input_content.blur(function(){
    var contentValue = input_content.val();
    if(contentValue === ""){
        sub_content.html("<span style='margin-left:5px; color:red'>내용을 입력해주세요</span>");
      }else{
        content_pass = true;
        isAllPass();
        sub_content.html("");
      }
  });

  input_num.blur(function(){

    var numValue = input_num.val();
    var exp = /^[1-9]{1}$|^[1-4]{1}[0-9]{1}$|^50$/;
    if(numValue === ""){
      alert('모집 인원수를 입력해주세요!');
    }else if(!exp.test(numValue)){
      alert('모집 인원수 범위를 확인해주세요(1~50)!');
    }else{
      num_pass = true;
      isAllPass();

    }
  });

  option_choose.blur(function(){

    var optionValue = option_choose.val();
    var exp = /^[0-9a-zA-Z가-힣\s]{2,15}$/;
    if(optionValue === ""){

    }else if(!exp.test(optionValue)){

    }else{
      option_pass = true;
      opPass();
      isAllPass();
    }
  });

  price_choose.blur(function(){

    var priveValue = price_choose.val();
    if(priveValue === ""){

    }else if(priveValue < 0 || priveValue > 1000000){

    }else{
      price_pass = true;
      opPass();
      isAllPass();

    }
  });

  // input_location.blur(function(){
  //
  //   var locationValue = input_location.val();
  //   if(locationValue === ""){
  //     alert('상세주소를 입력해주세요');
  //   }else if(priveValue < 0 || priveValue > 1000000){
  //     alert('가격을 확인해주세요(0~100만원)');
  //   }else{
  //     location_pass = true;
  //     opPass();
  //     alert('잘했어3');
  //   }
  // });


  function opPass() {
    console.log(option_pass+","+price_pass);
    if (option_pass && price_pass) {
      $("#option_plus").attr("disabled", false);

    } else {
      $("#option_plus").attr("disabled", true);
    }
  }

  function isAllPass() {
    if (shop_pass && subject_pass && content_pass && num_pass && option_pass && price_pass) {
      $("#btn_regist").attr("disabled", false);
    } else {
      $("#btn_regist").attr("disabled", true);
    }
  }




});
