<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";

//*****************************************************
$num=$id=$subject=$content=$day=$hit="";
//*****************************************************

if(empty($_GET['page'])){
  $page=1;
}else{
  $page=$_GET['page'];
}

if(isset($_GET["num"])&&!empty($_GET["num"])){
    $num = test_input($_GET["num"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    $sql="UPDATE `notice` SET `hit`=hit+1 WHERE `num`=$q_num;";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }

    $sql="SELECT * from `notice` where num ='$q_num';";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $subject= htmlspecialchars($row['subject']);
    $content= htmlspecialchars($row['content']);
    $subject=str_replace("\n", "<br>",$subject);
    $subject=str_replace(" ", "&nbsp;",$subject);
    $content=str_replace("\n", "<br>",$content);
    $content=str_replace(" ", "&nbsp;",$content);
    $day=$row['regist_day'];
    $hit=$row['hit'];
    $file_name=$row['file_name'];
    $file_copied=$row['file_copied'];
    $file_type=$row['file_type'];

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
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/memo.css">
    <link rel="stylesheet" href="./css/greet.css">
    <script type="text/javascript" src="../js/member_form.js?ver=1"></script>
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
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
  </head>
  <body>
    <div id="wrap">
      <div id="header">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
        </header>
      </div><!--end of header  -->
      <div id="content">
       <div id="col2">
         <div id="title">공지사항<img src="../img/title_greet.gif"></div>
         <div class="clear"></div>
         <div id="write_form_title"></div>
         <div class="clear"></div>
            <div id="write_form">
              <div class="write_line"></div>
              <div id="write_row1">
                <div class="col1">아이디</div>
                <div class="col2"><?=$id?>
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

              <div id="write_row3">
                <div class="col1">내&nbsp;&nbsp;용</div>
                <div class="col2"> <textarea name="content" rows="15" cols="79" readonly><?=$content?>
                </textarea></div>
              </div><!--end of write_row3  -->
              <div class="write_line">
                <div id="view_content">
                <div class="col2">
                  <?php
                    if ($file_type =="image") {
                        echo "<img src='./data/$file_copied' width='$image_width'><br>";
                    } else if (!empty($_SESSION['user_id'])&&!empty($file_copied)) {
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
                </div><!--end of col2  -->
              </div><!--end of view_content  --></div>
            </div><!--end of write_form  -->

            <div id="write_button">
              <!--목록보기 -->
              <a href="./list.php?page=<?=$page?>"><img src="../img/list.png"></a>

            <?php
              //세션값이 존재하면 수정기능과 삭제기능부여하기
              if(isset($_SESSION['user_grade'])){
                if($_SESSION['user_grade']=="master" || $_SESSION['user_grade']=="admin"){
                  echo('<a href="./write_edit_form.php?mode=update&num='.$num.'"><img src="../img/modify.png"></a>&nbsp;');
                  echo('<img src="../img/delete.png" onclick="check_delete('.$num.')">&nbsp;');
                }
              }
            ?>
            </div><!--end of write_button-->
      </div><!--end of col2  -->
      </div><!--end of content -->
    </div><!--end of wrap  -->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>