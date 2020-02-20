
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/community.css">
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
      <div id="menu">
      </div><!--end of menu  -->
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
           <span>자유게시판</span>
         </div>
         <form name="board_form" action="list.php?mode=search" method="post">
           <div id="list_search">
             <div id="list_search1">총 <?=$total_record?>개의 게시물이 있습니다.</div>
             <div id="list_search2"><span>SELECT</span></div>
             <div id="list_search3">
               <select  name="find">
                 <option value="subject">제목</option>
                 <option value="content">내용</option>
                 <option value="id">아이디</option>
               </select>
             </div><!--end of list_search3  -->
             <div id="list_search4"><input type="text" name="search"></div>
             <div id="list_search5"><input type="submit" value="검색"> </div>
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
            <div id="list_item">
              <div id="list_item1"><?=$number?></div>
              <div id="list_item2">
              </div>
              <div id="list_item3"><?=$id?></div>
              <div id="list_item4"><?=$date?></div>
              <div id="list_item5"><?=$hit?></div>
            </div><!--end of list_item -->
            <div id="memo_content"><?=$memo_content?></div>

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
          <a href="./list.php?page=<?=$page?>"> <button type="button">목록</button>&nbsp;</a>
        </div><!--end of button -->
      </div><!--end of page button -->
      </div><!--end of list content -->
      </div><!--end of col2  -->
      </div><!--end of content -->
    </div><!--end of wrap  -->
  </body>
</html>
