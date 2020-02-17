<meta charset="utf-8">
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/helf//common/lib/db_connector.php";

  if (isset($_GET["mode"])) $mode = $_GET["mode"];
  else $mode = "";

  if (isset($_POST["shop"])) $shop = $_POST["shop"];
  else $shop = "";

  if (isset($_POST["type"])) $type = $_POST["type"];
  else $type = "";

  if (isset($_POST["subject"])) $subject = $_POST["subject"];
  else $subject = "";

  if (isset($_POST["content"])) $content = $_POST["content"];
  else $content = "";

  if (isset($_POST["personnel"])) $personnel = $_POST["personnel"];
  else $personnel = "";

  if (isset($_POST["end_day"])) $end_day = $_POST["end_day"];
  else $end_day = "";

  if (isset($_POST["choose"])) $choose = $_POST["choose"];
  else $choose = "";

  if (isset($_POST["price"])) $price = $_POST["price"];
  else $price = "";

  if (isset($_POST["h_area1"])) $h_area1 = $_POST["h_area1"];
  else $h_area1 = "";

  if (isset($_POST["h_area2"])) $h_area2 = $_POST["h_area2"];
  else $h_area2 = "";

  if (isset($_POST["detail"])) $detail = $_POST["detail"];
  else $detail = "";



  $location = $h_area1.",".$h_area2.",".$detail;

  if (isset($_FILES["upfile"]["name"])) {
      $upfile_name = $_FILES["upfile"]["name"];
  } else {
      $upfile_name = "왜안떠";
  }
  if (isset($_FILES["upfile"]["tmp_name"])) {
      $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
  } else {
      $upfile_tmp_name = "";
  }
  if (isset($_FILES["upfile"]["type"])) {
      $upfile_type = $_FILES["upfile"]["type"];
  } else {
      $upfile_type = "";
  }
  if (isset($_FILES["upfile"]["size"])) {
      $upfile_size = $_FILES["upfile"]["size"];
  } else {
      $upfile_size = "";
  }
  if (isset($_FILES["upfile"]["error"])) {
      $upfile_error = $_FILES["upfile"]["error"];
  } else {
      $upfile_error = "";
  }

    echo "<script>alert('$upfile_name');</script>";



  $regist_day = date("Y-m-d");  // 현재의 '년-월-일-시-분'을 저장

  $upload_dir = './data/';


  if ($upfile_name && !$upfile_error) {
        $file = explode(".", $upfile_name);
        $file_name = $file[0];
        $file_ext  = $file[1];

        $new_file_name = date("Y_m_d_H_i_s");
        $copied_file_name = $new_file_name.".".$file_ext;
        $uploaded_file = $upload_dir.$copied_file_name;

        if ($upfile_size  > 1000000) {
            echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
            exit;
        }

        if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
            echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
            exit;
        }
    } else {
        $upfile_name      = "";
        $upfile_type      = "";
        $copied_file_name = "";
    }







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
  function board_delete($con, $num, $page)
  {
      $sql = "select * from board where num = $num";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result);

      $copied_name = $row["file_copied"];

      if ($copied_name) {
          $file_path = "./data/".$copied_name;
          unlink($file_path);
      }

      $sql = "delete from board where num = $num";
      mysqli_query($con, $sql);
      mysqli_close($con);
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
      board_delete($con, $num, $page);
      echo "
         <script>
             location.href = 'board_list.php?page=$page';
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
