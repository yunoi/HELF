<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: Health friends, healthier life</title>
    <link rel="stylesheet" href="./css/member.css">
    <link rel="stylesheet" type="text/css" href="../common/css/common.css">
    <link rel="stylesheet" type="text/css" href="../common/css/main.css">
    <link rel="stylesheet" type="text/css" href="../carousel.css">
    <script src="../js/vendor/modernizr.custom.min.js"></script>
    <script src="../js/vendor/jquery-1.10.2.min.js"></script>
    <script src="../js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="../main.js"></script>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
      function address_input() {
        new daum.Postcode({
            oncomplete: function(data) {
              document.getElementById("address_one").value = data.zonecode;
              document.getElementById("address_two").value = data.roadAddress;
            }
        }).open();
      }

      function numberMaxLength(e) {
      if(e.value.length > e.maxLength){
          e.value = e.value.slice(0, e.maxLength);
        }
      }
    </script>
  </head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>
    <section>
      <div id="member_main_content">
        <div id="title_member">
          <h1>회원가입</h1>
        </div>
        <div id="member_form">
          <form name="member_form" action="member_insert.php" method="post">
            <input type="text" name="id" id="input_id" placeholder=" 아이디 입력 "> <br>
            <p id="input_id_confirm"></p>
            <input type="password" name="password" id="input_password" placeholder=" 비밀번호 입력 "> <br>
            <p id="input_password_confirm"></p>
            <input type="password" name="password_check" id="input_password_check" placeholder=" 비밀번호 재입력 "> <br>
            <p id="input_password_check_confirm"></p>
            <input type="text" name="name" id="input_name" placeholder=" 이름 "> <br>
            <p id="input_name_confirm"></p>
            <div id="phone">
              <div id="phone_input">
                <select name="phone_one">
                  <option value="010">010</option>
                  <option value="011">011</option>
                </select> -
                <input type="number" name="phone_two" maxlength="4" placeholder=" 0000 " oninput="numberMaxLength(this);"> -
                <input type="number" name="phone_three" maxlength="4" placeholder=" 0000 " oninput="numberMaxLength(this);">
              </div>
              <div id="phone_certification">
                <a href="#" onclick="">
                  <p>인증 요청</p>
                </a>
              </div>
            </div>
            <div id="address">
              <input type="number" name="address_one" id="address_one" placeholder=" 우편번호 " onclick="address_input();">
              <input type="text" name="address_two" id="address_two" placeholder=" 주소 " onclick="address_input();">
              <input type="text" name="address_three" id="address_three" placeholder=" 상세주소 ">
            </div>
            <div id="email">
              <div id="email_input">
                <input type="text" id="email_one" name="email_one" placeholder=" 이메일 입력 "> @
                <input type="text" name="email_two">
                <select name="email_option">
                  <option value="gmail.com">gmail.com</option>
                  <option value="naver.com">naver.com</option>
                  <option value="daum.net">daum.net</option>
                  <option value="nate.com">nate.com</option>
                  <option value="">직접 입력</option>
                </select> <br>
              </div>
              <div id="email_certification_check">
                <input type="text" name="" placeholder=" 인증 번호 입력 ">
                <div id="email_certification_check_button">
                  <a href="#" onclick="">
                    <p>확 인</p>
                  </a>
                </div>
                <div id="email_certification">
                  <a href="#" onclick="">
                    <p>인증 요청</p>
                  </a>
                </div>
              </div>
            </div>
            <div id="check_box">
              <input type="checkbox" name=""> <span id="all_agree"> 전체 동의 (필수, 선택 모두 포함) </span><br>
              <input type="checkbox" name=""> <span> 이용 약관 동의 (필수) </span>
              <a href="#">약관 보기</a> <br>
              <input type="checkbox" name=""> <span> 개인정보 수집 동의 (필수) </span>
              <a href="#">약관 보기</a> <br>
              <input type="checkbox" name=""> <span> 마케팅 수신 동의 (선택) </span>
              <a href="#">상세 보기</a> <br>
            </div>
            <div id="button">
              <div id="cancel">
                <a href="#" onclick="">
                  <p>취 소</p>
                </a>
              </div>
              <div id="signup">
                <a href="#" onclick="">
                  <p>가 입</p>
                </a>
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
