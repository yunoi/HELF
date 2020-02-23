<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
  $id = $_SESSION["user_id"];

  $sql    = "select * from members where id='$id'";
  $result = mysqli_query($con, $sql);
  $row    = mysqli_fetch_array($result);

  $password = $row["password"];
  $name = $row["name"];

  $phone = $row["phone"];
  $phone = explode("-", $row["phone"]);
  $phone1 = $phone[0];
  $phone2 = $phone[1];
  $phone3 = $phone[2];

  $email = explode("@", $row["email"]);
  $email1 = $email[0];
  $email2 = $email[1];

  $address = $row["address"];
  $address = explode("$", $row["address"]);
  $address1 = $address[0];
  $address2 = $address[1];
  $address3 = $address[2];

  mysqli_close($conn);
?>
<div id="member_form">
  <form name="member_form" id="input_member_form" method="post" action="">
    <div>아이디</div>
    <div><?=$id?></div>
    <div>비밀번호</div>
    <input type="password" name="password" id="input_password" value="<?=$password?>"> <br>
    <p id="input_password_confirm"></p>
    <div>비밀번호 확인</div>
    <input type="password" id="input_password_check" value="<?=$password?>"> <br>
    <p id="input_password_check_confirm"></p>
    <div>이름</div>
    <input type="text" name="name" id="input_name" value="<?=$name?>"> <br>
    <p id="input_name_confirm"></p>
    <div id="phone">
      <div id="phone_input">
        <select name="phone_one" id="phone_one" value="<?=$phone1?>">
          <option value="010">010</option>
          <option value="011">011</option>
        </select> -
        <input type="number" name="phone_two" id="phone_two" value="<?=$phone2?>"> -
        <input type="number" name="phone_three" id="phone_three" value="<?=$phone3?>">
      </div>

      <div id="phone_certification_check">
        <input type="text" id="input_phone_certification" placeholder=" 문자 인증 번호 입력 ">
        <div id="phone_certification_check_button">
          <a href="#" id="input_phone_certification_check">
            <p>확 인</p>
          </a>
        </div>
        <div id="phone_certification">
          <a href="#" id="phone_check">
            <p>인증 요청</p>
          </a>
        </div>
        <p id="input_phone_confirm"></p>
      </div>
    </div>
    <div id="email">
      <div id="email_input">
        <?php
          if($hidden_kakao_email !== "") {
        ?>
          <input type="text"  name="email_one" id="email_one" value="<?=$hidden_kakao_email_one?>"> @
          <input type="text" name="email_two" id="email_two" value="<?=$hidden_kakao_email_two?>">
          <script type="text/javascript">
            signup_duplicate_check();
          </script>
          <?php
          } else {
          ?>
          <input type="text"  name="email_one" id="email_one" placeholder=" 이메일 입력 "> @
          <input type="text" name="email_two" id="email_two">
          <?php
          }
          ?>
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
        <input type="text" id="input_email_certification" placeholder=" 이메일 인증 번호 입력 ">
        <div id="email_certification_check_button">
          <a href="#" id="input_email_certification_check">
            <p>확 인</p>
          </a>
        </div>
        <div id="email_certification">
          <a href="#" id="email_check">
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
      <input type="checkbox" id="all_agree"> <span id="all_agree_span"> 전체 동의 (필수, 선택 모두 포함) </span><br>
      <input type="checkbox" id="tou_one"> <span> 이용 약관 동의 (필수) </span>
      <a href="./terms_of_use.php?page=tou1" target="_blank">약관 보기</a> <br>
      <input type="checkbox" id="tou_two"> <span> 개인정보 수집 동의 (필수) </span>
      <a href="./terms_of_use.php?page=tou2" target="_blank">약관 보기</a> <br>
      <input type="checkbox" id="tou_three"> <span> 마케팅 수신 동의 (선택) </span>
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
	</section>
