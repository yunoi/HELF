<?php
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
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/member/member_form.php">회원가입</a></li>
      <li> | </li>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/login/login_form.php">로그인</a></li>
<?php
  } else {
    $logged = $userName."(".$userId.")";
    $logged_etc = "님 [Level: ".$userLevel.", Point: ".$userPoint."]";
?>
      <li><span><?=$logged?></span><span><?=$logged_etc?></span></li>
      <li> | </li>
      <li><a href="logout.php">로그아웃</a></li>.
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
      <li id="li_img">
      <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/index.php">
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/helf_logo.png" alt="헬프 로고">
      </a>
      </li>
      <li id="li_first_menu"><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/HELF/introduction/introduction.php">소개</a></li>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/HELF/program/program.php">프로그램</a></li>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/community/free/list.php">커뮤니티</a></li>
      <li><a href="#">건강정보</a></li>
      <li><a href="#">같이할건강</a></li>
    </ul>
  </nav>
