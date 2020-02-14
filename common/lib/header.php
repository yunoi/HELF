<?php
  session_start();
  // include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/create_table.php";

  if(isset($_SESSION["userId"])){
    $userId = $_SESSION["userId"];
  } else {
    $userId = "";
  }
  if(isset($_SESSION["userName"])){
    $userName = $_SESSION["userName"];
  } else {
    $userName = "";
  }
  if(isset($_SESSION["userLevel"])){
    $userLevel = $_SESSION["userLevel"];
  } else {
    $userLevel = "";
  }
  if(isset($_SESSION["userPoint"])){
    $userPoint = $_SESSION["userPoint"];
  } else {
    $userPoint = "";
  }
?>
  <div id="top">
    <ul id="top_menu">
<?php
  if(!$userId) {
?>
      <li><a href="./member/member_form.php">회원가입</a></li>
      <li> | </li>
      <li><a href="./login/login_form.php">로그인</a></li>
<?php
  } else {
    $logged = $userName."(".$userId.")";
    $logged_etc = "님 [Level: ".$userLevel.", Point: ".$userPoint."]";
?>
      <li><span><?=$logged?></span><span><?=$logged_etc?></span></li>
      <!-- onclick="window.open('message_box.php?mode=receive','메시지함', 'width=200,height=600,scrollbars=no,resizable=yes')" -->
      <li> | </li>
      <li><a href="logout.php">로그아웃</a></li>
      <li> | </li>
      <li><a href="member_modify_form.php">정보수정</a></li>
<?php
  }
?>
<?php
    if($userLevel==1) {
?>
                <li> | </li>
                <li><a href="admin.php">관리자페이지</a></li>
<?php
    }
?>
    </ul>
  </div>
  <nav id="menu_bar">
    <ul>
      <li id="li_first">
      <a href="./index.php"><img src="./common/img/helf_logo.png" alt="헬프 로고"></a>
      </li>
      <li><a href='#'><span>소개</span></a></li>
      <li><a href='#'><span>프로그램</span></a></li>
      <li><a href='#'><span>커뮤니티</span></a></li>
      <li><a href="#"><span>건강정보</span></a></li>
      <li><a href="#"><span>같이할건강</span></a></li>
    </ul>
  </nav>
