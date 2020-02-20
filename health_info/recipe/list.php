
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/community.css">
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
             <div id="list_search1">총 개의 게시물이 있습니다.</div>
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
         <!-- grid 내용들 -->
           <div class="wrapper-grid">
             <div>One</div>
             <div>Two</div>
             <div>Three</div>
             <div>Four</div>
             <div>Five</div>
             <div>Five</div>
             <div>Five</div>
             <div>Five</div>
             <div>Five</div>
          </div><!-- end of wrapper-grid -->

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
    </div><!--end of wrap  -->
  </body>
</html>
