$(document).ready(function() {
  var child = 2;
  var opeq = 0;

  var input_shop = $("#input_shop"); //상호명 체크
  var input_subject = $("#input_subject");  //제목 체크
  var input_content = $("#input_content");  //내용 체크
  var input_num = $("#input_num");  //전화번호 체크
  var input_end_day  =  $("#input_end_day");  //마감일 체크
  var input_option = $(".option_choose"); //옵션체크
  var input_price = $(".price_choose");   //가격체크
  var input_location1 = $("#input_location1");  //지역1 체크
  var input_location2 = $("#input_location2");  //지역2 체크
  var input_location3 = $("#input_location3");  //상세주소 체크


  var sub_shop = $("#sub_shop");
  var sub_subject = $("#sub_subject");
  var sub_content = $("#sub_content");
  var sub_num = $("#sub_num");
  var sub_end_day = $("#sub_end_day");
  var sub_option = $("#sub_option");
  var sub_location = $("#sub_location");


  var shop_pass = false,
  subject_pass = false,
  content_pass = false,
  num_pass = false,
  end_day_pass = false,
  option_pass = false,
  price_pass = false,
  location1_pass = false;
  location2_pass = false;


  $(".btn_regist").click(function(){
    document.program_regist.submit();

  });

  $("#option_plus").click(function(){

    var html = `<li><input type="text" name="choose[]" class="option_choose" value="" placeholder=" 옵션명을 입력하세요. "> &
    <input type="number" name="price[]" class="price_choose" value="" placeholder=" 가격을 입력하세요. "> 원</li>`;
    $("#ul_plus").append(html);
    child++;

    // $("#option_plus").attr("disabled", true);
    // $(".option_choose:eq("+opeq+")").attr("disabled", true);
    // $(".price_choose:eq("+opeq+")").attr("disabled", true);
    // option_pass = false,
    // price_pass = false,
    // opeq++;

  });

  $("#option_minus").click(function(){
    if(child != 1){
      var list = document.getElementById("ul_plus");
      list.removeChild(list.childNodes[child]);
      child--;
    }
  });

  //상호명 체크
  input_shop.blur(function(){
    var shopValue = input_shop.val();
    var exp = /^[A-Z가-힣\s]{3,12}$/;
    if(shopValue === ""){
        sub_shop.html("<span style='margin-left:5px; color:red;'>필수 정보입니다</span>");
      }else if(!exp.test(shopValue)){
        sub_shop.html("<span style='margin-left:5px; color:red;'>한글,영문(대문자) 3~12자 입력가능합니다</span>");
      }else{
        shop_pass = true;
        sub_shop.html("");
      }
  });
  //제목 체크
  input_subject.blur(function(){
    var subjectValue = input_subject.val();
    var exp = /^[a-zA-Z가-힣\s]{1,50}$/;
    if(subjectValue === ""){
        sub_subject.html("<span style='margin-left:5px; color:red'>필수 정보입니다</span>");
      }else if(!exp.test(subjectValue)){
        sub_subject.html("<span style='cmargin-left:5px; color:red'>한글,영문 최대 50자 입력 가능합니다</span>");
      }else{
        subject_pass = true;
        sub_subject.html("");
      }
  });
  //내용 체크
  input_content.blur(function(){
    var contentValue = input_content.val();
    if(contentValue === ""){
        sub_content.html("<span style='margin-left:5px; color:red'>내용을 입력해주세요</span>");
      }else{
        content_pass = true;
        sub_content.html("");
      }
  });

  //전화번호 체크
  input_num.blur(function(){

    var numValue = input_num.val();
    var exp = /^\d{2,3}-\d{3,4}-\d{4}$/;
    if(numValue === ""){
      sub_num.html("<span style='margin-left:5px; color:red'>필수 정보입니다</span>");
    }else if(!exp.test(numValue)){
      sub_num.html("<span style='margin-left:5px; color:red'>양식을 확인해주세요 (ex 010-1234-5678)</span>");
    }else{
      num_pass = true;
      sub_num.html("");


    }
  });

  //마감일 체크
  input_end_day.blur(function(){

    var endValue = input_end_day.val();
    if(endValue === ""){
      sub_end_day.html("<span style='margin-left:5px; color:red'>마감일을 선택해주세요</span>");
    }else{
      end_day_pass = true;
      sub_num.html("");

    }
  });

  //옵션 체크
    input_option.blur(function(){

    var optionValue = input_option.val();
    var exp = /^[0-9a-zA-Z가-힣\s]{2,15}$/;
    if(optionValue === ""){
      sub_option.html("<span style='margin-left:5px; color:red'>필수 정보입니다</span>");
    }else{
      option_pass = true;
      sub_option.html("");
    }
  });

  //가격 체크
    input_price.blur(function(){
    var priceValue =  input_price.val();
    if(priceValue === ""){
      sub_option.html("<span style='margin-left:5px; color:red'>필수 정보입니다</span>");
    }else if(priceValue < 0 || priceValue > 1000000){
      sub_option.html("<span style='margin-left:5px; color:red'>가격 범위를 확인해주세요 (0~100만원)</span>");
    }else{
      price_pass = true;
      sub_option.html("");
    }
  });

  //지역1 체크
  input_location1.change(function(){
  var location1Value   =   input_location1.val();
  if(location1Value === 0 || location1Value === ""){
    sub_location.html("<span style='margin-left:5px; color:red'>필수 정보입니다</span>");
  }else{
    location1_pass = true;
    sub_location.html("");
  }
});

  //지역1 체크
  input_location2.change(function(){
  var location2Value   =   input_location2.val();
  console.log(location2Value);
  if(location2Value === 0 || location2Value === ""){
    sub_location.html("<span style='margin-left:5px; color:red'>필수 정보입니다</span>");
  }else{
    location2_pass = true;
    sub_location.html("");
  }
  });

  input_location3.blur(function(){
  var location3Value   =   input_location3.val();
  if(location3Value === ""){
    sub_location.html("<span style='margin-left:5px; color:red'>필수 정보입니다</span>");
  }else{
    location3_pass = true;
    sub_location.html("");
  }
  });

  // function opPass() {
  //   console.log(option_pass+","+price_pass);
  //   if (option_pass && price_pass) {
  //     $("#option_plus").attr("disabled", false);
  //
  //   } else {
  //     $("#option_plus").attr("disabled", true);
  //   }
  // }

  // function isAllPass() {
  //   if (shop_pass && subject_pass && content_pass && num_pass && option_pass && price_pass) {
  //     $("#btn_regist").attr("disabled", false);
  //   } else {
  //     $("#btn_regist").attr("disabled", true);
  //   }
  // }


  $("#btn_regist").click(function(){
    if(shop_pass && subject_pass & content_pass){
      document.program_regist.submit();
    }else{
      alert('필수항목 입력요망');
    }
  });




});
