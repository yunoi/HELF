<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
  $id = $_SESSION["user_id"];
 ?>
<ul id="board_list">
	<li>
      <span class="col1">번호</span>
      <span class="col2">게시판</span>
      <span class="col3">제목</span>
      <span class="col4">날짜</span>
      <span class="col5">추천</span>
      <span class="col6">조회</span>
	</li>
<?php
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $sql = "select * from community where id='$id' order by num desc";
    $result = mysqli_query($conn, $sql);
    $total_record = mysqli_num_rows($result); // 전체 글 수

    $scale = 10;

    // 전체 페이지 수($total_page) 계산
    if ($total_record % $scale == 0) {
        $total_page = floor($total_record/$scale);
    } // 소수점 내림, 반올림은 round, 올림은 ceil
    else {
        $total_page = floor($total_record/$scale) + 1;
    }

    // 표시할 페이지($page)에 따라 $start 계산
    $start = ($page - 1) * $scale; // 페이지 세팅 넘버!!!!!

    $number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++) {
       mysqli_data_seek($result, $i);
       // 가져올 레코드로 위치(포인터) 이동
       $row = mysqli_fetch_array($result);
       // 하나의 레코드 가져오기
       $num         = $row["num"];
       $b_code      = $row["b_code"];
       $subject     = $row["subject"];
       $regist_day  = $row["regist_day"];
       $likeit      = $row["likeit"];
       $hit         = $row["hit"];
       if ($row["file_name"]) {
           $file_image = "<img src='./img/file.gif'>";
       } else {
           $file_image = " ";
       } ?>
				<li id="board_content">
					<span class="col1"><?=$number?></span>
					<span class="col2"><?=$b_code?></span>
					<span class="col3"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
          <span class="col4"><?=$regist_day?></span>
					<span class="col5"><?=$likeit?></span>
					<span class="col6"><?=$hit?></span>
				</li>
<?php
       $number--;
   }
   mysqli_close($conn);

?>
	    	</ul>


			<ul id="page_num">
<?php
    if ($total_page>=2 && $page >= 2) {
        $new_page = $page-1;
        echo "<li><a href='mypage_info.php?type=board&page=$new_page'>◀ 이전</a> </li>";
    } else {
        echo "<li>&nbsp;</li>";
    }

    // 게시판 목록 하단에 페이지 링크 번호 출력
    for ($i=1; $i<=$total_page; $i++) {
        if ($page == $i) {     // 현재 페이지 번호 링크 안함
            echo "<li><b> $i </b></li>";
        } else {
            echo "<li><a href='mypage_info.php?type=board&page=$i'>  $i  </a><li>";
        }
    }
    if ($total_page>=2 && $page != $total_page) {
        $new_page = $page+1;

        echo "<li> <a href='mypage_info.php?type=board&page=$new_page'>다음 ▶</a> </li>";
    } else {
        echo "<li>&nbsp;</li>";
    }
?>
			</ul> <!-- page -->
