<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/login.css">
    <script>
      function check_input() {
        alert("체크인풋!");
      }
    </script>
  </head>
  <body>
    <section>
      <div id="main_content">
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
            <!-- <input type="button" value="로그인" onclick="check_input();"> -->
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
          <div id="naver_login">
            <a href="naver_login.php">
              <p>네이버로 로그인</p>
            </a>
          </div>
          <div id="member_form">
            <a href="member_form.php">
              <p>회원가입</p>
            </a>
          </div>
        </div>
      </div>
    </section>

  </body>
</html>
