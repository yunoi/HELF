<?php
  session_start();

  if(isset($_POST["type"])) {
    $type = $_POST["type"];
  } else {
    $type = "";
  }

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
  <script>
    $(document).ready(function() {
      alert("<?=$type?>");
      if ("<?=$type?>" === "" || "<?=$type?>" === "info") {
        $("#mypage_info").trigger("click");
        $("#mypage_info").trigger("click");
      } else if("<?=$type?>" === "board") {
        $("#mywrite_board").trigger("click");
        $("#mywrite_board").trigger("click");
      }
    });

    function select_tap_effect() {
        $("#mypage_info").click(function() {
          if($("#mypage_info").siblings().hasClass("select_tap")) {
            $("#mypage_info").siblings().removeClass("select_tap");
          }
          $("#mypage_info").addClass("select_tap");
        });

        $("#mywrite_board").click(function() {

          if($("#mywrite_board").siblings().hasClass("select_tap")) {
            $("#mywrite_board").siblings().removeClass("select_tap");
          }
          $("#mywrite_board").addClass("select_tap");
        });

        $("#mywrite_comment").click(function() {
          if($("#mywrite_comment").siblings().hasClass("select_tap")) {
            $("#mywrite_comment").siblings().removeClass("select_tap");
          }
          $("#mywrite_comment").addClass("select_tap");
        });

        $("#fick_list").click(function() {
          if($("#fick_list").siblings().hasClass("select_tap")) {
            $("#fick_list").siblings().removeClass("select_tap");
          }
          $("#fick_list").addClass("select_tap");
        });

        $("#cart_list").click(function() {
          if($("#cart_list").siblings().hasClass("select_tap")) {
            $("#cart_list").siblings().removeClass("select_tap");
          }
          $("#cart_list").addClass("select_tap");
        });

        $("#buy_list").click(function() {
          if($("#buy_list").siblings().hasClass("select_tap")) {
            $("#buy_list").siblings().removeClass("select_tap");
          }
          $("#buy_list").addClass("select_tap");
        });
    }

    function fetch_page(name) {
      fetch(name).then(function(response) {
        response.text().then(function(text) {
          document.querySelector("#mypage_content").innerHTML = text;
        })
      });
    }
  </script>
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
          <div id="mypage_info" onclick="select_tap_effect();fetch_page('info.php');">
            <a>
              <p>내 정보 변경</p>
            </a>
          </div>
          <div id="mywrite_board" onclick="select_tap_effect();fetch_page('board.php?page=<?=$page?>');">
            <a>
              <p>내가 쓴 글</p>
            </a>
          </div>
          <div id="mywrite_comment" onclick="select_tap_effect();fetch_page('comment.php');">
            <a>
              <p>내가 쓴 댓글</p>
            </a>
          </div>
          <div id="fick_list" onclick="select_tap_effect();fetch_page('pick.php');">
            <a>
              <p>찜한 상품</p>
            </a>
          </div>
          <div id="cart_list" onclick="select_tap_effect();fetch_page('cart.php');">
            <a>
              <p>장바구니</p>
            </a>
          </div>
          <div id="buy_list" onclick="select_tap_effect();fetch_page('buy.php');">
            <a>
              <p>구매 내역</p>
            </a>
          </div>
        </div>
        <div id="mypage_content">
          <p>인포</p>
        </div>
      </div>
    </section>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
