<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: Health friends, healthier life</title>
    <link rel="stylesheet" href="./css/mypage.css">
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
          <div id="mypage_info">
            <a href="mypage_info.php">
              <p>내 정보 변경</p>
            </a>
          </div>
          <div id="mywrite_board" class="select_tap">
            <a href="mywrite_board.php">
              <p>내가 쓴 글</p>
            </a>
          </div>
          <div id="mywrite_comment">
            <a href="mywrite_comment.php">
              <p>내가 쓴 댓글</p>
            </a>
          </div>
          <div id="fick_list">
            <a href="fick_list.php">
              <p>찜한 상품</p>
            </a>
          </div>
          <div id="cart_list">
            <a href="cart_list.php">
              <p>장바구니</p>
            </a>
          </div>
          <div id="buy_list">
            <a href="buy_list.php">
              <p>구매 내역</p>
            </a>
          </div>
        </div>
        <div id="mypage_info_content">
          <table>
            <tr>
              <td>아이디</td>
            </tr>
          </table>
        </div>
      </div>
    </section>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
