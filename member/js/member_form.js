var id_pass = false;
var pw_pass = false;
var pw_check_pass = false;
var name_pass = false;
var phone_two_pass = false;
var phone_three_pass = false;
var email_one_pass = false;
var email_two_pass = false;
var address_one_pass = false;
var address_thre_pass = false;


// 핸드폰 인증, 이메일 인증 이벤트 해줘야해~~!

$(document).ready(function() {
  isAllPass();
  var input_id = $("#input_id"),
    input_password = $("#input_password"),
    input_password_check = $("#input_password_check"),
    input_id = $("#input_id"),
    input_name = $("#input_name"),

    phone_two = $("#phone_two"),
    phone_three = $("#phone_three"),
    email_one = $("#email_one"),
    email_two = $("#email_two"),
    input_email_certification = $("#input_email_certification"),
    address_one = $("#address_one"),
    address_three = $("#address_three"),

    input_id_confirm = $("#input_id_confirm");
  input_password_confirm = $("#input_password_confirm");
  input_id_confinput_password_check_confirmirm = $("#input_password_check_confirm");
  input_name_confirm = $("#input_name_confirm");
  input_phone_confirm = $("#input_phone_confirm");
  input_email_confirm = $("#input_email_confirm");
  input_email_certification_confirm = $("#input_email_certification_confirm");
  input_address_confirm = $("#input_address_confirm");

  input_id.blur(function() {
    var id_value = input_id.val();
    var exp = /^[a-z0-9]{5,20}$/;
    if (id_value === "") {
      input_id_confirm.html("<span style='color:red'>아이디를 입력해주세요.</span>");
      id_pass = false;
      isAllPass();
    } else if (!exp.test(id_value)) {
      input_id_confirm.html("<span style='color:red'>아이디는 5~20자의 영문 소문자와 숫자만 사용할 수 있습니다.</span>");
      id_pass = false;
      isAllPass();
    } else {
      $.ajax({
          url: './member_form_check.php',
          type: 'POST',
          data: {
            "input_id": id_value
          },
          success: function(data) {
            console.log(data);
            if (data === "1") {
              input_id_confirm.html("<span style='color:red'>이미 사용중인 아이디입니다. 다른 아이디를 입력해주세요.</span>");
              id_pass = false;
              isAllPass();
            } else if (data === "0") {
              input_id_confirm.html("<span style='color:green'>사용 가능한 아이디입니다.</span>");
              id_pass = true;
              isAllPass();
            } else {
              input_id_confirm.html("<span style='color:red'>오류입니다. 다시 확인해주세요.</span>");
              id_pass = false;
              isAllPass();
            }
          }
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
    }
  }); //input_id.blur end

  input_password.blur(function() {
    var password_value = input_password.val();
    var exp = /^[a-z0-9]{5,20}$/;
    if (password_value === "") {
      input_password_confirm.html("<span style='color:red'>비밀번호를 입력해주세요.</span>");
      pw_pass = false;
      isAllPass();
    } else if (!exp.test(password_value)) {
      input_password_confirm.html("<span style='color:red'>비밀번호는 5~20자의 영문 소문자와 숫자만 사용할 수 있습니다.</span>");
      pw_pass = false;
      isAllPass();
    } else {
      input_password_confirm.html("<span style='color:green'>사용 가능한 비밀번호입니다.</span>");
      pw_pass = true;
      isAllPass();
    }
  }); //input_password.blur end

  input_password_check.blur(function() {
    var password_value = input_password.val();
    var password_check_value = input_password_check.val();
    if (password_check_value === "") {
      input_id_confinput_password_check_confirmirm.html("<span style='color:red'>비밀번호를 재입력해주세요.</span>");
      pw_check_pass = false;
      isAllPass();
    } else if (password_check_value !== password_value) {
      input_id_confinput_password_check_confirmirm.html("<span style='color:red'>비밀번호가 일치하지 않습니다.</span>");
      pw_check_pass = false;
      isAllPass();
    } else {
      input_id_confinput_password_check_confirmirm.html("<span style='color:green'>비밀번호와 일치합니다.</span>");
      pw_check_pass = true;
      isAllPass();
    }
  }); //input_password_check.blur end

  input_name.blur(function() {
    var name_value = input_name.val();
    var exp = /^[a-zA-Z가-힣]{2,10}$/;
    if (name_value === "") {
      input_name_confirm.html("<span style='color:red'>이름을 입력해주세요.</span>");
      name_pass = false;
      isAllPass();
    } else if (!exp.test(name_value)) {
      input_name_confirm.html("<span style='color:red'>이름은 2자 이상의 한글과 영문대소문자만 사용 할 수 있습니다.</span>");
      name_pass = false;
      isAllPass();
    } else {
      input_name_confirm.html("");
      name_pass = true;
      isAllPass();
    }
  }); //input_name.blur end

  phone_two.blur(function() {
    var phone_two_value = phone_two.val();
    var exp = /^[0-9]{3,4}$/;
    if (phone_two_value === "") {
      input_phone_confirm.html("<span style='color:red'>번호를 입력해주세요.</span>");
      phone_two_pass = false;
      isAllPass();
    } else if (!exp.test(phone_two_value)) {
      input_phone_confirm.html("<span style='color:red'>번호는 3~4자의 숫자만 사용 할 수 있습니다.</span>");
      phone_two_pass = false;
      isAllPass();
    } else {
      input_phone_confirm.html("");
      phone_two_pass = true;
      isAllPass();
    }
  }); //phone_two.blur end

  phone_three.blur(function() {
    var phone_three_value = phone_three.val();
    var exp = /^[0-9]{3,4}$/;
    if (phone_three_value === "") {
      input_phone_confirm.html("<span style='color:red'>번호를 입력해주세요.</span>");
      phone_three_pass = false;
      isAllPass();
    } else if (!exp.test(phone_three_value)) {
      input_phone_confirm.html("<span style='color:red'>번호는 3~4자의 숫자만 사용 할 수 있습니다.</span>");
      phone_three_pass = false;
      isAllPass();
    } else {
      input_phone_confirm.html("");
      phone_three_pass = true;
      isAllPass();
    }
  }); //phone_three.blur end

  email_one.blur(function() {
    var email_one_value = email_one.val();
    var exp = /^[a-z0-9]{2,20}$/;
    if (email_one_value === "") {
      input_email_confirm.html("<span style='color:red'>이메일을 입력해주세요.</span>");
      email_one_pass = false;
      isAllPass();
    } else if (!exp.test(email_one_value)) {
      input_email_confirm.html("<span style='color:red'>이메일은 2자 이상의 영문소문자와 숫자만 사용 할 수 있습니다.</span>");
      email_one_pass = false;
      isAllPass();
    } else {
      input_email_confirm.html("<span style='color:green'></span>");
      email_one_pass = true;
      isAllPass();
    }
  }); //email_one.blur end

  email_two.blur(function() {
    var email_two_value = email_two.val();
    if (email_two_value === "") {
      input_email_confirm.html("<span style='color:red'>이메일 주소를 선택해주세요.</span>");
      email_two_pass = false;
      isAllPass();
    } else if (email_two_value !== "") {
      input_email_confirm.html("");
      email_two_pass = true;
      isAllPass();
    }
  }); //email_two.blur end

  address_one.blur(function() {
    var address_one_value = address_one.val();
    if (address_one_value === "") {
      input_address_confirm.html("<span style='color:red'>우편번호를 입력해주세요.</span>");
      address_one_pass = false;
      isAllPass();
    } else if (address_one_value !== "") {
      input_address_confirm.html("");
      address_one_pass = true;
      isAllPass();
    }
  }); //address_one.blur end


  address_three.blur(function() {
    var address_three_value = address_three.val();
    var exp = /^[a-zA-Z가-힣0-9-\s]{1,30}$/;
    if (address_three_value === "") {
      input_address_confirm.html("<span style='color:red'>상세주소를 입력해주세요.</span>");
      address_three_pass = false;
      isAllPass();
    } else if (!exp.test(address_three_value)) {
      input_address_confirm.html("<span style='color:red'>주소는 영문대소문자와 한글과 숫자와 - 기호만 사용 할 수 있습니다.</span>");
      address_three_pass = false;
      isAllPass();
    } else {
      input_address_confirm.html("");
      address_three_pass = true;

      isAllPass();
    }
  }); //address_three.blur end

  function isAllPass() {
    if (id_pass && pw_pass && pw_check_pass && name_pass && phone_two_pass && phone_three_pass &&
      email_one_pass && email_two_pass && address_one_pass && address_three_pass) {
      $("#button_submit").attr("disabled", false);
    } else {
      $("#button_submit").attr("disabled", true);
    }
  }

}); //document ready end
