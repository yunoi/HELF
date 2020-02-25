<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/common_func.php";
$num=$id=$subject=$content=$day=$hit=$area="";
$mode="insert";
$checked="";
$id= $_SESSION['user_id'];

if (isset($_GET["mode"])&&$_GET["mode"]=="update"||(isset($_GET["mode"])&&$_GET["mode"]=="response")) {
    $mode=$_GET["mode"];
    $num = test_input($_GET["num"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    $sql="SELECT * from `together` where num ='$q_num';";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        alert_back("Error: " . mysqli_error($conn));
    }

    $row=mysqli_fetch_array($result);

    $id=$row['id'];
    $subject= htmlspecialchars($row['subject']);
    $content= htmlspecialchars($row['content']);
    $subject=str_replace("\n", "<br>", $subject);
    $subject=str_replace(" ", "&nbsp;", $subject);
    $content=str_replace("\n", "<br>", $content);
    $content=str_replace(" ", "&nbsp;", $content);
    $area=$row['area'];
    $file_name=$row['file_name'];
    $file_copied=$row['file_copied'];
    $day=$row['regist_day'];
    $hit=$row['hit'];
    $area=$row['area'];
    if($mode == "response"){
      $subject="[답변]".$subject;
      $content="[원본]".$content;
      $content=str_replace("<br>", "<br>▶",$content);
      $disabled="disabled";
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/together.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/carousel.css">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
    <title>HELF :: 같이할건강게시판</title>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
      </div><!--end of header  -->
      <div id="content">
        <div id="col1">
         <div id="left_menu">
           <div id="sub_title"> <span>지역</span></div>
           <ul>
             <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/community/free/list.php">전국</a></li>
             <li><a href="#">서울</a></li>
             <li><a href="#">경기*인천</a></li>
             <li><a href="#">강원도</a></li>
             <li><a href="#">충청도</a></li>
             <li><a href="#">전라도</a></li>
             <li><a href="#">경상도</a></li>
             <li><a href="#">제주도</a></li>
           </ul>
         </div>
       </div><!--end of col1  -->

       <div id="col2">
         <div id="title">같이할건강</div>
         <div class="clear"></div>
         <div id="write_form_title">글쓰기</div>
         <div class="clear"></div>
         <form name="board_form" action="dml_board.php?mode=<?=$mode?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="num" value="<?=$num?>">
          <input type="hidden" name="hit" value="<?=$hit?>">
          <div id="write_form">
              <div class="write_line"></div>
              <div id="write_row1">
                <div class="col1">아이디</div>
                <div class="col2"><?=$id?></div>
                <div class="col3">
                  활동 지역 <select name="area">
                  <option value="선택">선택</option>
                  <option value="전국" <?php if($area === "전국") echo "selected";?>>전국</option>
                  <option value="서울" <?php if($area === "서울") echo "selected";?>>서울</option>
                  <option value="경기인천" <?php if($area === "경기인천") echo "selected";?>>경기인천</option>
                  <option value="강원도" <?php if($area === "강원도") echo "selected";?>>강원도</option>
                  <option value="충청도" <?php if($area === "충청도") echo "selected";?>>충청도</option>
                  <option value="전라도" <?php if($area === "전라도") echo "selected";?>>전라도</option>
                  <option value="경상도" <?php if($area === "경상도") echo "selected";?>>경상도</option>
                  <option value="제주도" <?php if($area === "제주도") echo "selected";?>>제주도</option>
                </select>
                </div>
              </div><!--end of write_row1  -->
              <div class="write_line"></div>
              <div id="write_row2">
                <div class="col1">제&nbsp;&nbsp;목</div>
                <div class="col2"><input type="text" name="subject" value=<?=$subject?>></div>
              </div><!--end of write_row2  -->
              <div class="write_line"></div>

              <div id="write_row3">
                <div class="col1">내&nbsp;&nbsp;용</div>
                <div class="col2"><textarea name="content" rows="15" cols="79"><?=$content?></textarea></div>
              </div><!--end of write_row3  -->
              <div class="write_line"></div>
              <div id="write_row4">
                <div class="col1">파일업로드</div>
                <div class="col2">
                  <?php
                    if ($mode=="insert") {
                        echo '<input type="file" name="upfile" >이미지(2MB)파일(0.5MB)';
                    } else {
                        ?>
                    <input type="file" name="upfile" onclick='document.getElementById("del_file").checked=true; document.getElementById("del_file").disabled=true'>
                 <?php
                    }
                  ?>
                  <?php
                    if ($mode=="update" && !empty($file_name)) {
                        echo "$file_name 파일등록";
                        echo '<input type="checkbox" id="del_file" name="del_file" value="1">삭제';
                        echo '<div class="clear"></div>';
                    }
                  ?>
                </div><!--end of col2  -->
              </div><!--end of write_row4  -->
              <div class="clear"></div>
              <div class="write_line"></div>
              <div class="clear"></div>
            </div><!--end of write_form  -->
            <div id="write_button">
              <input type="submit" onclick='document.getElementById("del_file").disabled=false' value="완료">
              <a href="./list.php"><button type="button">목록</button></a>
            </div><!--end of write_button-->
         </form>
      </div><!--end of col2  -->
      </div><!--end of content -->
      <aside>
          <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/aside.php";?>
      </aside>
    </div><!--end of wrap  -->
  </body>
</html>
