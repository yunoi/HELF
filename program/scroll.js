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
                  console.log(data[0].shop+","+data[0].type+","+data[0].subject+","+data[0].personnel
                  +","+data[0].end_day+","+data[0].choose+","+data[0].price+","+data[0].location+","+data[0].file_copied);
                  console.log(data[0].shop+","+data[0].type+","+data[0].subject+","+data[0].personnel
                  +","+data[0].end_day+","+data[0].choose+","+data[0].price+","+data[0].location+","+data[0].file_copied);
                  console.log(data[0].shop+","+data[0].type+","+data[0].subject+","+data[0].personnel
                  +","+data[0].end_day+","+data[0].choose+","+data[0].price+","+data[0].location+","+data[0].file_copied);
                  console.log(data[0].shop+","+data[0].type+","+data[0].subject+","+data[0].personnel
                  +","+data[0].end_day+","+data[0].choose+","+data[0].price+","+data[0].location+","+data[0].file_copied);
                  console.log(data[0].shop+","+data[0].type+","+data[0].subject+","+data[0].personnel
                  +","+data[0].end_day+","+data[0].choose+","+data[0].price+","+data[0].location+","+data[0].file_copied);


                  for(var i = 0; i<5; i++){
                    var html = `<li class="li_program_list">`;
                    html += `<div class="div_list"><div class="pro1"><div class="main_image"><img src='../admin/data/`+data[i].file_copied+`' class='image_vertical'></div></div>`;
                    html += `<div class="pro2"><div class="abc"><h5>`+data[i].shop+" | "+data[i].type+" | "+data[i].location+`</h5>`;
                    html += `<h5 class="tit_list_block" style="font-size:16px">`+data[i].subject+`</h5>`;
                    html += `<span class="list_date">모집기간: `+data[i].end_day+` 까지</span></div></div>`;
                    html += `<div class="pro3"><em><strong>`+data[i].price+`</strong> 원</em></div></div></li>`;

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
