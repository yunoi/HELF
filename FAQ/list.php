<?php
//공지사항 게시판 형식으로 만들기
session_start();
include $_SERVER['DOCUMENT_ROOT']."/HELF/common/lib/create_table.php";

create_table($conn,'faq'); //FAQ

define('SCALE', 10);

//*****************************************************
$sql=$result=$total_record=$total_page=$start="";
$row="";
$memo_id=$memo_num=$memo_date=$memo_nick=$memo_content="";
$total_record=0;
//*****************************************************
if (isset($_GET["mode"])&&$_GET["mode"]=="search") {
    //제목, 내용, 아이디
    $find = $_POST["find"];
    $search = $_POST["search"];
    $q_search = mysqli_real_escape_string($conn, $search);
    $sql="SELECT * from `notice` where $find like '%$q_search%' order by num desc";
} else {
    $sql="SELECT * from `notice` order by num desc";
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

$start=($page-1) * SCALE;
$number = $total_record - $start;
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/greet.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/carousel.css">
<link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
    <!-- <script type="text/javascript" src="./js/member_form.js"></script> -->
    <title></title>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
      </div><!--end of header  -->
      <div id="content">
       <div id="col2">
         <div id="title">
           <span>FAQ</span>
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
             <div id="list_search5"><input type="button" value="검색"> </div>
           </div><!--end of list_search  -->
         </form>
         <div id="clear"></div>
         <div id="list_top_title">
           <ul>
             <li id="list_title1">번호</li>
             <li id="list_title2">제목</li>
           </ul>
         </div><!--end of list_top_title  -->
         <div id="list_content">

         <?php
          for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++) {
              mysqli_data_seek($result, $i);
              $row=mysqli_fetch_array($result);
              $num=$row['num'];
              $subject=$row['subject'];
              $subject=str_replace("\n", "<br>", $subject);
              $subject=str_replace(" ", "&nbsp;", $subject); ?>
            <div id="list_item">
              <div id="list_item1"><?=$number?></div>
              <div id="list_item2">
                  <a href="./view.php?num=<?=$num?>&page=<?=$page?>&hit=<?=$hit+1?>"><?=$subject?></a>
              </div>
            </div><!--end of list_item -->
            <div id="memo_content"><?=$memo_content?></div>
        <?php
            $number--;
          }//end of for
        ?>

        <div id="page_button">
          <div id="page_num">이전◀ &nbsp;&nbsp;&nbsp;&nbsp;
          <?php
            for ($i=1; $i <= $total_page ; $i++) {
                if ($page==$i) {
                    echo "<b>&nbsp;$i&nbsp;</b>";
                } else {
                    echo "<a href='./list.php?page=$i'>&nbsp;$i&nbsp;</a>";
                }
            }
          ?>
          &nbsp;&nbsp;&nbsp;&nbsp;▶ 다음
          <br><br><br><br><br><br><br>
        </div><!--end of page num -->
        <div id="button">
          <!-- <a href="write_edit_form.php"><button type="button">글쓰기 테스트</button></a> -->
          <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/HELF/notice/notice.php?page=<?=$page?>"> <button type="button">목록</button>&nbsp;</a>
          <?php //세션아디가 있으면 글쓰기 버튼을 보여줌.
            if (!empty($_SESSION['user_id'])) { //login에서 저장한 세션값을 가져옴
              if($_SESSION['user_grade'] ==="master" || $_SESSION['user_grade'] ==="admin"){
                echo '<a href="./write_edit_form.php"><button type="button">글쓰기</button></a>';
              }
            }
          ?>
        </div><!--end of button -->
      </div><!--end of page button -->
      </div><!--end of list content -->
      </div><!--end of col2  -->
      </div><!--end of content -->
    </div><!--end of wrap  -->
  </body>
</html>
