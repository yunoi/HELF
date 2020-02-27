$(document).ready(function() {
  $(".btn_regist").click(function(){
    document.program_regist.submit();

  });

  $("#option_plus").click(function(){
    $.ajax({
      url:'',
      type:'',
      // data:{'list':count},
      success:function(data){




      },
      error:function(){
        var html = `<br><input type="text" name="choose" value="">`;
        $("#td_plus").append(html);
      }
    });

  })

});
