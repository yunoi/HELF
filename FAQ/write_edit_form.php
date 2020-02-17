<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/common/lib/db_connector.php";

//*****************************************************
$num=$id=$subject=$content=$day=$hit="";
$mode="insert";
$checked="";
$disabled="";
//*****************************************************
if(!(isset($_SESSION['user_grade']))||!($_SESSION['user_grade']==="admin")){
  echo "alert('관리자 접근이 아닙니다.')";
  exit;
}

// 수정 추가 삭제 기능만 넣기
if(isset($_GET["mode"])&&$_GET["mode"]=="update"){
    $mode=$_GET["mode"]; //$mode="update"or"response"
    $num = test_input($_GET["num"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    //update 이면 해당된글, response이면 부모의 해당된글을 가져옴.
    $sql="SELECT * from `faq` where num ='$q_num';";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $subject= htmlspecialchars($row['subject']);
    $content= htmlspecialchars($row['content']);
    $subject=str_replace("\n", "<br/>",$subject);
    $subject=str_replace(" ", "&nbsp;",$subject);
    $content=str_replace("\n", "<br/>",$content);
    $content=str_replace(" ", "&nbsp;",$content);
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/greet.css">
    <script type="text/javascript" src="../js/member_form.js"></script>
    <title></title>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
          <?php include "../lib/top_login2.php"; ?>
      </div><!--end of header  -->
      <div id="menu">
        <?php include "../lib/top_menu2.php"; ?>
      </div><!--end of menu  -->
      <div id="content">
       <div id="col1">
         <div id="left_menu">
           <?php include "../lib/left_menu.php"; ?>
         </div>
       </div><!--end of col1  -->
       <div id="col2">
         <div id="title"><img src="../img/title_greet.gif"></div>
         <div class="clear"></div>
         <div id="write_form_title"><img src="../img/write_form_title.gif"></div>
         <div class="clear"></div>

         <form name="board_form" action="dml_board.php?mode=<?=$mode?>" method="post">
          <input type="hidden" name="num" value="<?=$num?>">
          <input type="hidden" name="hit" value="<?=$hit?>">
          <div id="write_form">
              <div class="write_line"></div>
              <div id="write_row1">
                <div class="col1">아이디</div>
                <div class="col2"><?=$id?></div>
                <div class="col3"><input type="checkbox" id="is_html_ok" name="is_html" value="y" <?=$checked?> <?=$disabled?> >HTML 쓰기</div>
              </div><!--end of write_row1  -->
              <div class="write_line"></div>
              <div id="write_row2">
                <div class="col1">제&nbsp;&nbsp;목</div>
                <div class="col2"><input type="text" name="subject" value=<?=$subject?>></div>
              </div><!--end of write_row2  -->
              <div class="write_line"></div>

              <div id="write_row3">
                <div class="col1">내&nbsp;&nbsp;용</div>
                <div class="col2"><textarea name="content" rows="15" cols="79"><?=$content?></textarea>  </div>
              </div><!--end of write_row3  -->
              <div class="write_line"></div>
            </div><!--end of write_form  -->

            <div id="write_button">
              <!-- 완료버튼 및 목록버튼 -->
              <input type="image" src="../img/ok.png" onclick="document.getElementById("is_html_ok").disabled=false">&nbsp;
              <a href="./list.php"><img src="../img/list.png"></a>
            </div><!--end of write_button-->
         </form>
      </div><!--end of col2  -->
      </div><!--end of content -->
    </div><!--end of wrap  -->
  </body>
</html>
