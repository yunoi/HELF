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

});
