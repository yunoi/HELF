<?php
  if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
  } else {
    $user_id = "";
  }
  if(isset($_SESSION["user_name"])){
    $user_name = $_SESSION["user_name"];
  } else {
    $user_name = "";
  }
  if(isset($_SESSION["user_grade"])){
    $user_grade = $_SESSION["user_grade"];
  } else {
    $user_grade = "";
  }

?>
<div id="header_container">
<div id="top">
    <ul id="top_menu">
<?php
  if(!$user_id) {
?>
        <li>
            <a
                href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/member/member_form.php">회원가입</a>
        </li>
        <li>
            |
        </li>
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/login/login_form.php">로그인</a>
        </li>
    <?php
  } else {
    $logged = $user_name."(".$user_id.")";
    $logged_etc = "님 [Level: ".$user_grade."]";
?>
      <li><span><?=$logged?></span><span><?=$logged_etc?></span></li>
      <li> | </li>

      <li>
        <a
            href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/login/logout.php">로그아웃</a>
      </li>
      <li> | </li>
      <li><a href="member_modify_form.php">정보수정</a></li>
<?php
  }
?>
<?php
    if($user_grade =='admin') {
?>
                <li> | </li>
                <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/admin/admin_page.php">관리자페이지</a></li>
<?php
    }
?>
    </ul>
</div>
<nav id="menu_bar">
    <ul>
        <li id="li_img">
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/index.php">
                <img
                    src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/helf_logo.png"
                    alt="헬프 로고">
            </a>
        </li>
        <li class="down_menu">
        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/HELF/introduction/introduction.php"><span>&nbsp;&nbsp;&nbsp;소개</span></a>
        <ol class="menu_slide" id="about_slide">
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/HELF/introduction/introduction.php">HELF</a></li>
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/HELF/notice/notice.php">공지사항</a></li>
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/HELF/FAQ/list.php">FAQ</a></li>
                </ol>
              </li>
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/HELF/program/programtest.php">
                <span>프로그램</span></a>
        </li>
        <li class="down_menu">
            <a
                href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/community/free/list.php">
                <span>커뮤니티</span></a>
                <ol class="menu_slide" id="community_slide">
                  <li><a href="#">자유게시판</a></li>
                  <li><a href="#">후기게시판</a></li>
                </ol>
              </li>

        <li class="down_menu">
            <a href="#">
                <span>건강정보</span></a>
                <ol class="menu_slide" id="info_slide">
                  <li><a href="#">운동</a></li>
                  <li><a href="#">레시피</a></li>
                </ol>
        </li>
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/together/free/list.php">
                <span>같이할건강</span></a>
        </li>
    </ul>
</nav>
</div>
