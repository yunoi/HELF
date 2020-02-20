<div id="aside_menu">
    <ul id="aside_shortcut">
        
<?php 
  if(strpos(basename($_SERVER['PHP_SELF']), 'index') !== false){
    ?>
    <li>
        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/bmi/bmi.php">
    <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut01.png" alt='BMI 측정(비만도 계산)'>
    </a>
    </li>
    <li class="right">
        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/bmi/kcal.php">
            <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut02.png" alt="칼로리처방"></a>
    </li>
    <li>
         <a href="#" onclick="window.open('http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/map/gym.php','헬스장찾기','_blanck,resizable=no,menubar=no,status=no,toolbar=no,location=no,top=100px, left=100px , width=220px, height=100px');">
            <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut03.png" alt="우리동네 헬스장찾기"></a>
    </li>
    <li class="right">
        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/map/map.php">
            <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut04.png" alt="인바디 측정 보건소 찾기"></a>
    </li>
<?php
  } else {
?>
<li>
        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/bmi/bmi.php">
    <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut01_1.png" alt='BMI 측정(비만도 계산)'>
    </a>
    </li>
    <li class="right">
        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/bmi/kcal.php">
            <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut02_1.png" alt="칼로리처방"></a>
    </li>
    <li>
         <a href="#" onclick="window.open('http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/map/gym.php','헬스장찾기','_blanck,resizable=no,menubar=no,status=no,toolbar=no,location=no,top=100px, left=100px , width=220px, height=100px');">
            <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut03_1.png" alt="우리동네 헬스장찾기"></a>
    </li>
    <li class="right">
        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/map/map.php">
            <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut04_1.png" alt="인바디 측정 보건소 찾기"></a>
    </li>
<?php
  }
?>
</ul>
     
    <div id="aside_notice">
    <p id="notice_title">공지사항</p>
        <ul id="notice_area">
        <?php
  $sql = "select * from notice order by num desc limit 10";
  $result = mysqli_query($conn, $sql);

  if(!$result){
    echo "공지사항 DB 테이블이 생성 전이거나 아직 게시글이 없습니다.";
  } else {
    while($row = mysqli_fetch_array($result)){
      $regist_day = substr($row["regist_day"], 0, 10);
?>
      <li>
        <span><?= $row["subject"]?></span>
      </li>
<?php
    }
  }
?>
        </ul>
    </div>
</div>
