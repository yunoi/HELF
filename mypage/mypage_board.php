<?php
  session_start();

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
    <link rel="stylesheet" href="./css/board.css">
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
          <div id="mywrite_board" class="select_tap" onclick="location.href='./mypage_board.php'">
            <a>
              <p>내가 쓴 글</p>
            </a>
          </div>
          <div id="mywrite_comment" onclick="location.href='./mypage_comment.php'">
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
          <div id="fick_list" onclick="location.href='./mypage_pick.php'">
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

        </div>
      </div>
    </section>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
