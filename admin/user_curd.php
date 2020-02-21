<meta charset="utf-8">
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/helf//common/lib/db_connector.php";

  if (isset($_GET["mode"])) $mode = $_GET["mode"];
  else $mode = "";

  if (isset($_GET["id"])) $id = $_GET["id"];
  else $id = "";

  if (isset($_POST["name"])) $type = $_POST["name"];
  else $type = "";

  if (isset($_POST["phone"])) $subject = $_POST["phone"];
  else $subject = "";

  if (isset($_POST["email"])) $content = $_POST["email"];
  else $content = "";

  if (isset($_POST["address"])) $personnel = $_POST["address"];
  else $personnel = "";

  if (isset($_POST["grade"])) $end_day = $_POST["grade"];
  else $end_day = "";



 //게시글 등록
  function program_insert($conn, $shop, $type, $subject, $content, $personnel, $end_day, $choose, $price, $location,
    $upfile_name, $upfile_type, $copied_file_name, $regist_day)
  {
      $sql = "insert into program (shop , type, subject, content, personnel, end_day, choose, price, location, file_name, file_type, file_copied, regist_day) ";
      $sql .= "values('$shop', '$type', '$subject', '$content', $personnel,'$end_day','$choose', $price,'$location', ";
      $sql .= "'$upfile_name', '$upfile_type', '$copied_file_name','$regist_day')";

      mysqli_query($conn, $sql);
      mysqli_close($conn);                // DB 연결 끊기
  }

//게시글 삭제
  function user_delete($conn, $id)
  {
      $sql = "delete from members where id = '$id'";
      mysqli_query($conn, $sql);

  }

//게시글 수
  function board_modify($con, $num, $subject, $content, $upfile_name, $upfile_type, $copied_file_name)
  {
      $sql = "update board set subject='$subject', content='$content', file_name='$upfile_name', file_type='$upfile_type', file_copied='$copied_file_name' ";
      $sql .= " where num=$num";
      mysqli_query($con, $sql);
      mysqli_close($con);
  }


  switch ($mode) {
    case 'delete':
      user_delete($conn, $id);
      echo "
         <script>
             location.href = 'admin_user.php';
         </script>
       ";
      break;
    case 'modify':
      board_modify($con, $num, $subject, $content, $upfile_name, $upfile_type, $copied_file_name);
      echo "
         <script>
             location.href = 'board_list.php?page=$page';
         </script>
       ";
      break;
    case 'insert':
     program_insert($conn, $shop, $type, $subject, $content, $personnel, $end_day, $choose, $price, $location, $upfile_name, $upfile_type, $copied_file_name, $regist_day);
     echo "
   	   <script>
   	    location.href = 'admin_page.php';
   	   </script>
   	";
    break;

    default:

      break;
  }
?>
