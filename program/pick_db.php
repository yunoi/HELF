<?php

session_start();
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";

if (!$conn) {
    die("Error connecting to database: " . mysqli_connect_error($conn));
    exit();
}

if(isset($_SESSION["user_id"])){
  $user_id = $_SESSION["user_id"];
} else {
  echo "<script>alert('로그인 후 이용해주세요^오^')</script>";
  echo "<script>history.go(-1);</script>";
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

if (isset($_POST["option"])){
  $option = $_POST["option"];
  $p_option = explode(',', $option );
  $shop = $p_option[0];
  $type = $p_option[1];
  $choose = $p_option[2];
}else{
  $option = "";
}

if (isset($_GET["mode"])){
  $mode = $_GET["mode"];
}else{
  $mode = "";
}


function pick_insert($conn, $user_id, $o_key, $shop){

  $sql = "insert into pick values (null,'$user_id','$o_key')";

  mysqli_query($conn, $sql);
  mysqli_close($conn);

  echo "<script>alert('$shop'+' 찜 목록에 추가완료!');</script>";
  echo "<script>history.go(-1);</script>";

}

function pick_delete($conn, $user_id, $o_key, $shop){

  $sql = "delete from pick where id ='$user_id' and o_key ='$o_key'";

  mysqli_query($conn, $sql);
  mysqli_close($conn);

  echo "<script>alert('$shop'+' 찜 삭제완료!');</script>";
  echo "<script>history.go(-1);</script>";

}

function cart_insert($conn, $user_id, $shop, $type, $choose){

  $sql = "select o_key from program where shop = '$shop' and type = '$type' and choose = '$choose'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $o_key = $row["o_key"];

  $sql = "insert into cart values (null, '$user_id', '$o_key')";
  mysqli_query($conn, $sql);
  mysqli_close($conn);

  echo "<script>alert('$choose'+' 장바구니에 추가완료!');</script>";
  echo "<script>history.go(-1);</script>";

}

function cart_delete($conn, $user_id, $o_key, $shop){

  $sql = "delete from cart where id ='$user_id' and o_key ='$o_key'";

  mysqli_query($conn, $sql);
  mysqli_close($conn);

  echo "<script>alert('삭제완료!');</script>";
  echo "<script>history.go(-1);</script>";

}

switch ($mode) {
  case 'insert':
    pick_insert($conn, $user_id, $o_key, $shop);
    break;
  case 'delete':
    pick_delete($conn, $user_id, $o_key, $shop);
    break;
  case 'cart_insert':
    cart_insert($conn, $user_id, $shop, $type, $choose);
    break;
  case 'cart_insert':
    cart_delete($conn, $user_id, $o_key, $shop);
    break;

}

?>
