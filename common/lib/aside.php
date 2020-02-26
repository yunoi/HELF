<script type="text/javascript">
    function gym_search() {
        window.open(
            "http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/map/gym.php",
            "헬스장찾기",
            "_blanck,resizable=no,menubar=no,status=no,toolbar=no,location=no,top=100px, le" +
                    "ft=100px , width=350px, height=200px"
        );
    }
</script>
<div id="aside_menu">
    <ul id="aside_shortcut">
        <?php
  if(strpos(basename($_SERVER['PHP_SELF']), 'index') !== false){
    ?>
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/bmi/bmi.php">
                <img
                    src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut01.png"
                    alt='BMI 측정(비만도 계산)'>
            </a>
        </li>
        <li class="right">
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/bmi/kcal.php">
                <img
                    src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut02.png"
                    alt="칼로리처방"></a>
        </li>
        <li>
            <a href="#" onclick="gym_search();">
                <img
                    src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut03.png"
                    alt="우리동네 헬스장찾기"></a>
        </li>
        <li class="right">
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/map/map.php">
                <img
                    src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut04.png"
                    alt="인바디 측정 보건소 찾기"></a>
        </li>
    <?php
  } else {
?>
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/bmi/bmi.php">
                <img
                    src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut01_1.png"
                    alt='BMI 측정(비만도 계산)'>
            </a>
        </li>
        <li class="right">
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/bmi/kcal.php">
                <img
                    src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut02_1.png"
                    alt="칼로리처방"></a>
        </li>
        <li>
            <a href="#" onclick="gym_search();">
                <img
                    src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut03_1.png"
                    alt="우리동네 헬스장찾기"></a>
        </li>
        <li class="right">
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/map/map.php">
                <img
                    src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut04_1.png"
                    alt="인바디 측정 보건소 찾기"></a>
        </li>
        <?php
  }
?>
    </ul>

    <div id="aside_notice">
        <p class="aside_title">공지사항</p>
        <ul id="notice_area">
<?php
  if(strpos(basename($_SERVER['PHP_SELF']), 'index') !== false){
    $sql = "select * from notice order by num desc limit 10";
  }
  else{
    $sql = "select * from notice order by num desc limit 3";
  }
  $result = mysqli_query($conn, $sql);

  if(!$result){
    echo "공지사항 DB 테이블이 생성 전이거나 아직 게시글이 없습니다.";
  } else {
    while($row = mysqli_fetch_array($result)){
      $num = $row['num'];
      $hit = $row['hit'];
?>
            <li>
                <span><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/notice/view.php?num=<?=$num?>&hit=<?=$hit+1?>"><?= $row["subject"]?></a></span>
            </li>
            <?php
    }
  }
?>
        </ul>
    </div>
    <?php
  $menu1="none.png";$mt1="최근 본 상품이 없습니다.";$color1="";
  $menu2="none.png";$mt2="최근 본 상품이 없습니다.";$color2="";
  $menu3="none.png";$mt3="최근 본 상품이 없습니다.";$color3="";
  if(isset($_COOKIE["cookie1"])){
    $cookie1=$_COOKIE["cookie1"];
    $sql_side1="SELECT * from `program` where `o_key`='$cookie1';";
    $side_result1 = mysqli_query($conn,$sql_side1) or die("실패원인1: ".mysqli_error($conn));
    $row1 = mysqli_fetch_array($side_result1);
    $menu1 = $row1['file_copied'];
    $mt1 = $row1['subject'];
    $color1="color:blue;";
  }
  if(isset($_COOKIE["cookie2"])){
    $cookie2=$_COOKIE["cookie2"];
    $sql_side2="SELECT * from `program` where `o_key`='$cookie2';";
    $side_result2 = mysqli_query($conn,$sql_side2) or die("실패원인1: ".mysqli_error($conn));
    $row2 = mysqli_fetch_array($side_result2);
    $menu2 = $row2['file_copied'];
    $mt2 = $row2['subject'];
    $color2="color:blue;";
  }
  if(isset($_COOKIE["cookie3"])){
    $cookie3=$_COOKIE["cookie3"];
    $sql_side3="SELECT * from `program` where `o_key`='$cookie3';";
    $side_result3 = mysqli_query($conn,$sql_side3) or die("실패원인1: ".mysqli_error($conn));
    $row3 = mysqli_fetch_array($side_result3);
    $menu3 = $row3['file_copied'];
    $mt3 = $row3['subject'];
    $color3="color:blue;";
  }
 ?>
    <div id="aside_keyword">
        <p class="aside_title">최근 본 상품</p>
        <ol id="keyword_area">

            <li>
            <a href="../../tour/package/package_view.php?mode=<?=$cookie1?>"><img class="side_bar_recent_img" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/admin/data/<?=$menu1?>"></a>
    <div class="side_bar_recent_val"><a href="../../tour/package/package_view.php?mode=<?=$cookie1?>" style=" text-decoration:none;font-size:0.7em; color:gray; <?=$color1?>"><?=$mt1?></a></div>
            </li>
            <li>
            <a href="../../tour/package/package_view.php?mode=<?=$cookie1?>"><img class="side_bar_recent_img" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/admin/data/<?=$menu2?>"></a>
    <div class="side_bar_recent_val"><a href="../../tour/package/package_view.php?mode=<?=$cookie2?>" style="text-decoration:none; font-size:0.7em; color:gray; <?=$color2?>"><?=$mt2?></a></div>
            </li>
            <li>
            <a href="../../tour/package/package_view.php?mode=<?=$cookie1?>"><img class="side_bar_recent_img" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/admin/data/<?=$menu3?>"></a>
    <div class="side_bar_recent_val"><a href="../../tour/package/package_view.php?mode=<?=$cookie3?>" style="text-decoration:none; font-size:0.7em; color:gray; <?=$color3?>"><?=$mt3?></a></div>
            </li>

        </ul>
    </div>
</div>
