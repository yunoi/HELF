<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: 관리자페이지</title>
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../common/css/common.css">
    <link rel="stylesheet" type="text/css" href="../common/css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">

  </head>
  <body>
    <script src="./chart/highcharts.js"></script>
    <script src="./chart/exporting.js"></script>
    <script src="./chart/export-data.js"></script>
    <script src="./chart/accessibility.js"></script>


    <header>
      <?php
      include "../common/lib/header.php";
      include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
      ?>
    </header>

    <?php
    $sql="select month(s.sales_day) as 'month', sum(p.price) as 'm_sales' from sales s ";
    $sql.="inner join program p on s.o_key = p.o_key ";
    $sql.="group by month order by month";

    $result = mysqli_query($conn, $sql);

    $array =array(0,0,0,0,0,0,0,0,0,0,0,0);
    while($row=mysqli_fetch_array($result)) {
      $month = $row['month'];
      $sales = $row['m_sales'];
      $array[$month-1] = $sales/10000;
    }
    ?>

    <?php
    $sql2="select p.shop, sum(p.price) as 'p_sales' from sales s ";
    $sql2.="inner join program p on s.o_key = p.o_key ";
    $sql2.="group by p.shop order by sum(p.price) desc";

    $result2 = mysqli_query($conn, $sql2);
    $array2 = array();

    for($i=0;$row2=mysqli_fetch_array($result2);$i++) {
      for ($j=0; $j<2; $j++) {
        if($j==0){
          $array2[$i][$j] = $row2['shop'];
        }else{
          $array2[$i][$j] = $row2['p_sales']/10000;
        }

      }
    }
    ?>

    <script>
    var arr1 = <?php echo  json_encode($array);?> ;
    console.log(arr1);
    var arr2 = <?php echo  json_encode($array2);?> ;
    console.log(arr2);
    </script>
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
              <li><a href="admin_statistics1.php">매출 분석</a></li>
              <li><a href="admin_statistics2.php">인기 프로그램</a></li>
            </ul>


              </div><!-- /.navbar-collapse -->

      </aside><!-- /#left-panel -->
  		</div>
  		<!-- //snb -->
  		<!-- content -->
  		<div id="content">
        <h3>통계 > 월별 매출</h3><br>

        <div id="container" style="min-width: 300px;min-height: 300px; max-height: 500px; max-width: 750px; margin-left:20px;"></div>



        <script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly Revenue'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: '매출액(만원)'
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
            name: '매출',
            data: [<?=$array[0]?>, <?=$array[1]?>, <?=$array[2]?>,<?=$array[3]?>, <?=$array[4]?>, <?=$array[5]?>,
          <?=$array[6]?>,<?=$array[7]?>,<?=$array[8]?>,<?=$array[9]?>,<?=$array[10]?>,<?=$array[11]?>]
        }]
    });
    		</script>
        <br><br>

        <h3>통계 > 가게별 매출</h3><br>


<figure class="highcharts-figure">
    <div id="container2" style="height: 480px; max-width:750px; margin-left:20px;"></div>
</figure>



		<script type="text/javascript">
Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Revenue by Shop'
    },
    xAxis: {
        categories: [
          <?php
          for($i=0; $i<count($array2); $i++){
            if($i < count($array2)-1){
              echo "'".$array2[$i][0]."',";
            }else{
              echo "'".$array2[$i][0]."'";

            }
          }
          ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: '매출액 (만원)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'SHOP',
        data: [
          <?php
          for($i=0; $i<count($array2); $i++){
            if($i < count($array2)-1){
              echo $array2[$i][1].",";
            }else{
              echo $array2[$i][1];

            }
          }
          ?>
        ]

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
