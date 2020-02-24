<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: 관리자페이지</title>
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../common/css/common.css">
    <link rel="stylesheet" type="text/css" href="../common/css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
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
                 <li><a href="admin_statistics1.php">매출 분석</a></li>
                 <li><a href="admin_statistics2.php">인기 프로그램</a></li>
               </ul>


              </div>

           </aside>
  		  </div><!--  end of sub -->

        <div id="content">
     			<h3>게시글 관리 > 함께할건강 </h3><br>
           <div id="admin_box">
     	    <table id="board2_table">
             <tr>
               <td>선택</td>
               <td>번호</td>
               <td>아이디</td>
               <td>제목</td>
               <td>첨부파일명</td>
               <td>작성일</td>
             </tr>



     <?php
     	$sql = "select * from together";
     	$result = mysqli_query($conn, $sql);
     	$total_record = mysqli_num_rows($result); // 전체 회원 수

     	$number = $total_record;

        while ($row = mysqli_fetch_array($result)){
         $num        = $row["num"];
     	  $id      = $row["id"];
     	  $subject     = $row["subject"];
         $file_name     = $row["file_name"];
         $regist_day     = $row["regist_day"];
         $group_num   = $row["group_num"];

     ?>

     		<tr>
     		<form method="post" action="admin_member_update.php?num=<?=$num?>">
           <td>
             <input type="checkbox" name="" value="">
           </td>
           <td><?=$num?></td>
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

     	</div> <!-- admin_box -->


     		</div>		<!-- end of content -->

  	</div><!--  end of admin_board -->



  </div><!--  end of admin -->

  <div id="footer">
    <p>#footer</p>
  </div>




  </body>
</html>
