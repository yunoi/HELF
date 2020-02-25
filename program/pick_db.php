<?php

session_start();
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";

if (!$conn) {
    die("Error connecting to database: " . mysqli_connect_error($conn));
    exit();
}

if (isset($_GET["o_key"])){
  $o_key = $_GET["o_key"];
}else{
  $o_key = "";
}

if (isset($_GET["shop"])){
  $shop = $_GET["shop"];
}else{
  $shop = "";
}

if(isset($_SESSION["user_id"])){
  $user_id = $_SESSION["user_id"];
} else {
  $user_id = "";
}



$sql = "insert into pick values (null,'$user_id','$o_key')";

mysqli_query($conn, $sql);
mysqli_close($conn);

echo "<script>alert('$o_key'+' 찜 목록에 추가완료!');</script>";
echo "<script>document.location.href='./programtest.php';</script>";




?>
