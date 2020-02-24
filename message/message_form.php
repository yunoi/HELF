<?php
session_start();
if(isset($_SESSION["user_id"])){
  $user_id = $_SESSION["user_id"];
} else {
  $user_id = "";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: 메시지함</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/message.css">
    <link rel="shortcut icon" href="./favicon.ico">
    <script src="./js/message.js"></script>
  </head>
  <body>
    <?php
      if(!$user_id){
        echo ("<script>
          alert('로그인 후 이용해 주세요!');
          history.go(-1);
          </script>
        ");
      }
    ?>
    <section>
      <div id="message_box">
        <h3 id="write_title">메시지 보내기</h3>
        <ul class="top_buttons">
          <li><a href="message_box.php?mode=receive">받은 메시지</a></li>
          <li><a href="message_box.php?mode=send">보낸 메시지</a></li>
        </ul>
        <form name="message_form" action="message_insert.php" method="post">
          <div id="write_msg">
            <ul>
              <li>
                <span class="col1">보내는 사람: </span>
                <span class="col2"><?=$user_id?></span>
                <input type="hidden" name="send_id" value="<?=$user_id?>">
              </li>
              <li>
                <span class="col1">받는 사람 <br>아이디: </span>
                <span class="col2"><input type="text" name="rv_id" value=""></span>
              </li>
              <li>
                <span class="col1">제목: </span>
                <span class="col2"><input type="text" name="subject" value=""></span>
              </li>
              <li id="text_area">
                <span class="col1">내용: </span>
                <span class="col2"><textarea name="content"></textarea></span>
              </li>
            </ul>
            <div class="bottom_buttons">
            <button type="button" onclick="history.go(-1)">뒤로가기</button>
            <button type="button" onclick="check_message()">보내기</button>
            </div>          </div>
        </form>
      </div>
    </section>
  </body>
</html>
