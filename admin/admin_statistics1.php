<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../common/css/common.css">
    <link rel="stylesheet" type="text/css" href="../common/css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">

  </head>
  <body>
    <script src="./chart/highcharts.js"></script>
    <script src="./chart/exporting.js"></script>
    <script src="./chart/export-data.js"></script>


    <header>
      <?php
      include "../common/lib/header.php";
      include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
      ?>
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
              <li><a href="admin_statistics1.php">월별매출</a></li>
              <li><a href="admin_statistics2.php">프로그램별 매출</a></li>
              <li><a href="admin_statistics3.php">회원별 매출</a></li>
            </ul>


              </div><!-- /.navbar-collapse -->

      </aside><!-- /#left-panel -->
  		</div>
  		<!-- //snb -->
  		<!-- content -->
  		<div id="content">
        <h3>통계 > 월별 매출</h3><br>

        <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>



        <script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly Average Temperature'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
    		</script>
  		</div>
  		<!-- //content -->
  	</div>



  </div>

  <div id="footer">
    <p>#footer</p>
  </div>


  </body>
</html>
