<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/HELF/common/lib/db_connector.php";
include $_SERVER['DOCUMENT_ROOT']."/HELF/common/lib/create_table.php";
create_table($conn, 'carecenter');//자유게시판테이블생성
define('SCALE', 10);
//*****************************************************
$sql=$result=$total_record=$total_page=$start="";
$row="";
$memo_id=$memo_num=$memo_date=$memo_nick=$memo_content="";
$total_record=0;
$sql="select * from carecenter"
$result=mysqli_query($conn, $sql);
$total_record=mysqli_num_rows($result);
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
    <link rel="stylesheet" href="HELF/css/common.css">
    <link rel="stylesheet" href="HELF/css/greet.css">
    <script type="text/javascript" src="./js/member_form.js"></script>
    <title></title>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
      </div><!--end of header  -->
      <div id="menu">
      </div><!--end of menu  -->
      <div id="content">
       <div id="col2">
         <div id="title">
           <span>인바디 보건소 위치</span>
         </div>
         <form name="board_form" action="list.php?mode=search" method="post">
           <div id="list_search">
             <div id="list_search1">총 <?=$total_record?>개의 게시물이 있습니다.</div>
             <div id="list_search2"><span>SELECT</span></div>
             <div id="list_search3">
               <select  name="find">
                 <option value="subject">제목</option>
                 <option value="content">내용</option>
                 <option value="name">이름</option>
                 <option value="id">아이디</option>
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
             <li id="list_title3">글쓴이</li>
             <li id="list_title4">등록일</li>
             <li id="list_title5">조회</li>
           </ul>
         </div><!--end of list_top_title  -->

         <div id="list_content">
         <?php
          for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++) {
              mysqli_data_seek($result, $i);
              $row=mysqli_fetch_array($result);
              $city=$row['city'];
              $area=$row['area'];
              $areahealth=$row['areahealth'];
              $type=$row['type'];
              $name=$row['name'];
              $adderrs=$row['adderrs'];
              $tel=$row['tel'];?>
            <div id="list_item">
              <div id="list_item1"><?=$city?></div>  <!-- 지역 구 OOO보건소 (진료소,보건소) 이름 주소 번호-->
              <div id="list_item2"><?=$area?></div>
              <div id="list_item3"><?=$areahealth?></div>
              <div id="list_item4"><?=$type?></div>
              <div id="list_item5"><?=$name?></div>
              <div id="list_item5"><?=$adderrs?></div>
              <div id="list_item5"><?=$tel?></div>
              <div id="list_item5">
                <a href="https://www.google.com/maps/search/?api=1&query=<?=$name?>">
                  <img src="btn_spot.gif" width="18" height="24" alt="">
                </a>
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
      </div><!--end of page button -->
      </div><!--end of list content -->
      </div><!--end of col2  -->
      </div><!--end of content -->
    </div><!--end of wrap  -->
  </body>
</html>
