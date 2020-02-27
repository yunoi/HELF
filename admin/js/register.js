$(document).ready(function() {
  var child = 2;

  $(".btn_regist").click(function(){
    document.program_regist.submit();

  });

  $("#option_plus").click(function(){
    console.dir('들어옴');
    
    var html = `<li>옵션명: <input type="text" name="choose[]" value=""> &
    가격: <input type="number" name="price[]" value=""> 원</li>`;
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
