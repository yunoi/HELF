<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
$num=$id=$subject=$content=$day=$hit=$image_width=$q_num="";

if (empty($_GET['page'])) {
    $page=1;
} else {
    $page=$_GET['page'];
}

if (isset($_GET["num"])&&!empty($_GET["num"])) {
    $num = test_input($_GET["num"]);
    $hit = test_input($_GET["hit"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    $sql="UPDATE `community` SET `hit`=$hit WHERE b_code='자유게시판' and `num`=$q_num;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }

    $sql="SELECT * from `community` where b_code='자유게시판' and num ='$q_num';";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $id=$row['id'];
    $name=$row['name'];
    $hit=$row['hit'];
    $subject= htmlspecialchars($row['subject']);
    $content= htmlspecialchars($row['content']);
    $subject=str_replace("\n", "<br>", $subject);
    $subject=str_replace(" ", "&nbsp;", $subject);
    $content=str_replace("\n", "<br>", $content);
    $content=str_replace(" ", "&nbsp;", $content);
    //b_code
    $b_code=$row['b_code'];
    $file_name=$row['file_name'];
    $file_copied=$row['file_copied'];
    $file_type=$row['file_type'];
    $day=$row['regist_day'];

    if (!empty($file_copied)&&$file_type =="image") {
        //이미지 정보를 가져오기 위한 함수 width, height, type
        $image_info=getimagesize("./data/".$file_copied);
        $image_width=$image_info[0];
        $image_height=$image_info[1];
        $image_type=$image_info[2];
        if ($image_width>400) {
            $image_width = 400;
        }
    } else {
        $image_width=0;
        $image_height=0;
        $image_type="";
    }
}


?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">

<?php
function free_ripple_delete($id1, $num1, $page1, $page, $hit, $parent)
{
    $message="";
    if ($_SESSION['user_grade']=="admin"||$_SESSION['user_grade']=="master"||$_SESSION['user_id']==$id1) {
        $message=
        '<form style="display:inline" action="'.$page1.'?mode=delete_ripple&page='.$page.'&hit='.$hit.'" method="post">
          <input type="hidden" name="num" value="'.$num1.'">
          <input type="hidden" name="parent" value="'.$parent.'">
          <input type="submit" value="삭제">
        </form>';
    }
    return $message;
}

 ?>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/community.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/carousel.css">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
    <title></title>
    <script type="text/javascript">
    function check_delete(num) {
      var result=confirm("삭제하시겠습니까?");
      if(result){
            window.location.href='./dml_board.php?mode=delete&num='+num;
            window.history.go(-1);
      }
    }
    </script>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
          <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
      </div><!--end of header  -->
      <div id="content">
        <div id="col1">
         <div id="left_menu">
           <div id="sub_title"> <span>메뉴</span></div>
           <ul>
           <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/community/free/list.php">자유게시판</a></li>
           <li><a href="#">다이어트 후기</a></li>
           </ul>
         </div>
       </div><!--end of col1  -->

       <div id="col2">
         <div id="title">자유게시판</div>
         <div class="clear"></div>
         <div id="write_form_title"></div>
         <div class="clear"></div>
            <div id="write_form">
              <div class="write_line"></div>
              <div id="write_row1">
                <div class="col1">아이디</div>
                <div class="col2"><?=$user_id?>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  조회 : <?=$hit?> &nbsp;&nbsp;&nbsp; 입력날짜: <?=$day?>
                </div>

              </div><!--end of write_row1  -->
              <div class="write_line"></div>
              <div id="write_row2">
                <div class="col1">제&nbsp;&nbsp;목</div>
                <div class="col2"> <input type="text" name="subject" value="<?=$subject?>" readonly></div>
              </div><!--end of write_row2  -->
              <div class="write_line"></div>

              <div id="view_content">
                <div class="col2">
                  <?php
                    if ($file_type =="image") {
                        echo "<img src='./data/$file_copied' width='$image_width'><br>";
                    } elseif (!empty($_SESSION['user_id'])&&!empty($file_copied)) {
                        $file_path = "./data/".$file_copied;
                        $file_size = filesize($file_path);
                        //2. 업로드된 이름을 보여주고 [저장] 할것인지 선택한다.
                        echo("
                        ▷ 첨부파일 : $file_name &nbsp; [ $file_size Byte ]
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='download.php?mode=download&num=$q_num'>저장</a><br><br>
                      ");
                    }
                  ?>
                  <?=$content?>
                </div><!--end of col2  -->
              </div><!--end of view_content  -->
              <div id="fb-root"></div>
              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v6.0"></script>페이스북
              <div class="fb-like" data-href="http://localhost/source/likeit.php" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
            </div><!--end of write_form  -->

<!--덧글내용시작  -->
<div id="ripple">
  <div id="ripple1">댓글</div>
  <div id="ripple2">
    <?php
      $sql="select * from `comment` where b_code='자유게시판' and parent='$q_num' ";
      $ripple_result= mysqli_query($conn, $sql);
      while ($ripple_row=mysqli_fetch_array($ripple_result)) {
          $ripple_num=$ripple_row['num'];
          $ripple_id=$ripple_row['id'];
          $ripple_name =$ripple_row['name'];
          $ripple_date=$ripple_row['regist_day'];
          $ripple_b_code=$ripple_row['b_code'];
          $ripple_content=$ripple_row['content'];
          $ripple_content=str_replace("\n", "<br>", $ripple_content);
          $ripple_content=str_replace(" ", "&nbsp;", $ripple_content); ?>
        <div id="ripple_title">
          <ul>
            <li><?=$ripple_id."&nbsp;&nbsp;".$ripple_date?></li>
            <li id="mdi_del">
            <?php
            $message =free_ripple_delete($ripple_id, $ripple_num, 'dml_board.php', $page, $hit, $q_num);
          echo $message; ?>
            </li>
          </ul>
        </div>
        <div id="ripple_content">
          <?=$ripple_content?>
        </div>
    <?php
      }//end of while
      mysqli_close($conn);
    ?>
    <form name="ripple_form" action="dml_board.php?mode=insert_ripple" method="post">
      <input type="hidden" name="parent" value="<?=$q_num?>">
      <input type="hidden" name="hit" value="<?=$hit?>">
      <input type="hidden" name="page" value="<?=$page?>">
      <input type="hidden" name="user_id" value="<?=$user_id?>">
      <input type="hidden" name="b_code" value="자유게시판">
      <div id="ripple_insert">
        <div id="ripple_textarea"><textarea name="ripple_content" rows="3" cols="80"></textarea></div>
        <div id="ripple_button"><input type="image" src="./lib/memo_ripple_button.png"></div>
      </div><!--end of ripple_insert -->
    </form>
  </div><!--end of ripple2  -->
</div><!--end of ripple  -->

<div id="write_button">
    <a href="./list.php?page=<?=$page?>"> <button type="button">목록</button></a>
  <?php
    //master or admin이거나 해당된 작성자일경우 수정, 삭제가 가능하도록 설정
    // echo "<script>alert('{$_SESSION['user_id']}');</script>";
    if ($_SESSION['user_grade']=="admin" ||$_SESSION['user_grade']=="master" || $_SESSION['user_id']==$user_id) {
        echo('<a href="./write_edit_form.php?mode=update&num='.$num.'"> <button type="button">수정</button></a>&nbsp;');
        echo('<button type="button" onclick="check_delete('.$num.')">삭제</button>&nbsp;');
    }
    //로그인하는 유저에게 글쓰기 기능을 부여함.
    if (!empty($_SESSION['user_id'])) {
        echo '<a href="write_edit_form.php"><button type="button">글쓰기</button></a>';
    }
  ?>
</div><!--end of write_button-->
</div><!--end of col2  -->
</div><!--end of content -->
</div><!--end of wrap  -->
</body>
</html>
