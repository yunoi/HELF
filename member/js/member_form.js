$(document).ready(function() {

  var input_id = $("#input_id"),
    input_password = $("#input_password"),
    input_password_check = $("#input_password_check"),
    input_id = $("#input_id"),
    input_name = $("#input_name"),

    // 공백 체크
    phone_two = $("#phone_two"),
    phone_three = $("#phone_three"),
    address_one = $("#address_one"),
    address_two = $("#address_two"),
    address_three = $("#address_three"),
    email_one = $("#email_one"),
    email_two = $("#email_two"),
    input_email_certification = $("#input_email_certification"),

    input_id_confirm = $("#input_id_confirm");
    input_password_confirm = $("#input_password_confirm");
    input_id_confinput_password_check_confirmirm = $("#input_password_check_confirm");
    input_name_confirm = $("#input_name_confirm");
    input_phone_confirm = $("#input_phone_confirm");
    input_address_confirm = $("#input_address_confirm");
    input_email_confirm = $("#input_email_confirm");
    input_email_certification_confirm = $("#input_email_certification_confirm");

  input_id.blur(function() {
    var id_value = input_id.val();
    var exp = /^[a-z0-9]{5,20}$/;
    if (id_value === "") {
      input_id_confirm.html("<span style='color:red'>아이디를 입력해주세요.</span>");
    } else if (!exp.test(id_value)) {
      input_id_confirm.html("<span style='color:red'>아이디는 5~20자의 영문 소문자와 숫자만 사용할 수 있습니다.</span>");
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
            } else if (data === "0") {
              input_id_confirm.html("<span style='color:green'>사용 가능한 아이디입니다.</span>");
            } else {
              input_id_confirm.html("<span style='color:red'>오류입니다. 다시 확인해주세요.</span>");
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
    } else if (!exp.test(password_value)) {
      input_password_confirm.html("<span style='color:red'>비밀번호는 5~20자의 영문 소문자와 숫자만 사용할 수 있습니다.</span>");
    } else {
      input_password_confirm.html("<span style='color:green'>사용 가능한 비밀번호입니다.</span>");
    }
  }); //input_password.blur end

  input_password_check.blur(function() {
    var password_value = input_password.val();
    var password_check_value = input_password_check.val();
    if (password_check_value === "") {
      input_id_confinput_password_check_confirmirm.html("<span style='color:red'>비밀번호를 재입력해주세요.</span>");
    } else if (password_check_value !== password_value) {
      input_id_confinput_password_check_confirmirm.html("<span style='color:red'>비밀번호가 일치하지 않습니다.</span>");
    } else {
      input_id_confinput_password_check_confirmirm.html("<span style='color:green'>비밀번호와 일치합니다.</span>");
    }
  }); //input_password_check.blur end

  input_name.blur(function() {
    var name_value = input_name.val();
    var exp = /^[a-zA-Z가-힣]{2,10}$/;
    if (name_value === "") {
      input_name_confirm.html("<span style='color:red'>이름을 입력해주세요.</span>");
    } else if (!exp.test(name_value)) {
      input_name_confirm.html("<span style='color:red'>이름은 2자 이상의 한글과 영문대소문자만 사용 할 수 있습니다.</span>");
    } else {
      input_name_confirm.html("<span style='color:green'></span>");
    }
  }); //input_name.blur end


}); //document ready end
