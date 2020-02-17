
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: Health friends, healthier life</title>
    <link rel="stylesheet" href="./css/member.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="./js/member_form.js" charset="utf-8"></script>

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

    <!-- 우편번호 api 참조 스크립트 -->
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <!-- 네이버 아이디로 로그인 api 참조 스크립트 -->
    <script type="text/javascript" src="https://static.nid.naver.com/js/naverLogin_implicit-1.0.3.js" charset="utf-8"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script>
      // 우편번호 api
      function address_input() {
        new daum.Postcode({
            oncomplete: function(data) {
              document.getElementById("address_one").value = data.zonecode;
              document.getElementById("address_two").value = data.roadAddress;
            }
        }).open();
      }
      // 이메일 주소 선택시 세팅해주기
      function mail_address_setting(e) {
        document.getElementById("email_two").value= e.value;
        document.getElementById("email_two").focus();
      }

      function action_signup() {
        document.member_form.action="member_insert.php";
        document.member_form.submit();
      }
      function action_email() {
        document.member_form.action="./PHPMailer/PHPMailer/phpmail_test.php";
        document.member_form.submit();
      }
    </script>
  </head>
  <body>
    <script type="text/javascript">
      var naver_id_login = new naver_id_login("imJpReP1ZuJ368WTaKMU", "http://localhost/helf/member/member_form.php");
      // 접근 토큰 값 출력
      // alert(naver_id_login.oauthParams.access_token);
      // 네이버 사용자 프로필 조회
      naver_id_login.get_naver_userprofile("naverSignInCallback()");
      // 네이버 사용자 프로필 조회 이후 프로필 정보를 처리할 callback function
      function naverSignInCallback() {
        // alert(naver_id_login.getProfileData('email'));
        // alert(naver_id_login.getProfileData('name'));

        var naver_name = naver_id_login.getProfileData('name');
        var naver_email = naver_id_login.getProfileData('email');
        var naver_email_arr = naver_email.split('@');

        alert(naver_email_arr[0]);
        alert(naver_email_arr[1]);

        document.getElementById("input_name").value = naver_name;
        document.getElementById("email_one").value = naver_email_arr[0];
        document.getElementById("email_two").value = naver_email_arr[1];

      }
    </script>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>
    <section>
      <div id="member_main_content">
        <div id="title_member">
          <h1>회원가입</h1>
        </div>
        <div id="member_form">
          <form name="member_form" id="input_member_form" method="post">
            <input type="text" name="id" id="input_id" placeholder=" 아이디 입력 "> <br>
            <p id="input_id_confirm"></p>
            <input type="password" name="password" id="input_password" placeholder=" 비밀번호 입력 "> <br>
            <p id="input_password_confirm"></p>
            <input type="password" id="input_password_check" placeholder=" 비밀번호 재입력 "> <br>
            <p id="input_password_check_confirm"></p>
            <input type="text" name="name" id="input_name" placeholder=" 이름 "> <br>
            <p id="input_name_confirm"></p>
            <div id="phone">
              <div id="phone_input">
                <select name="phone_one">
                  <option value="010" selected>010</option>
                  <option value="011" >011</option>
                </select> -
                <input type="number" name="phone_two" id="phone_two" placeholder=" 0000 "> -
                <input type="number" name="phone_three" id="phone_three" placeholder=" 0000 ">
              </div>
              <div id="phone_certification">
                <a href="#" onclick="">
                  <p>인증 요청</p>
                </a>
              </div>
              <p id="input_phone_confirm"></p>
            </div>
            <div id="email">
              <div id="email_input">
                <input type="text"  name="email_one" id="email_one" placeholder=" 이메일 입력 "> @
                <input type="text" name="email_two" id="email_two">
                <select name="email_option" onchange="mail_address_setting(this);">
                  <option value="gmail.com" selected>gmail.com</option>
                  <option value="naver.com">naver.com</option>
                  <option value="daum.net">daum.net</option>
                  <option value="nate.com">nate.com</option>
                  <option value="">직접 입력</option>
                </select> <br>
                <p id="input_email_confirm"></p>
              </div>
              <div id="email_certification_check">
                <input type="text" id="input_email_certification" placeholder=" 인증 번호 입력 ">
                <div id="email_certification_check_button">
                  <a href="#">
                    <p>확 인</p>
                  </a>
                </div>
                <div id="email_certification">
                  <a href="#" onclick="action_email();">
                    <p>인증 요청</p>
                  </a>
                </div>
                <p id="input_email_certification_confirm"></p>
              </div>
            </div>
            <div id="address">
              <input type="number" name="address_one" id="address_one" placeholder=" 우편번호 " onclick="address_input();">
              <input type="text" name="address_two" id="address_two" placeholder=" 주소 " onclick="address_input();">
              <input type="text" name="address_three" id="address_three" placeholder=" 상세주소 "> <br>
              <p id="input_address_confirm"></p>
            </div>
            <div id="check_box">
              <input type="checkbox" name=""> <span id="all_agree"> 전체 동의 (필수, 선택 모두 포함) </span><br>
              <input type="checkbox" name=""> <span> 이용 약관 동의 (필수) </span>
              <a href="./terms_of_use.php?page=tou1" target="_blank">약관 보기</a> <br>
              <input type="checkbox" name=""> <span> 개인정보 수집 동의 (필수) </span>
              <a href="./terms_of_use.php?page=tou2" target="_blank">약관 보기</a> <br>
              <input type="checkbox" name=""> <span> 마케팅 수신 동의 (선택) </span>
              <a href="./terms_of_use.php?page=tou3" target="_blank">상세 보기</a> <br>
            </div>
            <div id="button">
              <div id="cancel">
                <a href="#" onclick="">
                  <p>취 소</p>
                </a>
              </div>
              <div id="signup">
                <input type="button" id="button_submit" value="가 입" onclick="action_signup();">
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
