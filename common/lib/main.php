
<div id="main_content">
<div id="carousel_section">
<ul class="slider">
    <li>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/img01.jpg">
    </li>
    <li>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/img02.jpg">
    </li>
    <li>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/img03.jfif">
    </li>
    <li>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/img04.jpg">
    </li>
</ul>
<div id="slideshow_nav">
    <a href="#" class="prev">prev</a>
    <a href="#" class="next">next</a>
</div>


</div>
<ol class="pagination">

</ol>
  <div id=board_preview>
<div id="latest">
    <h4>인기게시글</h4>
    <ul>
<?php
  $sql = "select * from community order by num desc limit 5";
  $result = mysqli_query($conn, $sql);

  if(!$result){
    echo "게시판 DB 테이블이 생성 전이거나 아직 게시글이 없습니다.";
  } else {
    while($row = mysqli_fetch_array($result)){
      $regist_day = substr($row["regist_day"], 0, 10);
      $num = $row['num'];
      $hit = $row['hit'];
?>
      <li>
        <span><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/community/free/view.php?num=<?=$num?>&hit=<?=$hit+1?>"><?= $row["subject"]?>       </a>
</span>
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
    <h4>같이할건강</h4>
      <ul>
<?php
  $sql = "select * from together order by num desc limit 5";
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
  </div>
</div>
