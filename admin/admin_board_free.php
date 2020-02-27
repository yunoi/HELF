<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>HELF :: 관리자페이지</title>
  <link rel="stylesheet" type="text/css" href="./css/admin.css">
  <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
  <link
      rel="stylesheet"
      type="text/css"
      href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
  <link
      rel="stylesheet"
      type="text/css"
      href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/main.css">
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>

  <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
  <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
  <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/js/main.js"></script>
</head>
  <body>
    <header>
      <?php include "../common/lib/header.php";?>
    </header>
    <section>
        <div id="admin_border">
          <div id="snb">
            <div id="snb_title">
              <h1>관리자 페이지</h1>
            </div>
            <div id="admin_menu_bar">
              <h2>회원관리</h2><!-- /.menu-title -->
                <ul>
                  <li><a href="admin_user.php">회원관리</a></li>
                </ul>

              <h2>게시글 관리</h2>
                <ul>
                  <li><a href="admin_board_free.php">자유게시판</a></li>
                  <li><a href="admin_board_review.php">후기게시판</a></li>
                  <li><a href="admin_board_together.php">같이할건강</a></li>
                </ul>

              <h2>프로그램 관리</h2>
                <ul>
                  <li><a href="admin_program_regist.php">프로그램 등록</a></li>
                  <li><a href="admin_program_manage.php">프로그램 관리</a></li>
                </ul>

              <h2>통계</h2>
                <ul id="sta_ul">
                  <li><a href="admin_statistics1.php">매출 분석</a></li>
                  <li><a href="admin_statistics2.php">인기 프로그램</a></li>
                </ul>
            </div>
         </div><!--  end of sub -->
         <div id="content">
           <h1>게시글 관리 > 자유게시판</h1><br>
             <table id="board1_table">
                <tr>
                  <td>선택</td>
                  <td>번호</td>
                  <td>아이디</td>
                  <td>제목</td>
                  <td>첨부파일명</td>
                  <td>작성일</td>
                </tr>

                <?php
                 $sql = "select * from community where b_code='자유게시판';";
                 $result = mysqli_query($conn, $sql);
                 $total_record = mysqli_num_rows($result); // 전체 글 수

                 $number = $total_record;

                   while ($row = mysqli_fetch_array($result)){
                    $num        = $row["num"];
                    $id      = $row["id"];
                    $subject     = $row["subject"];
                    $file_name     = $row["file_name"];
                    $regist_day     = $row["regist_day"];

                ?>

                   <tr>
                   <form method="post" action="board_curd.php?mode=delete">
                      <td><input type="checkbox" name="item[]" value="<?=$num?>"></td>
                      <td><?=$number?></td>
                      <td><?=$id?></td>
                      <td><?=$subject?></td>
                      <td><?=$file_name ?></td>
                      <td><?=$regist_day?></td>

                   </tr>

                <?php
                        $number--;
                   }
                ?>
                <tr>
                  <td colspan="5"></td>
                  <td><button type="submit">선택된 글 삭제</button></td>
                </tr>

                     </form>
                </table>


         </div>		<!-- end of content -->
       </div><!--  end of admin_board -->
    </section>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
