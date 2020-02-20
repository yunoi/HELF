<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
// echo "<script>alert('현재 로그인한 아이디: {$_SESSION['user_id']}');</script>";

define('SCALE', 10);

//*****************************************************
$sql=$result=$total_record=$total_page=$start="";
$row=$memo_content="";
$total_record=0;
//*****************************************************
if (isset($_GET["mode"])&&$_GET["mode"]=="search") {
    //제목, 내용, 아이디
    $find = $_POST["find"];
    $search = $_POST["search"];
    $q_search = mysqli_real_escape_string($conn, $search);
    $sql="SELECT * from `health_info` where $find like '%$q_search%' AND b_code='레시피' order by num desc;";
} else {
    $sql="SELECT * from `health_info` where b_code='레시피' order by num desc;";
}

$result=mysqli_query($conn, $sql);
$total_record=mysqli_num_rows($result);
// echo "<script>alert('{$total_record}');</script>";

$total_page=($total_record % SCALE == 0)?($total_record/SCALE):(ceil($total_record/SCALE));

//2.페이지가 없으면 디폴트 페이지 1페이지
if (empty($_GET['page'])) {
    $page=1;
} else {
    $page=$_GET['page'];
}

$start=($page -1) * SCALE;
$number = $total_record - $start;
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/health_info.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/carousel.css">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
    <title></title>
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
             <li><a href="#">운동 정보</a></li>
           <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/health_info/recipe/list.php">다이어트 레시피</a></li>
           </ul>
         </div>
       </div><!--end of col1  -->

       <div id="col2">
         <div id="title">
           <span>다이어트 레시피</span>
         </div>
         <form name="board_form" action="list.php?mode=search" method="post">
           <div id="list_search">
             <div id="list_search1">총 <?=$total_record?>개의 게시물이 있습니다.</div>
             <div id="list_search2"><span>SELECT</span></div>
             <div id="list_search3">
               <select  name="find">
                 <option value="subject">제목</option>
                 <option value="content">내용</option>
               </select>
             </div><!--end of list_search3  -->
             <div id="list_search4"><input type="text" name="search"></div>
             <div id="list_search5"><input type="submit" value="검색"> </div>
           </div><!--end of list_search  -->
         </form>

           <div class="list_content">

             <?php
             for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++) {
                 mysqli_data_seek($result, $i);
                 $row = mysqli_fetch_array($result);
                 $num=$row['num'];
                 $id=$row['id'];
                 $name=$row['name'];
                 $hit=$row['hit'];
                 $date= substr($row['regist_day'], 0, 10);
                 $subject=$row['subject'];
                 $subject=str_replace("\n", "<br>", $subject);
                 $subject=str_replace(" ", "&nbsp;", $subject);
                 $file_name=$row['file_name'];
                 $file_copied=$row['file_copied'];
                 $file_type=$row['file_type'];

                  $file_type_tok=explode('/', $file_type);
                  $file_type=$file_type_tok[0];

                 if (!empty($file_copied)&&$file_type ==="image") {
                     //이미지 정보를 가져오기 위한 함수 width, height, type
                     $image_info=getimagesize("./data/".$file_copied);
                     $image_width=$image_info[0];
                     $image_height=$image_info[1];
                     $image_type=$image_info[2];
                     if ($image_width>175 || $image_height>130) {
                         $image_width = 175;
                         $image_height = 130;

                         // echo "<script>alert('{사진 있다}');</script>";

                     }
                 } else {
                    // echo "<script>alert('{사진 없다}');</script>";
                     $image_width=0;
                     $image_height=0;
                     $image_type="";
                 } ?>


             <div id="list_item">
               <div id="list_item1"><?=$number?></div>
               <div id="list_item2">
                   <a href="./view.php?num=<?=$num?>&page=<?=$page?>&hit=<?=$hit+1?>"><?=$subject?></a>
               <?php
                 if (!($file_name === "")) {
                      echo "<img src='./data/$file_copied' width='$image_width'><br>";
                 } else {
                     echo "사진없다";
                 } ?>
               </div>
               <div id="list_item3"><?=$id?></div>
               <div id="list_item4"><?=$date?></div>
               <div id="list_item5"><?=$hit?></div>
             </div><!--end of list_item -->
             <div id="memo_content"><?=$memo_content?></div>
         <?php
             $number--;
}//end of for
         ?>


         <div id="list_content">
          <div id="page_button">
            <div id="page_num">이전◀ &nbsp;&nbsp;&nbsp;&nbsp;

            &nbsp;&nbsp;&nbsp;&nbsp;▶ 다음
            <br><br><br><br><br><br><br>
          </div><!--end of page num -->

          <div id="button">
            <!-- <a href="write_edit_form.php"><button type="button">글쓰기 테스트</button></a> -->
            <a href="#"> <button type="button">목록</button>&nbsp;</a>
          </div><!--end of button -->

        </div><!--end of page button -->
      </div><!--end of list content -->

      </div><!--end of col2  -->
      </div><!--end of content -->
      <aside>
          <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/aside.php";?>
      </aside>
    </div><!--end of wrap  -->
  </body>
</html>
