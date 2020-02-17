<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/common/lib/db_connector.php";
?>
<?php
if(!isset($_SESSION['user_id'])){
  echo "<script>alert('권한없음!');history.go(-1);</script>";
  exit;
}
?>
<meta charset="utf-8">
<?php
//*****************************************************
$content= $q_content = $sql= $result = $userid="";
$group_num = 0;
//*****************************************************
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_grade = $_SESSION['user_grade'];

// 삽입하는경우
if(isset($_GET["mode"])&&$_GET["mode"]=="insert"){
    $content = trim($_POST["content"]);
    $subject = trim($_POST["subject"]);
    if(empty($content)||empty($subject)){
      echo "<script>alert('내용이나제목입력요망!');history.go(-1);</script>";
      exit;
    }
    $subject = test_input($_POST["subject"]);
    $content = test_input($_POST["content"]);
    $user_id = test_input($user_id);
    $hit = 0;
    $q_subject = mysqli_real_escape_string($conn, $subject);
    $q_content = mysqli_real_escape_string($conn, $content);
    $q_userid = mysqli_real_escape_string($conn, $user_id);
    $q_username = mysqli_real_escape_string($conn, $user_name);
    $regist_day=date("Y-m-d (H:i)");

    //그룹번호, 들여쓰기 기본값
    $sql="INSERT INTO `notice` VALUES (null,'$q_userid','$username','$q_subject','$q_content','$regist_day',$hit);";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }

    // //현재 최대큰번호를 가져와서 그룹번호로 저장하기
    // $sql="SELECT max(num) from notice;";
    // $result = mysqli_query($conn,$sql);
    // if (!$result) {
    //   die('Error: ' . mysqli_error($conn));
    // }
    // $row=mysqli_fetch_array($result);
    // $max_num=$row['max(num)'];
    // $sql="UPDATE `notice` SET `group_num`= $max_num WHERE `num`=$max_num;";
    // $result = mysqli_query($conn,$sql);
    // if (!$result) {
    //   die('Error: ' . mysqli_error($conn));
    // }
    mysqli_close($conn);

    // echo "<script>location.href='./view.php?num=$max_num&hit=$hit';</script>";
    echo "<script>location.href='./notice.php';</script>";
}else if(isset($_GET["mode"])&&$_GET["mode"]=="delete"){
    $num = test_input($_GET["num"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    $sql ="DELETE FROM `notice` WHERE num=$q_num";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }

    mysqli_close($conn);
    echo "<script>location.href='./notice.php?page=1';</script>";

}else if(isset($_GET["mode"])&&$_GET["mode"]=="update"){
  $content = trim($_POST["content"]);
  $subject = trim($_POST["subject"]);
  if(empty($content)||empty($subject)){
    echo "<script>alert('내용이나제목입력요망!');history.go(-1);</script>";
    exit;
  }
  $subject = test_input($_POST["subject"]);
  $content = test_input($_POST["content"]);
  $userid = test_input($userid);
  $num = test_input($_POST["num"]);
  $hit = test_input($_POST["hit"]);
  $q_subject = mysqli_real_escape_string($conn, $subject);
  $q_content = mysqli_real_escape_string($conn, $content);
  $q_userid = mysqli_real_escape_string($conn, $userid);
  $q_num = mysqli_real_escape_string($conn, $num);
  $regist_day=date("Y-m-d (H:i)");

  $sql="UPDATE `notice` SET `subject`='$q_subject',`content`='$q_content',`regist_day`='$regist_day' WHERE `num`=$q_num;";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  echo "<script>location.href='./view.php?num=$num&hit=$hit';</script>";
}//end of if insert
// Header("Location: p260_score_list.php");
?>
