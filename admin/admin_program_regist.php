<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: 관리자페이지</title>
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="stylesheet" href="./css/program_regist.css">
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

        if(isset($row["file_name"])){
          $file_name = $row["file_name"];
        }else{
          $file_name = "";
        }
        
        $file_type = $row["file_type"];
        $file_copied = $row["file_copied"];
        $mod = "modify";

        mysqli_close($conn);
      }else{

        $o_key = "";
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
              <h1>프로그램 관리 > 등록</h1><br>
              <form name="program_regist" class="" action="program_curd.php?mode=<?=$mod?>&o_key=<?=$o_key?>" method="post" enctype="multipart/form-data">
                <table id="regist_table">
                  <tr>
                    <td id="td_width">샵 이름</td>
                    <td>
                      <input id="input_shop" type="text" name="shop" value=<?=$shop?>>
                    </td>
                  </tr>
                  <tr>
                    <td>운동 종류</td>
                    <td>
                      <select name="type" class="kind_sel">
                        <option value="pt" <?php if ($type === 'pt') echo "selected";?>>pt</option>
                        <option value="수영" <?php if ($type === '수영') echo "selected";?>>수영</option>
                        <option value="자전거" <?php if ($type === '자전거') echo "selected";?>>자전거</option>
                        <option value="요가/필라테스" <?php if ($type === '요가/필라테스') echo "selected";?>>요가/필라테스</option>
                        <option value="복싱" <?php if ($type === '복싱') echo "selected";?>>복싱</option>
                        <option value="클라이밍" <?php if ($type === '클라이밍') echo "selected";?>>클라이밍</option>
                        <option value="등산" <?php if ($type === '등산') echo "selected";?>>등산</option>
                        <option value="축구" <?php if ($type === '축구') echo "selected";?>>축구</option>
                        <option value="기타" <?php if ($type === '기타') echo "selected";?>>기타</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>제목</td>
                    <td>
                      <input id="input_subject" type="text" name="subject" value=<?=$subject?>>
                    </td>
                  </tr>
                  <tr>
                    <td>내용</td>
                    <td>
                      <textarea name="content" rows="10" cols="87"  value=<?=$content?>></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>모집인원</td>
                    <td>
                      <input id="input_num" type="number" name="personnel" value=<?=$personnel?>> 명
                    </td>
                  </tr>
                  <tr>
                    <td>모집 마감일</td>
                    <td>
                      <input type="date" name="end_day" value=<?=$end_day?>>
                    </td>
                  </tr>
                  <tr>
                    <td>옵션</td>
                    <td id="td_plus">
                      <ul id="ul_plus">
                        <li>
                          옵션명: <input type="text" name="choose[]" value=<?=$choose?>> &
                          가격: <input type="number" name="price[]" value=<?=$price?>> 원 ㅣ
                          <button id="option_plus" type="button" name="button">옵션추가</button>
                          <button id="option_minus" type="button" name="button">옵션삭제</button>
                        </li>
                      </ul>
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
                      <input id="input_location" type="text" name="detail" value="">
                    </td>
                  </tr>
                  <tr>
                    <td>파일선택</td>
                    <td>
                      <?=$file_name?><input type="file" name="upfile" value="">
                    </td>
                  </tr>
                  <tr>
                    <td> </td>
                    <td>
                      <?php
                        if(isset($_GET["o_key"])){
                          echo "<input type='submit' value='수정'>";
                        }else{
                          echo "<input type='submit' value='등록'>";
                        }

                       ?>
                       <input type="button" name="" value="취소">

                    </td>
                  </tr>
                </table>

              </form>
            </div><!--  end of content-->
       </div><!--  end of admin_board -->
    </section>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
