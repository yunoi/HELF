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
	<!-- //header -->
	<!-- container -->
  <div id="admin">
    <div id="admin_border">
  		<p>관리자페이지</p>
  		<!-- snb -->
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
              <li><a href="admin_board2.php">후기게시판 관리</a></li>
            </ul>
            </ul>
            <br>
            <h3 class="menu-title">-프로그램 관리-</h3>
            <ul>
              <li><a href="admin_program_regist.php">프로그램 등록</a></li>
              <li><a href="admin_program_manage.php">프로그램 관리</a></li>
            </ul>
            <br>
            <h3>-통계-</h3>
            <ul>
              <li><a href="admin_statistics.php">월별매출</a></li>
              <li><a href="admin_statistics.php">프로그램별 매출</a></li>
              <li><a href="admin_statistics.php">회원별 매출</a></li>
            </ul>


              </div><!-- /.navbar-collapse -->

      </aside><!-- /#left-panel -->
  		</div>
  		<!-- //snb -->
  		<!-- content -->
  		<div id="content">
  			<p>통계</p>
  		</div>
  		<!-- //content -->
  	</div>



  </div>

  <div id="footer">
    <p>#footer</p>
  </div>




  </body>
</html>
