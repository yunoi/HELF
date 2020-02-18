<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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

     <div id="content">
    			<h3>프로그램 관리 > 등록</h3><br>

          <form name="program_regist" class="" action="program_insert.php?mode=insert" method="post" enctype="multipart/form-data">
            <table>
              <tr>
                <td>샵 이름</td>
                <td>
                  <input type="text" name="shop" value="판규헬스장">
                </td>
              </tr>
              <tr>
                <td>운동 종류</td>
                <td>
                  <select name="type" class="kind_sel">
                    <option value="name2">전체</option>
                    <option value="헬스" selected>헬스</option>
                    <option value="name4">수영</option>
                    <option value="name5">자전거</option>
                    <option value="name6">요가/필라테스</option>
                    <option value="name7">기타</option>
                    <option value="name8">등등</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>제목</td>
                <td>
                  <input type="text" name="subject" value="헬스합시다">
                </td>
              </tr>
              <tr>
                <td>내용</td>
                <td>
                  <input type="text" name="content" value="살을 빼야합니다">
                </td>
              </tr>
              <tr>
                <td>모집인원</td>
                <td>
                  <input type="number" name="personnel" value="">
                </td>
              </tr>
              <tr>
                <td>모집 마감일</td>
                <td>
                  <input type="text" name="end_day" value="내일">
                </td>
              </tr>
              <tr>
                <td>옵션</td>
                <td>
                  <input type="text" name="choose" value="헬스장 1달 이용권">
                </td>
              </tr>
              <tr>
                <td>가격</td>
                <td>
                  <input type="number" name="price" value=""> 원
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
                  <input type="text" name="detail" value="상계동 ">
                </td>
              </tr>
              <tr>
                <td>파일선택</td>
                <td>
                  <input type="file" name="upfile" value="">
                </td>
              </tr>
              <tr>
                <td> </td>
                <td>
                  <input id="btn_regist" type="button" name="" value="등록">
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
