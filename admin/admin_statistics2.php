<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: 관리자페이지</title>
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../common/css/common.css">
    <link rel="stylesheet" type="text/css" href="../common/css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="stylesheet" href="./css/statistics.css">

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

    <?php
    $sql="select p.type , count(s.o_key) as 'count' from sales s ";
    $sql.="inner join program p on s.o_key = p.o_key ";
    $sql.="group by s.o_key order by count(s.o_key) desc";

    $result = mysqli_query($conn, $sql);
    $array = array();
    $count = "";

    for($i=0;$row=mysqli_fetch_array($result);$i++) {
      for ($j=0; $j<2; $j++) {
        if($j==0){
          $array[$i][$j] = $row['type'];
        }else{
          $array[$i][$j] = $row['count'];
          $count = $count + $row['count'];
        }

      }
    }
    ?>

    <?php
    $sql2="select m.id, m.name , sum(p.price) as 'Purchase' from sales s ";
    $sql2.="inner join members m on s.id = m.id ";
    $sql2.="inner join program p on s.o_key = p.o_key ";
    $sql2.="group by m.name order by sum(p.price) desc";

    $result2 = mysqli_query($conn, $sql2);
    $array2 = array();

    for($i=0;$row2=mysqli_fetch_array($result2);$i++) {
      for ($j=0; $j<count($row2); $j++) {
        if($j == 0){
          $array2[$i][$j] = $row2["id"];
        }else if($j == 1){
          $array2[$i][$j] = $row2["name"];
        }else if($j == 2){
          $array2[$i][$j] = $row2["Purchase"];
        }
      }
    }
     ?>
    <script>
    var arr1 = <?php echo  json_encode($array2);?> ;
    console.log(arr1);
    </script>

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
        <h3>통계 > 인기 프로그램</h3><br>

        <div id="container" style="min-width: 550px; height: 400px; max-width: 500px; margin-left:20px; border:1px solid blue; float:left;"></div>



		<script type="text/javascript">
// Radialize the colors
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '인기 프로그램'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Share',
        data: [
          <?php
            for ($i=0; $i < count($array) ; $i++) {
              if($i== count($array) - 1){
                echo "{ name: '".$array[$i][0]."', y:".$array[$i][1]."} ";
              }else{
                echo "{ name: '".$array[$i][0]."', y:".$array[$i][1]."}, ";
              }
            }

           ?>

        ]
    }]
});
		</script>
    <div id="p_ranking">
      <h3>유저 구매 랭킹</h3><br>
      <table id="tb_ranking">
        <tr id="i9">
          <td>랭킹</td>
          <td>아이디</td>
          <td>이름</td>
          <td>구매액</td>
        </tr>
        <?php
          for($i=0; $i<count($array2); $i++){
            echo "<tr>";
            $r=$i + 1;
            for($j=0; $j<4; $j++){
              $d = $j-1;
              if($j==0){
                echo "<td>$r</td>";
              }else{
        ?>
               <td><?=$array2[$i][$d]?></td>

               <?php
              }
            }
           echo "</tr>";
         }
         ?>
      </table>

    </div>
  		</div>
  		<!-- //content -->
  	</div>



  </div>

  <div id="footer">
    <p>#footer</p>
  </div>


  </body>
</html>
