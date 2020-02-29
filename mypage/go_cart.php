<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
$id = $_SESSION["user_id"];

if(isset($_GET["shop"])) {
  $shop = $_GET["shop"];

} else {
  $shop = "";
}

if(isset($_GET["type"])) {
  $type = $_GET["type"];

} else {
  $type = "";
}

if(isset($_POST["choose_box"])) {
  $choose = $_POST["choose_box"];

} else {
  $choose = "";
}

if($choose === "선택") {

  echo "<script>alert('옵션을 선택하세요!');</script>";
  echo "<script>history.go(-1);</script>";

} else {

  $sql = "select o_key from program where shop='$shop' and type='$type' and choose='$choose'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $o_key = (int)$row["o_key"];

  $sql2 = "select * from cart where id='$id' and o_key=$o_key;";
  $result2 = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_array($result2);

  if($row) {

    echo "<script>alert('이미 장바구니에 들어있는 옵션입니다!');</script>";
    echo "<script>history.go(-1);</script>";

  } else {

    $sql3 = "insert into cart values (null, '$id', $o_key);";
    $result3 = mysqli_query($conn, $sql3);

    if($result3) {
      echo "<script>alert('장바구니에 추가되었습니다!');</script>";
      echo "<script>history.go(-1);</script>";
    } else {
      echo "<script>alert('오류 발생!');</script>";
      echo "<script>history.go(-1);</script>";
    }

  }

}

?>
