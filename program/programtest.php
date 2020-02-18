<?php
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/create_table.php";

create_table($conn, 'program');

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
 <title>같이할건강</title>
 <link rel="stylesheet" type="text/css" href="../common/css/common.css">
 <link rel="stylesheet" type="text/css" href="../common/css/main.css">
 <link rel="stylesheet" type="text/css" href="./css/program.css">

 </head>
 <body>
 <header>
     <?php include "../common/lib/header.php";?>
 </header>
 <section>
   <section>
       <!-- ?php include "slide.php";?> -->
   </section>
    <div class="div_program">
      <div class="div_program_category">
        <ul>
          <br>&nbsp
          <li>
            <h3>카테고리 상세검색</h2>
          </li>
          <br>&nbsp
          <li>
            <em>운동종류</em><br>
            <select name="kind" class="kind_sel">
              <option value="name1">전체</option>
              <option value="name2">전체</option>
              <option value="name3">헬스</option>
              <option value="name4">수영</option>
              <option value="name5">자전거</option>
              <option value="name6">요가/필라테스</option>
              <option value="name7">기타</option>
              <option value="name8">등등</option>
            </select>
          </li>
          <br><br>&nbsp
          <li>
            <em>지역선택</em><?php include "select_location.php";?>
          </li>
          <br><br>&nbsp
          <li>
            <em>인원수</em><br>
            개인 : <input type="radio" name="gender" value="개인">&nbsp&nbsp&nbsp
            그룹 : <input type="radio" name="gender" value="그룹">
          </li>
          <br><br>&nbsp
          <li>
            <em> 가격&nbsp</em><br>
            &nbsp&nbsp&nbsp&nbsp&nbsp<input type="number" name="" value="" style="width:100px;">원~<br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="number" name="" value=""style="width:100px;">원
          </li>
          <br><br>&nbsp
          <li class="li_ok">
            <input type="button" name="" value="초기화">&nbsp
            <input type="button" name="" value="확인">
          </li>

        </ul>

      </div>
      <div class="div_program_list">

        <div class="div_program_list_top">
          <ul>
            <li class="li_order">
              <b>정렬 </b>
              <a href="#">인기순&nbsp|</a>
              <a href="#">&nbsp거리순&nbsp|</a>
              <a href="#">&nbsp가격순&nbsp|</a>
              <a href="../admin/admin_page.php">&nbsp관리자페이지</a>
            </li>
            <li class="li_search">
              <input type="text" class="pdt_search" placeholder="상품 상세 검색"><button type="button" class="btn_pdt_search"><span>검색</span></button>
            </li>
          </ul>
        </div> <!-- (end)div_program_list_top -->

        <div class="div_program_list_main">

            <ul id="board_list">

<?php
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $con = mysqli_connect("localhost", "root", "123456", "helf");
    $sql = "select * from program";
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result); // 전체 글 수

    $scale = 10;

    // 전체 페이지 수($total_page) 계산
    if ($total_record % $scale == 0) {
        $total_page = floor($total_record/$scale);
    } else {
        $total_page = floor($total_record/$scale) + 1;
    }

    // 표시할 페이지($page)에 따라 $start 계산
    $start = ($page - 1) * $scale;

    $number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++) {
       mysqli_data_seek($result, $i);
       // 가져올 레코드로 위치(포인터) 이동
       $row = mysqli_fetch_array($result);
       // 하나의 레코드 가져오기
       $shop         = $row["shop"];
       $type          = $row["type"];
       $subject        = $row["subject"];
       $end_day     = $row["end_day"];
       $price  = $row["price"];
       $location         = $row["location"];
       $file_copied         = $row["file_copied"];
       $file_type         = $row["file_type"];

       ?>
				<li class="li_program_list">
          <div class="div_list">
          <div class="pro1">
            <div class="main_image">
              <?php
                if(strpos($file_type, "image") !== false) {
                  echo "<img src='../admin/data/$file_copied' class='image_vertical'>";
                } else {
                  echo "";
                }
              ?>
            </div>
          </div>
          <div class="pro2">
            <div class="abc">
              <h5><?=$shop?> | <?=$type?> | <?=$location?></h5>
              <h5 class="tit_list_block" style="font-size:16px"><?=$subject?></h5>
              <span class="list_date">모집기간: <?=$end_day?> 까지</span>
            </div>
          </div>
          <div class="pro3">
            <em><strong>949,000</strong> 원</em>
          </div>
            </div>
				</li>


<?php
       $number--;
   }
   mysqli_close($con);

?>
	    	</ul>



        </div><!-- (end)div_program_list_main -->

      </div>

    </div><!-- endof div_program	 -->
 </section>
 <footer>
     <!-- ?php include "footer.php";?> -->
 </footer>
 </body>
 </html>
