$(document).ready(function() {
    var count=5
    ;
    $(window).bind("scroll", function(){
        var documentHeight  = $(document).height();
        var scrollHeight = $(window).scrollTop()+$(window).height();

        if(scrollHeight > documentHeight*0.95) {
              $.ajax({
                url:'program_db.php',
                type:'POST',
                data:{'list':count},

                success:function(data){
                  var data = JSON.parse(data);
                  console.log(data[0].o_key+","+data[0].shop+","+data[0].type+","+data[0].subject+","+data[0].personnel
                  +","+data[0].end_day+","+data[0].choose+","+data[0].price+","+data[0].location+","+data[0].file_copied);
                  // console.log(data[0].shop+","+data[0].type+","+data[0].subject+","+data[0].personnel
                  // +","+data[0].end_day+","+data[0].choose+","+data[0].price+","+data[0].location+","+data[0].file_copied);
                  // console.log(data[0].shop+","+data[0].type+","+data[0].subject+","+data[0].personnel
                  // +","+data[0].end_day+","+data[0].choose+","+data[0].price+","+data[0].location+","+data[0].file_copied);
                  // console.log(data[0].shop+","+data[0].type+","+data[0].subject+","+data[0].personnel
                  // +","+data[0].end_day+","+data[0].choose+","+data[0].price+","+data[0].location+","+data[0].file_copied);
                  // console.log(data[0].shop+","+data[0].type+","+data[0].subject+","+data[0].personnel
                  // +","+data[0].end_day+","+data[0].choose+","+data[0].price+","+data[0].location+","+data[0].file_copied);


                  for(var i=0; i<5; i++){
                    var html = `<li><div class="program_li"><div class="program_image">`;
                    html += `<a href='../program/program_detail.php?o_key=`+data[i].o_key+`'>`;
                    html += `<img src='../admin/data/`+data[i].file_copied+`'>`;
                    html += `</a></div><div class="program_detail">`;
                    html += `<a href="../program/program_detail.php?o_key=`+data[i].o_key+`">`;
                    html += `<div class="info_1">`+data[i].shop+" | "+data[i].type+" | "+data[i].location+`</div>`;
                    html += `<div class="info_2">`+data[i].subject+`</div>`;
                    html += `<div class="info_3">모집기간 : `+data[i].end_day+` 까지</div></a></div>`;
                    html += `<div class="program_price"><p>`+data[i].price+`<span> 원~</span>`;
                    html += `<div class="pick_buttons"><button type="button" id="cart_btn">장바구니</button> <br>`;
                    html += `<button type="button" id="delete_btn">찜하기</button></div></div></div></li>`;

                    $("#board_list").append(html);
                  }








                },
                error:function(){
                  alert("error")
                }
              });
              count+=5;
        }
    });
});
