<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>HELF :: 관리자페이지</title>
  <link rel="stylesheet" type="text/css" href="./css/admin.css">
  <link rel="stylesheet" href="./css/program_regist.css">
  <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
  <script src="./js/register.js"></script>
  <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
  <link
      rel="stylesheet"
      type="text/css"
      href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
  <link
      rel="stylesheet"
      type="text/css"
      href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/main.css">
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>


  <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
  <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/js/main.js"></script>
</head>
  <body>
    <header>
      <?php include "../common/lib/header.php";?>
    </header>
    <section>
      <div id="admin_border">
         <div id="snb">
           <div id="snb_title">
             <h1>관리자 페이지</h1>
           </div>
           <div id="admin_menu_bar">
             <h2>회원관리</h2><!-- /.menu-title -->
               <ul>
                 <li><a href="admin_user.php">회원관리</a></li>
               </ul>

             <h2>게시글 관리</h2>
               <ul>
                 <li><a href="admin_board_free.php">자유게시판</a></li>
                 <li><a href="admin_board_review.php">후기게시판</a></li>
                 <li><a href="admin_board_together.php">같이할건강</a></li>
               </ul>

             <h2>프로그램 관리</h2>
               <ul>
                 <li><a href="admin_program_regist.php">프로그램 등록</a></li>
                 <li><a href="admin_program_manage.php">프로그램 관리</a></li>
                 <li><a href="admin_program_payment.php">결제 관리</a></li>
               </ul>

             <h2>통계</h2>
               <ul id="sta_ul">
                 <li><a href="admin_statistics1.php">매출 분석</a></li>
                 <li><a href="admin_statistics2.php">인기 프로그램</a></li>
               </ul>
           </div>
         </div><!--  end of sub -->

         <div id="content">
            <h1>프로그램 관리 > 결제 관리</h1><br>
            <div id="admin_box">

            <table id="manage_table">
              <tr>
                <td>주문번호</td>
                <td>주문자</td>
                <td>샵</td>
                <td>구분</td>
                <td>프로그램명</td>
                <td>옵션</td>
                <td>가격</td>
                <td>주문일</td>
                <td>결제상태</td>
                <td>수정</td>
              </tr>

      <?php
        $sql = "select * from sales order by complete asc";
        $result = mysqli_query($conn, $sql);
        if(!$result){
          echo ("<tr><td colspan='10'>처리할 결제 내역이 없습니다.<td></tr>");
        } else {
          $total_record = mysqli_num_rows($result);

          $number = $total_record;
           for ($i=0; $i<$number; $i++){
            $row = mysqli_fetch_array($result);
            $o_key        = $row["o_key"];
            $ord_num      = $row["ord_num"];
            $id     = $row["id"];
            $sales_day     = $row["sales_day"];
            $complete     = $row["complete"];
            
            $sql = "select * from program where o_key=$o_key";
            $result2 = mysqli_query($conn, $sql);
            $row2 = mysqli_fetch_array($result2);
            
            $shop = $row2['shop'];
            $type = $row2['type'];
            $subject = $row2['subject'];
            $option = $row2['choose'];
            $price = $row2['price'];
  
        ?>
            <tr>
              <td><?=$ord_num?></td>
              <td><?=$id?></td>
              <td><?=$shop ?></td>
              <td><?=$type?></td>
              <td><?=$subject?></td>
              <td><?=$option?></td>
              <td><?=$price?></td>
              <td><?=$sales_day?></td>
              <td><select id="payment_status_<?=$i?>" class="no-autoinit">
              <?php if($complete === "결제완료") { ?>
                <option value='결제완료' selected>결제완료</option>
                <option value='결제대기'>결제대기</option>
                <option value='주문취소'>주문취소</option>

                              <?php } else if($complete === "결제대기") {?>
                                <option value='결제완료'>결제완료</option>
                <option value='결제대기' selected>결제대기</option>
                <option value='주문취소'>주문취소</option>
                              <?php } else { ?>
                                <option value='결제완료'>결제완료</option>
                <option value='결제대기'>결제대기</option>
                <option value='주문취소' selected>주문취소</option>
                              <?php } ?>
              </select></td>

              <td><button type="button" id="btn_modify_<?=$i?>">수정</button></td>
           </tr>
           <script type="text/javascript">
                        $("#btn_modify_<?=$i?>").click(function () {
                          var selected_option =   $("#payment_status_<?=$i?> option:selected").val();
                          $.ajax({
                              url: 'payment_curd.php',
                              type: 'POST',
                              data: {
                                "ord_num": "<?=$ord_num?>",
                                "complete": selected_option
                              },
                              success: function(data) {
                                console.log(data);
                                if(data === "수정 완료") {
                                  alert("결제정보 수정 완료!");
                                }else if(data === "수정 실패") {
                                  alert("결제정보 수정 실패!");
                                }
                              }
                            })
                            .done(function() {
                              console.log("done");
                            })
                            .fail(function() {
                              console.log("error");
                            })
                            .always(function() {
                              console.log("complete");
                            });
                        })
                      </script>
        <?php
           }
        }
       
      ?>
            </table>

            </div> <!-- admin_box -->
          </div>		<!-- end of content -->
        </div><!--  end of admin_board -->
    </section>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
