<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: Health friends, healthier life</title>
    <link rel="stylesheet" href="./css/login.css">
    <script type="text/javascript">
      function check_input()
      {
          if (!document.login_form.id.value)
          {
              alert("아이디를 입력하세요");
              document.login_form.id.focus();
              return;
          }

          if (!document.login_form.password.value)
          {
              alert("비밀번호를 입력하세요");
              document.login_form.password.focus();
              return;
          }
          document.login_form.submit();
        }
    </script>

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
      <div id="login_main_content">
        <div id="title_login">
          <h1>로그인</h1>
        </div>
        <div id="login_form">
          <form name="login_form" action="login.php" method="post">
            <input type="text" name="id" placeholder=" 아이디 입력 "> <br>
            <input type="password" name="password" placeholder=" 비밀번호 입력 "> <br>
            <div id="login_button">
              <a href="#" onclick="check_input()">
                <p>로그인</p>
              </a>
            </div>
          </form>
        </div>
        <div id="find_info">
          <a href="forgot_id_pw.php?page=id">아이디 찾기</a>
          <a href="forgot_id_pw.php?page=pw">비밀번호 찾기</a>
        </div>
        <div id="sns_login">
          <div id="kakao_login">
            <a href="kakao_login.php">
              <p>카카오톡으로 로그인</p>
            </a>
          </div>
            <div id="naver_id_login"></div>
            <!-- //네이버아이디로로그인 버튼 노출 영역 -->
            <script type="text/javascript">
            	var naver_id_login = new naver_id_login("imJpReP1ZuJ368WTaKMU", "http://localhost/helf/member/member_form.php");
            	var state = naver_id_login.getUniqState();
            	naver_id_login.setButton("green", 3, 40);
            	naver_id_login.setDomain("./login_form.php");
            	naver_id_login.setState(state);
            	naver_id_login.init_naver_id_login();
            </script>
          </div>
          <div id="member_form">
            <a href="../member/member_form.php">
              <p>회원가입</p>
            </a>
          </div>
        </div>
      </div>
    </section>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
