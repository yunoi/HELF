 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
 <title>HELF :: 프로그램</title>
 <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
 <link rel="stylesheet" type="text/css" href="../common/css/common.css">
 <link rel="stylesheet" type="text/css" href="../common/css/main.css">
 <link rel="stylesheet" type="text/css" href="./css/program.css?ver=1">
 <link rel="stylesheet" href="../mypage/css/program.css">
 <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
 <script src="./scroll.js?ver=3"></script>

 </script>


 </head>
 <body>
 <header>
     <?php include "../common/lib/header.php";?>
 </header>
 <section>
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
              <option value="전체">전체</option>
              <option value="헬스">헬스</option>
              <option value="수영">수영</option>
              <option value="축구">축구</option>
              <option value="복싱">복싱</option>
              <option value="등산">등산</option>
              <option value="수영">클라이밍</option>
              <option value="요가/필라테스">요가/필라테스</option>
              <option value="기타">기타</option>

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
            <input type="button" name="" value="검색">
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
            <br><br><br><br><br>

            <?php
              if (isset($_GET["page"])) {
                  $page = $_GET["page"];
              } else {
                  $page = 1;
              }

              $conn = mysqli_connect("localhost", "root", "123456", "helf");
              $sql = "select * from program order by o_key desc";
              $result = mysqli_query($conn, $sql);

              for ($i=0; $i<5; $i++) {
                 $back_color = array('#04adbf', '#04d9d9', '#f2b705', '#d98e04','#f23005');


               // 가져올 레코드로 위치(포인터) 이동
               $row = mysqli_fetch_array($result);
               // 하나의 레코드 가져오기
               $o_key        = $row["o_key"];
               $shop         = $row["shop"];
               $type          = $row["type"];
               $subject        = $row["subject"];
               $end_day     = $row["end_day"];
               $price  = $row["price"];
               $location         = $row["location"];
               $file_copied         = $row["file_copied"];
               $file_type         = $row["file_type"];

               ?>
               <li>
                 <div class="program_li">
                   <div class="program_image">
                     <a href="../program/program_detail.php?o_key=<?=$o_key?>">
                     <img src='../admin/data/<?=$file_copied?>'>
                     </a>
                   </div>
                   <div class="program_detail">
                     <a href="../program/program_detail.php?o_key=<?=$o_key?>">
                       <div class="info_1"><?=$shop?> | <?=$type?> | <?=$location?></div>
                       <div class="info_2"><?=$subject?></div>
                       <div class="info_3">모집기간 : <?=$end_day?> 까지</div>
                     </a>
                   </div>
                   <div class="program_price">
                     <p><?=$price?><span> 원~</span>
                     <div class="buttons">
                       <button type="button" id="cart_btn">장바구니</button> <br>
                       <button type="button" id="delete_btn">찜하기</button>
                     </div>
                   </div>
                 </div>
               </li>
<?php
}
  mysqli_close($conn);
?>
          </ul>
        </div><!-- (end)div_program_list_main -->

      </div>
      <aside>
          <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/aside.php";?>
      </aside>
    </div><!-- endof div_program	 -->

 </section>
 </body>
 </html>
