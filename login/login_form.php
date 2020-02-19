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
    <!-- 네이버 로그인 -->
    <script type="text/javascript" src="https://static.nid.naver.com/js/naverLogin_implicit-1.0.3.js" charset="utf-8"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- 카카오톡 로그인 -->
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>

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
          <script type="text/javascript">
            // 팝업창을 화면 가운데에 띄워주기 위한 변수 선언
            var popup_x = ((screen.availWidth-470)/2);
            var popup_y = ((screen.availHeight-400)/2);

            function find_id_popup() {
              window.open('forgot_id_pw.php?page=id','아이디찾기','width=470, height=400, top=' + popup_y + ', left='+ popup_x + ', menubar=no, status=no, toolbar=no');
            }

            function find_password_popup() {
              window.open('forgot_id_pw.php?page=password','비밀번호찾기','width=470, height=400, top=' + popup_y + ', left='+ popup_x + ', menubar=no, status=no, toolbar=no');
            }
          </script>
          <a href="#" onclick="find_id_popup();">아이디 찾기</a>
          <a  href="#" onclick="find_password_popup();">비밀번호 찾기</a>
        </div>
        <div id="sns_login">
          <div id="kakao_login">
            <a id="kakao-login-btn"></a>
            <script type='text/javascript'>
              //<![CDATA[
                // 사용할 앱의 JavaScript 키를 설정해 주세요.
                Kakao.init('2b354742bdf569e3d564614db25e1689');
                // 카카오 로그인 버튼을 생성합니다.
                Kakao.Auth.createLoginButton({
                  container: '#kakao-login-btn',
                  success: function(authObj) {
                    // 로그인 성공시, API를 호출합니다.
                    Kakao.API.request({
                      url: '/v2/user/me',
                      success: function(res) {
                        // alert(JSON.stringify(res));

                        var stringify = JSON.stringify(res);
                        alert(stringify);

                      },
                      fail: function(error) {
                        alert(JSON.stringify(error));
                      }
                    });
                  },
                  fail: function(err) {
                    alert(JSON.stringify(err));
                  }
                });
              //]]>
            </script>
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
