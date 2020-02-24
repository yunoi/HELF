<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
  $id = $_SESSION["user_id"];

  if(isset($_GET["page"])) {
    $page = $_GET["page"];
  } else {
    $page = "1";
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: Health friends, healthier life</title>
    <link rel="stylesheet" href="./css/mypage.css">
    <link rel="stylesheet" href="./css/program.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/main.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
    <script type="text/javascript" src="./common/js/main.js"></script>

  </head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>
    <section>
      <div id="mypage_main_content">
        <div id="title_mypage">
          <h1>마이페이지</h1>
        </div>
        <div id="mypage_buttons">
          <div id="mywrite_board" onclick="location.href='./mypage_board.php'">
            <a>
              <p>내가 쓴 글</p>
            </a>
          </div>
          <div id="mywrite_comment"onclick="location.href='./mypage_comment.php'">
            <a>
              <p>내가 쓴 댓글</p>
            </a>
          </div>
          <div id="mywrite_review" onclick="location.href='./mypage_review.php'">
            <a>
              <p>내가 쓴 상품평</p>
            </a>
          </div>
          <div id="mywrite_question" onclick="location.href='./mypage_question.php'">
            <a>
              <p>내가 쓴 상품문의</p>
            </a>
          </div>
          <div id="fick_list" class="select_tap" onclick="location.href='./mypage_pick.php'">
            <a>
              <p>찜한 상품</p>
            </a>
          </div>
          <div id="buy_list" onclick="location.href='./mypage_buy.php'">
            <a>
              <p>구매 내역</p>
            </a>
          </div>
        </div>
        <div id="mypage_content">
          <ul id="program_list">
          <?php
              if (isset($_GET["page"])) {
                  $page = $_GET["page"];
              } else {
                  $page = 1;
              }

              $sql = "select pick.*, program.* from pick, program where id='$id' and pick.o_key = program.o_key;";
              $result = mysqli_query($conn, $sql);
              $total_record = mysqli_num_rows($result); // 전체 글 수

              $scale = 5;

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
                 $o_key        = $row["o_key"];
                 $shop         = $row["shop"];
                 $type         = $row["type"];
                 $subject      = $row["subject"];
                 $end_day      = $row["end_day"];
                 $price        = $row["price"];
                 $location     = $row["location"];
                 $file_copied  = $row["file_copied"];
                 $file_type    = $row["file_type"];

                  ?>

                  <a href="../program/program_detail.php?o_key=<?=$o_key?>">
                    <li>
                      <div class="program_li">
                        <div class="program_image">
                          <img src='../admin/data/<?=$file_copied?>'>
                        </div>
                        <div class="program_detail">
                          <div class="info_1"><?=$shop?> | <?=$type?> | <?=$location?></div>
                          <div class="info_2"><?=$subject?></div>
                          <div class="info_3">모집기간 : <?=$end_day?> 까지</div>
                        </div>
                        <div class="program_price">
                          <p><?=$price?><span> 원~</span>
                          <div class="pick_buttons">
                            <button type="button" id="cart_btn">장바구니</button> <br>
                            <button type="button" id="delete_btn">삭제</button>
                          </div>
                        </div>
                      </div>
                    </li>
                  </a>
                  <?php
                 $number--;
                  }

                  mysqli_close($conn);

                 function str_cutting($string, $len){
                  if(strlen($string)<$len) {
                       return $string; //자를길이보다 문자열이 작으면 그냥 리턴
                  }
                  else {
                       $string = substr($string, 0, $len);
                       $cnt = 0;
                       for ($i=0; $i<strlen($string); $i++)
                           if (ord($string[$i]) > 127) $cnt++; //한글일 경우 2byte 옮김,자릿수
                           $string = substr($string, 0, $len - ($cnt % 3));
                       $string.="..."; //커팅된 문자열에 꼬리부분을 붙여서 리턴
                       return $string;
                  }
                }
          ?>
                  </ul>

                <ul id="page_num">
          <?php
              if ($total_page>=2 && $page >= 2) {
                  $new_page = $page-1;
                  echo "<li><a href='mypage_pick.php?page=$new_page'>◀ 이전</a> </li>";
              } else {
                  echo "<li>&nbsp;</li>";
              }

              // 게시판 목록 하단에 페이지 링크 번호 출력
              for ($i=1; $i<=$total_page; $i++) {
                  if ($page == $i) {     // 현재 페이지 번호 링크 안함
                      echo "<li><b> $i </b></li>";
                  } else {
                      echo "<li><a href='mypage_pick.php?page=$i'>  $i  </a><li>";
                  }
              }
              if ($total_page>=2 && $page != $total_page) {
                  $new_page = $page+1;

                  echo "<li> <a href='mypage_pick.php?page=$new_page'>다음 ▶</a> </li>";
              } else {
                  echo "<li>&nbsp;</li>";
              }
          ?>
          </ul> <!-- page -->
      </div>
    </section>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
