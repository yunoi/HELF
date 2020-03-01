<?php
  session_start();

 ?>
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
 <script src="http://code.jquery.com/jquery-latest.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
 <script src="./js/program_list.js"></script>

 </head>
 <body>
 <header>
     <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
 </header>

 <script type="text/javascript">
 function search(date)
 {
   date.action = "./program.php";
   date.submit();
 }

 </script>

 <section>
    <div class="div_program">
      <div class="div_program_category">
        <br>
        <h3 class="search_title">-카테고리 상세검색-</h2>
          <form name="frm" action="program.php" method="post">
            <ul id="detail_search">
              <br>
              <li>
                <p>운동종류</p>
                <select name="s_type" class="kind_sel">
                  <option value="">전체</option>
                  <option value="pt">pt</option>
                  <option value="수영">수영</option>
                  <option value="축구">축구</option>
                  <option value="복싱">복싱</option>
                  <option value="등산">등산</option>
                  <option value="클라이밍">클라이밍</option>
                  <option value="요가/필라테스">요가/필라테스</option>
                  <option value="기타">기타</option>
                </select>
              </li>
              <br><br>
              <li>
                <p>지역선택</p>
                <?php include "select_location.php";?>
              </li>
              <br><br>
              <!-- <li>
                <p>인원수</p>
                <p class="people_num">개인</p> : <input type="radio" name="gender" value="개인">&nbsp&nbsp&nbsp
                <p class="people_num">그룹</p> : <input type="radio" name="gender" value="그룹">
              </li>
              <br><br> -->
              <li>
                <p>가격</p>
                <input type="number" name="s_min_price" value="" style="width:100px;"> 원 부터<br>
                <input type="number" name="s_max_price" value="" style="width:100px;"> 원 까지
              </li>
              <br><br>
              <li>
                <p>마감날짜</p>
                <input type="date" name="s_date" value="">
              </li>
              <br><br>
              <li class="li_ok">
                <input id="btn_search" type="button" onclick="search(this.form);" name="" value="검색">
              </li>
            </ul>
          </form>


      </div>
      <div class="div_program_list">
        <div class="div_program_list_top">
          <ul>
            <li class="li_order">
              <b>정렬&nbsp&nbsp</b>
              <a href="program.php?order=o_key desc">|&nbsp최근 등록순&nbsp|</a>
              <a href="program.php?order=end_day asc">&nbsp마감 임박순&nbsp|</a>
              <a href="program.php?order=price desc">&nbsp높은 가격순&nbsp|</a>
              <a href="program.php?order=price asc">&nbsp낮은 가격순&nbsp|</a>
              <!-- <a href="../admin/admin_page.php">&nbsp관리자페이지</a> -->
            </li>

          </ul>
        </div> <!-- (end)div_program_list_top -->

        <div class="div_program_list_main">
          <ul id="board_list">
            <br><br><br><br><br>

            <?php
            if(isset($_SESSION["user_id"])){
              $user_id = $_SESSION["user_id"];
            } else{
              $user_id = "로그인안함";
            }

            if (isset($_GET["page"])) {
              $page = $_GET["page"];
            } else {
              $page = 1;
            }

            if (isset($_GET["order"])) {
              $_SESSION["order"] = $_GET["order"];
              $order = $_SESSION["order"];
            } else {
              $order = "o_key desc";
            }

            $today = "2020-01-01";

            if(isset($_POST["s_date"])){
              if($_POST["s_date"] != ""){
                $s_date = $_POST["s_date"];
              }else{
                $s_date = "2099-12-31";
              }
            }else{
              $s_date = "2099-12-31";
            }


            if (isset($_POST["s_area1"])){
              switch ($_POST["s_area1"]) {
                case '1':
                  $s_area1 = "서울";
                  break;
                case '2':
                  $s_area1 = "부산";
                  break;
                case '3':
                  $s_area1 = "대구";
                  break;
                case '4':
                  $s_area1 = "인천";
                  break;
                case '5':
                  $s_area1 = "광주";
                  break;
                case '6':
                  $s_area1 = "대전";
                  break;
                case '7':
                  $s_area1 = "울산";
                  break;
                case '8':
                  $s_area1 = "강원";
                  break;
                case '9':
                  $s_area1 = "경기";
                  break;
                case '10':
                  $s_area1 = "경남";
                  break;
                case '11':
                  $s_area1 = "경북";
                  break;
                case '12':
                  $s_area1 = "전남";
                  break;
                case '13':
                  $s_area1 = "전북";
                  break;
                  case '14':
                  $s_area1 = "제주";
                  break;
                case '15':
                  $s_area1 = "충남";
                  break;
                case '16':
                  $s_area1 = "충북";
                  break;
                case '17':
                  $s_area1 = "세종";
                  break;
                default:
                  $s_area1 = "";
                  break;
              }

            }else{
              $s_area1 = "";
            }

            if(isset($_POST["s_area2"])){
              $s_area2 = $_POST["s_area2"];
            } else{
              $s_area2 = "";
            }

             $s_area = $s_area1.",".$s_area2;

             echo "<script>alert($s_area)</script>";

             if($s_area == ","){
               $s_area = "";
             }

             if(isset($_POST["s_type"])){
               $s_type = $_POST["s_type"];
             } else{
               $s_type = "";
             }

            if(isset($_POST["s_min_price"])){
              if($_POST["s_min_price"] !=""){
                $s_min_price = $_POST["s_min_price"];
              }else{
              $s_min_price = 0;
              }
            }else{
              $s_min_price = 0;
            }

            if(isset($_POST["s_max_price"])){
              if($_POST["s_max_price"] !=""){
                $s_max_price = $_POST["s_max_price"];
              }else{
               $s_max_price = 10000000;
              }
            }else{
              $s_max_price = 10000000;
            }

              // $conn = mysqli_connect("localhost", "root", "123456", "helf");
              $sql = "select * from program ";
              $sql .= "where choose = '선택' and type like '".$s_type."%' and location like '".$s_area."%' and price between ".$s_min_price." and ".$s_max_price." and end_day between '".$today."' and '".$s_date."' order by ".$order;
              $result = mysqli_query($conn, $sql);
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
                 $o_key        = $row["o_key"];
                 $shop         = $row["shop"];
                 $type          = $row["type"];
                 $subject        = $row["subject"];
                 $end_day     = $row["end_day"];
                 $location         = $row["location"];
                 $file_copied         = $row["file_copied"];
                 $file_type         = $row["file_type"];

                 $sql2 = "select price from program where shop='".$shop."' and type='".$type."' order by price asc";
                 $result2 = mysqli_query($conn, $sql2);
                 $row2 = mysqli_fetch_array($result2);
                 $price  = $row2["price"];

                 $sql3 = "select num from pick where id ='".$user_id."' and o_key =".$o_key;
                 $result3 = mysqli_query($conn, $sql3);
                 $row3 = mysqli_fetch_array($result3);
                 $pick  = $row3["num"];


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

                       <?php
                       if($pick==""){
                        // echo "<button type='button' id='btn_pick' value='$o_key' onclick=\"location.href='pick_db.php?mode=insert&o_key=$o_key&shop=$shop';\">찜하기</button><br>";
                        echo "<button type='button' id='$o_key' class='btn_pick' onclick=\"pick_insert('$o_key');\">찜하기</button><br>";
                      }else{
                        // echo "<button type='button' id='cancel_pick' onclick=\"location.href='pick_db.php?mode=delete&o_key=$o_key&shop=$shop';\">이미찜</button><br>";
                        echo "<button type='button' id='$o_key' class='cancel_pick' onclick=\"pick_delete('$o_key')\">이미찜</button><br>";

                      }
                      ?>

                     </div>
                   </div>
                 </div>
               </li>
<?php
$number--;
}
?>
          </ul>
          <ul id="page_num">
            <?php
    if ($total_page>=2 && $page >= 2) {
        $new_page = $page-1;
        echo "<li><a href='program.php?page=$new_page&order=$order'>◀ 이전</a> </li>";
    } else {
        echo "<li>&nbsp;</li>";
    }

    // 게시판 목록 하단에 페이지 링크 번호 출력
    for ($i=1; $i<=$total_page; $i++) {
        if ($page == $i) {     // 현재 페이지 번호 링크 안함
            echo "<li><b> $i </b></li>";
        } else {
            echo "<li><a href='program.php?page=$i&order=$order'> $i </a><li>";
        }
    }
    if ($total_page>=2 && $page != $total_page) {
        $new_page = $page+1;
        echo "<li> <a href='program.php?page=$new_page&order=$order'>다음 ▶</a> </li>";
    } else {
        echo "<li>&nbsp;</li>";
    }
?>
</ul> <!-- page -->
        </div><!-- (end)div_program_list_main -->

      </div>
      <aside>
          <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/aside.php";?>
      </aside>
    </div><!-- endof div_program	 -->

 </section>
 </body>
 </html>
