<?php
  include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";

  $id   = $_POST["id"];
  $password = $_POST["password"];
  $name = $_POST["name"];
  $phone_one = $_POST["phone_one"];
  $phone_two = $_POST["phone_two"];
  $phone_three = $_POST["phone_three"];
  $email_one = $_POST["email_one"];
  $email_two = $_POST["email_two"];
  $address_one = $_POST["address_one"];
  $address_two =  $_POST["address_two"];
  $address_three = $_POST["address_three"];

  $phone = $phone_one."-".$phone_two."-".$phone_three;
  $email = $email_one."@".$email_two;
  $address = $address_one."/".$address_two."/".$address_three;

	$sql = "insert into members (id, password, name, phone, email, address, grade) ";
	$sql .= "values('$id', '$password', '$name', '$phone', '$email', '$address', null)";

	$result = mysqli_query($conn, $sql);  // $sql 에 저장된 명령 실행

  mysqli_close($conn);

  echo "
      <script>
          location.href = '../index.php';
      </script>
  ";
?>
