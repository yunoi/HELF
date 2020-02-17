
<div id="main_content">
<div id="carousel_section">
<ul class="slider">
    <li>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/img01.png">
    </li>
    <li>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/img02.png">
    </li>
    <li>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/img03.png">
    </li>
    <li>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/img04.png">
    </li>
</ul>
<div id="slideshow_nav">
    <a href="#" class="prev">prev</a>
    <a href="#" class="next">next</a>
</div>

<ol class="pagination">

</ol>
</div>
  <div id=board_preview>
<div id="latest">
    <h4>최근 게시글</h4>
    <ul>
<!-- 최근 게시글 DB 불러오기 -->
<?php
  $conn = mysqli_connect("localhost", "root", "123456", "hamster");
  $sql = "select * from board order by num desc limit 5";
  $result = mysqli_query($conn, $sql);

  if(!$result){
    echo "게시판 DB 테이블이 생성 전이거나 아직 게시글이 없습니다.";
  } else {
    while($row = mysqli_fetch_array($result)){
      $regist_day = substr($row["regist_day"], 0, 10);
?>
      <li>
        <span><?= $row["subject"]?></span>
        <span><?= $row["name"]?></span>
        <span><?= $regist_day?></span>
      </li>
<?php
    }
  }
?>

    </ul>
  </div>
  <div id="point_rank">
    <h4>포인트 랭킹</h4>
      <ul>
<?php
  $rank = 1;
  $sql = "select * from members order by point desc limit 5";
  $result = mysqli_query($conn, $sql);

  if(!$result){
    echo " 회원 DB 테이블이 생성 전이거나 아직 가입된 회원이 없습니다.";
  } else {
    while($row = mysqli_fetch_array($result)){
      $name = $row["name"];
      $id = $row["id"];
      $point = $row["point"];
      $name = mb_substr($name, 0, 1)."*".mb_substr($name, 2, 1);
?>
        <li>
          <span><?= $rank?></span>
          <span><?= $name?></span>
          <span><?= $id?></span>
          <span><?= $point?></span>
        </li>
<?php
      $rank++;
    }
  }
  mysqli_close($conn);
?>
      </ul>
  </div>
  </div>
</div>
