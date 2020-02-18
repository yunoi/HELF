<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../common/css/common.css">
    <link rel="stylesheet" type="text/css" href="../common/css/main.css">
    <link rel="stylesheet" type="text/css" href="./admin.css">
  </head>
  <body>


	<header>
    <?php include "../common/lib/header.php";?>
  </header>

  <div id="admin"> <!--가운데 정렬을 위해 -->

   <div id="admin_border">
      <p>관리자페이지</p>


      <div id="snb">
        <aside id="left-panel" class="left-panel">
          <div id="main-menu" class="main-menu collapse navbar-collapse">
            <h3 class="menu-title">-회원관리-</h3><!-- /.menu-title -->
            <ul>
              <li><a href="admin_user.php">회원관리</a></li>
            </ul>
            <br>

            <h3 class="menu-title">-게시글 관리-</h3>
            <ul>
              <li><a href="admin_board.php">자유게시판 관리</a></li>
              <li><a href="admin_board2.php">같이할건강 관리</a></li>
            </ul>
            <br>

            <h3 class="menu-title">-프로그램 관리-</h3>
            <ul>
              <li><a href="admin_program_regist.php">프로그램 등록</a></li>
              <li><a href="admin_program_manage.php">프로그램 관리</a></li>
            </ul>
            <br>

            <h3 class="menu-title">-통계-</h3>
            <ul>
              <li><a href="admin_statistics1.php">월별매출</a></li>
              <li><a href="admin_statistics2.php">프로그램별 매출</a></li>
              <li><a href="admin_statistics3.php">회원별 매출</a></li>
            </ul>


           </div>

        </aside>
     </div><!--  end of sub -->

   <div id="content">
     <h3>관리자페이지 > 메인</h3><br>
   </div> <!--  end of content -->

 </div><!--  end of admin_board -->



</div><!--  end of admin -->

  <div id="footer">
    <p>#footer</p>
  </div>




  </body>
</html>
