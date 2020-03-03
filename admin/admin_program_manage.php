<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>HELF :: 관리자페이지</title>
  <link rel="stylesheet" type="text/css" href="./css/admin.css">
  <link rel="stylesheet" href="./css/program_manager.css">
  <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
  <script src="./js/register.js"></script>
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


  <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
  <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/js/main.js"></script>

  <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/js/main.js"></script>
  <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/admin/js/materialize.js"></script>
  <script>
    $(document).ready(function(){
      M.AutoInit();
      $('.collapsible').collapsible();
    });
</script>
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
                 <li><a href="admin_program_payment.php">결제 관리</a></li>
               </ul>

             <h2>통계</h2>
               <ul id="sta_ul">
                 <li><a href="admin_statistics1.php">매출 분석</a></li>
                 <li><a href="admin_statistics2.php">인기 프로그램</a></li>
               </ul>
           </div>
         </div><!--  end of sub -->

         <div id="content">
            <h1 id="content_title">프로그램 관리 > 관리<p>프로그램명을 클릭하시면 해당 프로그램의 상세 정보를 보실 수 있습니다.</p></h1><br>
            <div id="admin_box">

            <table id="manage_table">
              <tr>
                <td>번호</td>
                <td>샵이름</td>
                <td>운동종류</td>
                <td>제목</td>
                <td>모집마감일</td>
                <td>옵션</td>
                <td>가격</td>
                <td>수정</td>
                <td>삭제</td>
              </tr>

      <?php
        $sql = "select * from program order by o_key desc";
        $result = mysqli_query($conn, $sql);
        $total_record = mysqli_num_rows($result); // 전체 회원 수

        $number = $total_record;

         while ($row = mysqli_fetch_array($result)){
          $o_key        = $row["o_key"];
          $shop      = $row["shop"];
          $type     = $row["type"];
          $subject     = $row["subject"];
          $end_day     = $row["end_day"];
          $choose     = $row["choose"];
          $price     = $row["price"];
      ?>

          <tr>
          <form method="post" action="admin_program_regist.php?o_key=<?=$o_key?>">
            <td><?=$o_key?></td>
            <td><?=$shop?></td>
            <td><?=$type ?></td>
            <td><?=$subject?></td>
            <td><?=$end_day?></td>
            <td><?=$choose?></td>
            <td><?=$price?></td>
            <td><button type="submit">수정</button></td>
            <td><button type="button" onclick="location.href='program_curd.php?o_key=<?=$o_key?>&mode=delete'">삭제</button></td>
          </form>
         </tr>

      <?php
             $number--;
         }
      ?>
            </table>

            </div> <!-- admin_box -->
          </div>		<!-- end of content -->
        </div><!--  end of admin_board -->
    </section>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
