<?php
  $page = $_GET["page"];
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>HELF :: Health friends, healthier life</title>
  <link rel="stylesheet" href="./css/login.css">

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

      <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>

  <script type="text/javascript" src="./common/js/main.js"></script>

  <script type="text/javascript" src="https://static.nid.naver.com/js/naverLogin_implicit-1.0.3.js" charset="utf-8"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

</head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>
    <section>
      <div id="forgot_main_content">
        <div id="title_forgot">
          <h1>아이디 찾기 / 비밀번호 찾기</h1>
        </div>
        <div id="forgot_form">
          <form name="forgot_form" action="forgot_id_pw.php" method="post">
            <?php
              if ($page === "id") {
            ?>
              <p>아이디를 잊어버리셨나요?</p>
              <p>가입하실때 입력하셨던 이메일을 입력해주세요</p>
              <input type="text" name="email" placeholder=" 이메일 입력"> <br>
              <input type="button" name="" value="아이디 찾기" onclick="">
            <?php
              }
             ?>
          </form>
        </div>
      </div>
    </section>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
