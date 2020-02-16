<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
$num=$id=$subject=$content=$day=$hit=$image_width=$q_num="";

if(empty($_GET['page'])){
  $page=1;
}else{
  $page=$_GET['page'];
}

if(isset($_GET["num"])&&!empty($_GET["num"])){
    $num = test_input($_GET["num"]);
    $hit = test_input($_GET["hit"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    $sql="UPDATE `community` SET `hit`=$hit WHERE b_code='자유게시판' and `num`=$q_num;";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }

    $sql="SELECT * from `community` where b_code='자유게시판' and num ='$q_num';";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $id=$row['id'];
    $name=$row['name'];
    $hit=$row['hit'];
    $subject= htmlspecialchars($row['subject']);
    $content= htmlspecialchars($row['content']);
    $subject=str_replace("\n", "<br>",$subject);
    $subject=str_replace(" ", "&nbsp;",$subject);
    $content=str_replace("\n", "<br>",$content);
    $content=str_replace(" ", "&nbsp;",$content);
    //b_code
    $b_code=$row['b_code'];
    $file_name=$row['file_name'];
    $file_copied=$row['file_copied'];
    $file_type=$row['file_type'];
    $day=$row['regist_day'];

    if(!empty($file_copied)&&$file_type =="image"){
      //이미지 정보를 가져오기 위한 함수 width, height, type
      $image_info=getimagesize("./data/".$file_copied);
      $image_width=$image_info[0];
      $image_height=$image_info[1];
      $image_type=$image_info[2];
      if($image_width>400) $image_width = 400;
    }else{
      $image_width=0;
      $image_height=0;
      $image_type="";
    }

}

?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/greet.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/carousel.css">
    <title></title>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
          <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
      </div><!--end of header  -->
      <div id="content">
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
                    if($file_type =="image"){
                      echo "<img src='./data/$file_copied' width='$image_width'><br>";

                    }elseif(!empty($_SESSION['user_id'])&&!empty($file_copied)){
                      $file_path = "./data/".$file_copied;
                      $file_size = filesize($file_path);

                      //2. 업로드된 이름을 보여주고 [저장] 할것인지 선택한다.
                      echo ("
                        ▷ 첨부파일 : $file_name &nbsp; [ $file_size Byte ]
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='download.php?mode=download&num=$q_num'>저장</a><br><br>
                      ");
                    }
                  ?>
                  <?=$content?>
                </div><!--end of col2  -->
              </div><!--end of view_content  -->
            </div><!--end of write_form  -->

<!--덧글내용시작  -->
<div id="ripple">
  <div id="ripple1">덧글</div>
  <div id="ripple2">
    <?php
      $sql="select * from `free_ripple` where parent='$q_num' ";
      $ripple_result= mysqli_query($conn,$sql);
      while($ripple_row=mysqli_fetch_array($ripple_result)){
        $ripple_num=$ripple_row['num'];
        $ripple_id=$ripple_row['id'];
        $ripple_nick =$ripple_row['nick'];
        $ripple_date=$ripple_row['regist_day'];
        $ripple_content=$ripple_row['content'];
        $ripple_content=str_replace("\n", "<br>",$ripple_content);
        $ripple_content=str_replace(" ", "&nbsp;",$ripple_content);
    ?>
        <div id="ripple_title">
          <ul>
            <li><?=$ripple_nick."&nbsp;&nbsp;".$ripple_date?></li>
            <li id="mdi_del">
            <?php
            $message =free_ripple_delete($ripple_id,$ripple_num,'dml_board.php',$page,$hit,$q_num);
            echo $message;
            ?>
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
      <div id="ripple_insert">
        <div id="ripple_textarea"><textarea name="ripple_content" rows="3" cols="80"></textarea></div>
        <div id="ripple_button"> <input type="button"  value="덧글입력"></div>
      </div><!--end of ripple_insert -->
    </form>
  </div><!--end of ripple2  -->
</div><!--end of ripple  -->

<div id="write_button">
    <a href="./list.php?page=<?=$page?>"> <button type="button">목록</button></a>

  <?php
    //관리자이거나 해당된 작성자일경우 수정, 삭제가 가능하도록 설정
    if($_SESSION['user_id']=="admin" || $_SESSION['user_id']==$user_id){
      echo('<a href="./write_edit_form.php?mode=update&num='.$num.'"> <button type="button">수정</button></a>&nbsp;');
      echo('<button type="button" onclick="check_delete('.$num.')">삭제</button>&nbsp;');
    }
    //로그인하는 유저에게 글쓰기 기능을 부여함.
    if(!empty($_SESSION['user_id'])){
    echo '<a href="write_edit_form.php"><button type="button">글쓰기</button></a>';
    }
  ?>
</div><!--end of write_button-->
</div><!--end of col2  -->
</div><!--end of content -->
</div><!--end of wrap  -->
</body>
</html>
