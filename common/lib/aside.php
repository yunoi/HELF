<div id="aside_menu">
    <ul id="aside_shortcut">
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/bmi/bmi.php">
                <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut01.gif" alt="나의 BMI 지수는?(비만도 계산)"></a>
        </li>
        <li class="right">
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/bmi/kcal.php">
                <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut02.gif" alt="칼로리처방 받기 "></a>
        </li>
        <li>
             <a href="#">
                <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut03.gif" alt="다이어트신 어플리케이션"></a>
        </li>
        <li class="right">
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/map/map.php">
                <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/link_shortcut04.gif" alt="인바디 측정 보건소 찾기"></a>
        </li>
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
  mysqli_close($conn);
?>
        </ul>
    </div>
</div>
