<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: 관리자페이지</title>
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../common/css/common.css">
    <link rel="stylesheet" type="text/css" href="../common/css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="stylesheet" href="./css/program_regist.css">
    <script src="./js/register.js"></script>
  </head>
  <body>
    <header>
      <?php
      include "../common/lib/header.php";
      include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
      ?>
    </header>
  <div id="admin"> <!--가운데 정렬을 위해 -->

   <div id="admin_border">
      <p>관리자페이지</p>


      <div id="snb">
        <aside id="left-panel" class="left-panel">
          <div id="main-menu" class="main-menu collapse navbar-collapse">
            <h3 class="menu-title">-회원관리-</h3><!-- /.menu-title -->
            <ul>
              <li><a href="admin_user.php">회원관리</a></li>
            </ul>
            <br>

            <h3 class="menu-title">-게시글 관리-</h3>
            <ul>
              <li><a href="admin_board.php">자유게시판 관리</a></li>
              <li><a href="admin_board2.php">후기게시판 관리</a></li>
            </ul>
            <br>

            <h3 class="menu-title">-프로그램 관리-</h3>
            <ul>
              <li><a href="admin_program_regist.php">프로그램 등록</a></li>
              <li><a href="admin_program_manage.php">프로그램 관리</a></li>
            </ul>
            <br>

            <h3 class="menu-title">-통계-</h3>
            <ul>
              <li><a href="admin_statistics1.php">월별매출</a></li>
              <li><a href="admin_statistics2.php">프로그램별 매출</a></li>
              <li><a href="admin_statistics3.php">회원별 매출</a></li>
            </ul>


           </div>

        </aside>
     </div><!--  end of sub -->



  <?php
  if(isset($_GET["o_key"])){
    $o_key  = $_GET["o_key"];
    $sql    = "select * from program where o_key= $o_key";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_array($result);

    $shop = $row["shop"];
    $type = $row["type"];
    $subject = $row["subject"];
    $content = $row["content"];
    $personnel = $row["personnel"];
    $end_day = $row["end_day"];
    $choose = $row["choose"];
    $price = $row["price"];
    $location = $row["location"];
    $file_name = $row["file_name"];
    $file_type = $row["file_type"];
    $file_copied = $row["file_copied"];
    $mod = "modify";

    mysqli_close($conn);
  }else{
    $shop = "";
    $type = "";
    $subject = "";
    $content = "";
    $personnel = "";
    $end_day = "";
    $choose = "";
    $price = "";
    $location = "";
    $file_name = "";
    $mod = "insert";

  }
  ?>

     <div id="content">
    			<h3>프로그램 관리 > 등록</h3><br>
          <form name="program_regist" class="" action="program_curd.php?mode=<?=$mod?>&o_key=<?=$o_key?>" method="post" enctype="multipart/form-data">
            <table>
              <tr>
                <td>샵 이름</td>
                <td>
                  <input type="text" name="shop" value=<?=$shop?>>
                </td>
              </tr>
              <tr>
                <td>운동 종류</td>
                <td>
                  <select name="type" class="kind_sel">
                    <option value="선택" selected>-선택-</option>
                    <option value="헬스">헬스</option>
                    <option value="수영">수영</option>
                    <option value="자전거">자전거</option>
                    <option value="요가/필라테스">요가/필라테스</option>
                    <option value="기타">기타</option>
                    <option value="등등">등등</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>제목</td>
                <td>
                  <input type="text" name="subject" value=<?=$subject?>>
                </td>
              </tr>
              <tr>
                <td>내용</td>
                <td>
                  <input type="text" name="content" value=<?=$content?>>
                </td>
              </tr>
              <tr>
                <td>모집인원</td>
                <td>
                  <input type="number" name="personnel" value=<?=$personnel?>>
                </td>
              </tr>
              <tr>
                <td>모집 마감일</td>
                <td>
                  <input type="text" name="end_day" value=<?=$end_day?>>
                </td>
              </tr>
              <tr>
                <td>옵션</td>
                <td>
                  <input type="text" name="choose" value=<?=$choose?>>
                </td>
              </tr>
              <tr>
                <td>가격</td>
                <td>
                  <input type="number" name="price" value=<?=$price?>> 원
                </td>
              </tr>
              <tr>
                <td>지역
                <td>
                  <?php include "../program/select_location.php";?>
                </td>
              </tr>
              <tr>
                <td>상세주소
                <td>
                  <input type="text" name="detail" value="">
                </td>
              </tr>
              <tr>
                <td>파일선택</td>
                <td>
                  <?=$file_name?>&nbsp&nbsp<input type="file" name="upfile" value="">
                </td>
              </tr>
              <tr>
                <td> </td>
                <td>
                  <?php
                    if(isset($_GET["o_key"])){
                      echo "<input type='submit' value='수정1'>";
                    }else{
                      echo "<input type='submit' value='등록1'>";
                    }

                   ?>
                   <input type="button" name="" value="취소">

                </td>
              </tr>
            </table>

          </form>
    		</div><!--  end of content-->

 </div><!--  end of admin_board -->



</div><!--  end of admin -->

  <div id="footer">
    <p>#footer</p>
  </div>




  </body>
</html>
