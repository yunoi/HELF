<meta charset="utf-8">
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/helf//common/lib/db_connector.php";

  if (isset($_GET["mode"])) {
    $mode = $_GET["mode"];
  }
  else $mode = "";

  if (isset($_GET["o_key"])) $o_key = $_GET["o_key"];
  else $o_key = "";

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

  if (isset($_POST["s_area1"])){
    switch ($_POST["s_area1"]) {
      case '1':
        $h_area1 = "서울";
        break;
      case '2':
        $h_area1 = "부산";
        break;
      case '3':
        $h_area1 = "대구";
        break;
      case '4':
        $h_area1 = "인천";
        break;
      case '5':
        $h_area1 = "광주";
        break;
      case '6':
        $h_area1 = "대전";
        break;
      case '7':
        $h_area1 = "울산";
        break;
      case '8':
        $h_area1 = "강원";
        break;
      case '9':
        $h_area1 = "경기";
        break;
      case '10':
        $h_area1 = "경남";
        break;
      case '11':
        $h_area1 = "경북";
        break;
      case '12':
        $h_area1 = "전남";
        break;
      case '13':
        $h_area1 = "전북";
        break;
        case '14':
        $h_area1 = "제주";
        break;
      case '15':
        $h_area1 = "충남";
        break;
      case '16':
        $h_area1 = "충북";
        break;
      case '17':
        $h_area1 = "세종";
        break;
      default:
        $h_area1 = "전체";
        break;
    }

  }

  if (isset($_POST["s_area2"])){
    if($_POST["s_area2"] === "-선택-"){
      $h_area2 = "전체";
    }else{
      $h_area2 = $_POST["s_area2"];
    }
  }

  if (isset($_POST["detail"])) $detail = $_POST["detail"];
  else $detail = "";

  if($mode === "insert"){
    $location = $h_area1.",".$h_area2.",".$detail;
  }

  if (isset($_FILES["upfile"]["name"])) {
      $upfile_name = $_FILES["upfile"]["name"];
  } else {
      $upfile_name = "";
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

    echo "<script>alert('$type')</script>";

 //게시글 등록
  function program_insert($conn, $shop, $type, $subject, $content, $personnel, $end_day, $choose, $price, $location,
    $upfile_name, $upfile_type, $copied_file_name, $regist_day)
  {
    for($i=0; $i<count($_POST["choose"]); $i++){
      $choose = $_POST["choose"][$i];
      $price = $_POST["price"][$i];

      $sql = "insert into program (shop , type, subject, content, personnel, end_day, choose, price, location, file_name, file_type, file_copied, regist_day) ";
      $sql .= "values('$shop', '$type', '$subject', '$content', $personnel,'$end_day','$choose', $price,'$location', ";
      $sql .= "'$upfile_name', '$upfile_type', '$copied_file_name','$regist_day')";

      mysqli_query($conn, $sql);
    }
    $choose = "선택";
    $price = 0;

    $sql = "insert into program (shop , type, subject, content, personnel, end_day, choose, price, location, file_name, file_type, file_copied, regist_day) ";
    $sql .= "values('$shop', '$type', '$subject', '$content', $personnel,'$end_day','$choose', $price,'$location', ";
    $sql .= "'$upfile_name', '$upfile_type', '$copied_file_name','$regist_day')";

    mysqli_query($conn, $sql);


      mysqli_close($conn);                // DB 연결 끊기
  }

//프로그램 삭제
function program_delete($conn, $o_key){

      $sql = "select * from program where o_key = $o_key";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);

      $copied_name = $row["file_copied"];

      if ($copied_name)
      {
          $file_path = "./data/".$copied_name;
          unlink($file_path);
      }

      $sql = "delete from program where o_key = $o_key";
      mysqli_query($conn, $sql);
      mysqli_close($conn);

}

//게시글 수정
function program_modify($conn, $o_key, $choose, $price)
  {
    $choose = $_POST["choose"][0];
    $price = $_POST["price"][0];

      $sql = "update program set choose = '$choose', price = '$price' where o_key=$o_key";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
  }


  switch ($mode) {
    case 'delete':
      program_delete($conn , $o_key);
      echo "
         <script>
             location.href = 'admin_program_manage.php';
         </script>
       ";
      break;
    case 'modify':
      program_modify($conn, $o_key, $choose, $price);
      echo "
         <script>
             location.href = 'admin_program_manage.php';
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
