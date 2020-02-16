<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: Health friends, healthier life</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" type="text/css" href="../common/css/common.css">
    <link rel="stylesheet" type="text/css" href="../common/css/main.css">
    <link rel="stylesheet" type="text/css" href="../carousel.css">
    <script src="../js/vendor/modernizr.custom.min.js"></script>
    <script src="../js/vendor/jquery-1.10.2.min.js"></script>
    <script src="../js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="../main.js"></script>
    <script type="text/javascript" src="./js/login.js"></script>

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
          <h1>LOGIN</h1>
        </div>
        <div id="login_form">
          <form name="login_form" action="login.php" method="post">
            <input type="text" name="id" placeholder=" 아이디 입력 "> <br>
            <input type="password" name="password" placeholder=" 비밀번호 입력 "> <br>
            <div id="login_button">
              <a href="#" onclick="check_input();">
                <p>로그인</p>
              </a>
            </div>
            <input type="button" value="로그인" onclick="check_input();">
          </form>
        </div>
        <div id="find_info">
          <a href="#">아이디 찾기</a>
          <a href="#">비밀번호 찾기</a>
        </div>
        <div id="sns_login">
          <div id="kakao_login">
            <a href="kakao_login.php">
              <p>카카오톡으로 로그인</p>
            </a>
          </div>
          <!-- <div id="naver_login">
            <! 네이버아이디로로그인 버튼 노출 영역 -->
            <div id="naver_id_login"></div>
            <!-- //네이버아이디로로그인 버튼 노출 영역 -->
            <script type="text/javascript">
            	var naver_id_login = new naver_id_login("imJpReP1ZuJ368WTaKMU", "http://localhost/helf/member/member_form.php");
            	var state = naver_id_login.getUniqState();
            	naver_id_login.setButton("white", 2,40);
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
