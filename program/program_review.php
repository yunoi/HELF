<?php
  session_start();
 include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/create_table.php";
 include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/common_func.php";
?>

 <meta charset="utf-8">
 <?php
 //*****************************************************
 $content= $q_content = $sql= $result = $userid="";

 // 삽입하는경우
 if(isset($_GET["mode"])&&$_GET["mode"]=="insert"){
     $content = trim($_POST["content"]);
     if(empty($content)){
       echo "<script>alert('내용을 입력해주세요');history.go(-1);</script>";
       exit;
     }
     $id=$_SESSION["user_id"];
     $o_key=$_POST["o_key"];
     $type=$_POST["type"];
     $shop=$_POST["shop"];
     $star=(int)$_POST["star"];
     $regist_day=date("Y-m-d (H:i)");
     $content = test_input($_POST["content"]);
     $q_content = mysqli_real_escape_string($conn, $content);
     // 구성순서 (id,o_key,content,day,type,shop,star);
     $sql="INSERT INTO `p_review` VALUES ('$id',$o_key,'$q_content','$regist_day','$type','$shop',$star);";
     $result = mysqli_query($conn,$sql);
     if (!$result) {
       die('Error: '. mysqli_error($conn));
     }
     mysqli_close($conn);

     echo "<script>location.href='./program.php';</script>";
 }else if(isset($_GET["mode"])&&$_GET["mode"]=="delete"){
   $id=$_SESSION["user_id"];
   $o_key=$_POST["o_key"];
   $type=$_POST["type"];
   $shop=$_POST["shop"];
     $sql ="DELETE FROM `p_review` WHERE id='$id' and o_key='$o_key' and type='$type' and shop='$shop';";
     $result = mysqli_query($conn,$sql);
     if (!$result) {
       die('Error: ' . mysqli_error($conn));
     }
     mysqli_close($conn);
     echo "<script>location.href='./program_detail.php';</script>";

 }else if(isset($_GET["mode"])&&$_GET["mode"]=="update"){
   $content = trim($_POST["content"]);
   if(empty($content)){
     echo "<script>alert('내용을 입력해주세요');history.go(-1);</script>";
     exit;
   }
   $id=$_SESSION["user_id"];
   $o_key=$_POST["o_key"];
   $type=$_POST["type"];
   $shop=$_POST["shop"];
   $star=$_POST["star"];
   $regist_day=date("Y-m-d (H:i)");
   $q_subject = mysqli_real_escape_string($conn, $subject);
   $q_content = mysqli_real_escape_string($conn, $content);
   $q_num = mysqli_real_escape_string($conn, $num);

   $sql="UPDATE `p_review` SET `content`='$q_content' WHERE `id`='$id' and o_key='$o_key' and type='$type' and shop='$shop';";
   $result = mysqli_query($conn,$sql);
   if (!$result) {
     die('Error: ' . mysqli_error($conn));
   }
   echo "<script>location.href='./program_detail.php';</script>";
 }
 ?>
