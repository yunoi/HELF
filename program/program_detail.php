<!-- 구매전 페이지 -->
<?php
  session_start();
 if(isset($_GET['o_key'])){
   $o_key=$_GET['o_key'];
   $o_key=(int)$o_key;
 }else{
   echo "alert('접속 오류 발생');";
   return;
 }
$user_id=$_SESSION['user_id'];
$user_grade=$_SESSION["user_grade"];
 $mode="insert";
 define('SCALE', 5);
 if(isset($_COOKIE["cookie2"])){  setcookie("cookie3",$_COOKIE["cookie2"],time() + 3600,'/');}
if(isset($_COOKIE["cookie1"])){  setcookie("cookie2",$_COOKIE["cookie1"],time() + 3600,'/');}
setcookie("cookie1",$o_key,time() + 3600,'/');
 ?>
 <script type="text/javascript">
     function qna_mode(modetype,key,num) {
        if(modetype==="delete"){
            location.href="./p_qna_db.php?mode="+modetype+"&num="+num+"&o_key="+key;
        }
         window.open(
             "http://<?php echo $_SERVER['HTTP_HOST'];?>/helf/program/p_qna.php?mode="+modetype+"&o_key="+key+"&num="+num,
             "QnA",
             "_blanck,resizable=no,menubar=no,status=no,toolbar=no,location=no,top=100px, le" +
                     "ft=100px , width=500px, height=250px"
         );
     }
 </script>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: 구매확인페이지</title>
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="./css/program_detail.css">
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
    <script src="./js/program_detail.js" charset="utf-8"></script>

  </head>
  <body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>
      <div class="clear"></div>
    <div id="div_main_body">
            <section>
              <div id="div_main">
                <img src="./img/hells.jpg" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="buttons" id="myHeader">
                  <ul>
                    <li><a href="#see">서비스 설명</a> </li>
                    <li><a href="#pay">가격정보</a></li>
                    <li><a href="#cansel">취소및환불규정</a> </li>
                    <li><a href="#program_qna">QnA</a> </li>
                    <li><a href="#div_review">서비스 평가</a> </li>
                  </ul>
                </div>
                <script type="text/javascript">
                window.onscroll = function() {myFunction()};
                var header = document.getElementById("myHeader");
                var sticky = header.offsetTop;

                function myFunction() {
                  if (window.pageYOffset > sticky-25) {
                    header.classList.add("sticky");
                  } else {
                    header.classList.remove("sticky");
                  }
                }

                </script>
                <div class="" id="see">
                  <h3>서비스 설명</h3>
                  <div class="see_body">

                  <p>운동 하려고 할때마다 무슨운동을 얼마나 해야할지 막막하시죠?<br/><br/>
                  그동안 크몽 포함 여러 Personal Training 을 서비스해주며,<br/><br/>
                  온라인과 오프라인 PT를 진행하며 만들어온<br/><br/>
                  (크몽 온라인코칭 : https://kmong.com/gig/129951)<br/><br/>

                  다이어트용 운동 프로그램, 근육성장용 프로그램 등<br/><br/>
                  <span>"운동 프로그램"</span> 및 <span>"식단 모음집"</span>을 드립니다.<br/><br/>
                  <ol>
                    <li>STANDARD : 운동 프로그램만을 드립니다.</li><br/>
                    <li>DELUXE : 운동 + 식단 프로그램을 드립니다.</li><br/>
                    <li>PREMIUM : 스스로 운동 계획하기 노하우 PDF를 드립니다. (약 40p 분량)</li><br/>
                  </ol>
                  <br/>

                  기존의 운동 프로그램과는 다른점은,<br/><br/>
                  다양한 운동 프로그램이 세트로 들어있는 모읍집의 개념이기에,<br/><br/>
                  여러 시도를 해볼 수 있는 기회가 생깁니다.<br/><br/>

                  <span>파일은<br/><br/>
                  PDF형식으로 전송드립니다.<br/><br/>
                  </span>
                  <br/><br/>
                <h4>**경력사항</h4>
                <br/>
                <br/>
                <ul>
                  <li> 온라인 코치 경험 다수(크몽 포함)</li>
                  <li> 퍼스널 트레이너 3년차</li>
                  <li> 생활스포츠지도사 (보디빌딩) 자격증</li>
                  <li> 국제 퍼스널트레이너 자격증(FISAF)</li>
                </ul>
                <div class="clear"></div>
                <br/>
                <ul>
                  <li>지역</li><br/>
                  <li><b>비대면</b></li>
                </ul><br/>
                <ul>
                  <li>분야</li><br/>
                  <li><b>피트니스</b></li>
                </ul><br/>
                <ul>
                    <li>모집 형태</li><br/>
                    <li><b>개인레슨</b></li>
                </ul><br/>
                <ul>
                  <li>교육 횟수</li><br/>
                  <li><b>원데이클래스</b></li>
                </ul><br/>
                </p>
                </div>
                </div>
                    <div class="clear"></div><br/><br/>
                <div class="" id="pay">
                  <h3>가격정보</h3>
                  <div class="pay_table">
                    <table>
                      <tr>
                        <th id="sol">&nbsp;</th>
                        <th>STANDARD</th>
                        <th>DELUXE</th>
                        <th>PREMIUM</th>
                      </tr>
                        <?php
                         // ==============================
                         $sql = "select * from program where o_key=$o_key";
                         $result = mysqli_query($conn, $sql);
                         $row = mysqli_fetch_array($result);
                         $shop = $row["shop"];
                         $type = $row["type"];
                         $subject = $row["subject"];
                         $content = $row["content"];
                         $location = $row["location"]; //주소
                         ?>
                       <tr>
                         <th id="sol">가격</th>
                         <?php
                           $sql="select * from program where shop='$shop'and type='$type' order by price";
                           $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                           $table_choose       = $row["choose"]; //옵션 내용
                           $table_price = (int)$row["price"]; //옵션에 대한 가격
                           if(!($table_choose==="선택")){
                          ?>
                          <td><?=$table_price?>원</td>
                           <?php
                         }
                         }
                            ?>
                      </tr>
                       <tr>
                         <th id="sol">옵션</th>
                         <?php
                           $sql="select * from program where shop='$shop'and type='$type' order by price";
                          $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                           $table_choose       = $row["choose"]; //옵션 내용
                           if(!($table_choose==="선택")){
                          ?>
                          <td><?=$table_choose?>횟수</td>
                           <?php
                          }
                         }
                            ?>
                        </tr>
                    </table>

                  </div>
                </div>
                  <div class="clear"></div><br/><br/>
                <div class="" id="cansel">
              <h3>취소 및 환불 규정</h3>
<p>가. 레슨 환불기준 원칙<br/>
학원의 설립/운영 및 과외교습에 관한 법률 제 18조(교습비 등의 반환 등)<br/>
- 학원설립, 운영자, 교습자 및 개인과외교습자는 학습자가 수강을 계속할 수 없는 경우 또는 학원의 등록말소, 교습소 폐지 등으로 교습을 계속할 수 없는 경우에는 학습자로부터 받은<br/>
교습비를 반환하는 등 학습자를 보호하기 위하여 필요한 조치를 하여야 한다.<br/><br/>

1. 레슨을 제공할 수 없거나, 레슨 장소를 제공할 수 없게 된 날 : 이미 납부한 레슨비 을 일한 계산한 금액 환불<br/>
<br/>
2. 레슨기간이 1개월 이내의 경우<br/>
- 레슨 시작전 : 이미 납부한 레슨비 전액 환불<br/>
- 총 레슨 시간의 1/3 경과전 : 이미 납부한 레슨비의 2/3에 해당액 환불<br/>
- 총 레슨 시간의 1/2 경과전 : 이미 납부한 레슨비용의 1/2에 해당액 환불<br/>
- 총 레슨시간의 1/2 경과후 : 반환하지 않음<br/><br/>

3.레슨 기간이 1개월을 초과하는 경우<br/>
- 레슨 시작전 : 이미 납부한 레슨비 전액 환불<br/>
- 레슨 시작후 : 반환사유가 발생한 당해 월의 반환 대상 레슨비(레슨비 징수기간이 1개월 이내인 경우에 따라 산출된 수강료를 말한다)와 나머지 월의 레슨비 전액을 합산한 금액 환불<br/>
<br/>
* 총 레슨 시간의 레슨비 징수기간 중의 총레슨시간을 말하며, 반환 금액의 산정은 반환 사유가 발생한 날까지 경과 된 레슨시간을 기준으로 함<br/>
</p>  </div>
                <div class="clear"></div><br/><br/>
                <div id="program_qna"> <!--프로그램 qna 게시판이 들어갈 자리-->
                  <h3>QnA</h3>
                  <p>구매하시려는 상품에 대해 궁금하신 점이 있으신 경우 문의해주세요.</p>
                  <button type="button" onclick="qna_mode(this.value,<?=$o_key?>,null)" name="button" value="new_insert">문의하기</button>
                  <?php
                  $sql="select * from `p_qna` where `shop`='$shop' and `type`='$type' order by group_num desc, ord asc;";
                  $result = mysqli_query($conn, $sql);
                  $total_record=mysqli_num_rows($result);
                  $total_page=($total_record % SCALE == 0)?($total_record/SCALE):(ceil($total_record/SCALE));
                  if (empty($_GET['page'])) {
                      $page=1;
                  } else {
                      $page=$_GET['page'];
                  }
                  $start=($page -1) * SCALE;
                  $number = $total_record - $start;
                  for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++) {
                      mysqli_data_seek($result, $i);
                      $row = mysqli_fetch_array($result);
                      $qna_num=$row['num'];
                      $qna_o_key=$row['o_key'];
                      $qna_group_num=$row['group_num'];
                      $qna_id=$row['id'];
                      $qna_regist_day=$row['regist_day'];
                      $qna_subject=$row['subject'];
                      $qna_content=$row['content'];
                      $qna_depth=(int)$row['depth'];
                      $space="";
                      for ($j=0;$j<$qna_depth;$j++) {
                          $space="&nbsp;&nbsp;".$space;
                      }
                      if(!($space==="")){
                        $space=$space."[답변]";
                      }
                      ?>
                    <div class="div_qna">
                      <div class="qna_head"><!--제목 머릿부분-->
                        <div class="qna_subject">
                          <span>제목&nbsp;:&nbsp;<?=$space.$qna_subject?></span>
                        </div>
                        <div class="qna_id">
                          <span>작성자&nbsp;:&nbsp;<?=$qna_id?></span>
                        </div>
                        <div class="qna_regist_day">
                          <span>작성일&nbsp;:&nbsp;<?=$qna_regist_day?></span>
                        </div>
                      </div>
                      <div class="qna_body"><!--내용부분-->
                        <div class="qna_content">
                          내용&nbsp;:&nbsp;<?=$qna_content?>
                        </div>
                      </div>
                      <div class="qna_buttons">
                        <button type="button" onclick="qna_mode(this.value,<?=$o_key?>,<?=$qna_num?>)" name="button" value="insert">답글달기</button>
                        <?php
                        if($qna_id===$user_id || $user_grade ==="admin"){
                          echo '<button type="button" onclick="qna_mode(this.value,'.$o_key.','.$qna_num.')" name="button" value="delete">삭제</button>';
                          echo '<button type="button" onclick="qna_mode(this.value,'.$o_key.','.$qna_num.')" name="button" value="update">수정</button>';
                        }
                        ?>
                      </div>
                    </div>
                    <?php
                      $number--;
                    }
                   ?>
                   <div id="page_button">
                     <div id="page_num">
                       <?php
                       if($page>1){
                         $val=(int)$page-1;
                         echo "<a href='./program_detail.php?page=$val&o_key=$o_key'>이전◀ </a>&nbsp;&nbsp;&nbsp;&nbsp";
                       }?>
                     <?php
                       for ($i=1; $i <= $total_page ; $i++) {
                           if ($page==$i) {
                               echo "<b>&nbsp;$i&nbsp;</b>";
                           } else {
                               echo "<a href='./program_detail.php?page=$i&o_key=$o_key'>&nbsp;$i&nbsp;</a>";
                           }
                       }
                     ?>
                     <?php
                     if($page>=1 && $total_page!=$page){
                       $val=(int)$page+1;
                       echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='./program_detail.php?page=$val&o_key=$o_key'>▶ 다음</a>";
                     }

                      ?>
                      <a href="./program_detail.php?page=1&o_key=<?=$o_key?>"> <button type="button"> 목록</button></a>
                     <br><br><br><br><br><br><br>
                   </div>
                </div>
                <div class="clear"></div><br/>
                <div id="div_review">
                  <h3>서비스 평가</h3>
                  <ul>
                  <?php
                    $sql="select * from `p_review` where `shop`='$shop' and `type`='$type'";
                    $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)){
                    $review_id = $row["id"];
                    $review_content = $row["content"];
                    $review_regist_day = $row["regist_day"];
                    $review_score = $row["score"];
                    ?>
                      <img src="" alt="">
                    <?php
                   ?>
                   <li>
                     <div class="review">
                       <div class="h_review">
                         <span>ID&nbsp;:&nbsp;<?=$review_id?></span>&nbsp;&nbsp;<span><?=$review_regist_day?></span>
                       </div>
                      <div class="review_content"><?=$review_content?></div>
                     </div>
                   </li>
                    <?php
                  }
                     ?>

                     <div class="clear"></div><br/>
                     <li>
                       <div class=""><!--댓글 달기 insert-->
                         <form class="form_review" name="form_review" action="program_review.php?mode=<?=$mode?>" method="post">
                          <h3>댓글</h3>
                           <textarea name="content" rows="3" cols="30"></textarea>
                           <div class="starRev">
                             <span class="starR1" >0.5</span>
                             <span class="starR2" >1</span>
                             <span class="starR1" >1.5</span>
                             <span class="starR2" >2</span>
                             <span class="starR1" >2.5</span>
                             <span class="starR2" >3</span>
                             <span class="starR1" >3.5</span>
                             <span class="starR2" >4</span>
                             <span class="starR1" >4.5</span>
                             <span class="starR2" >5</span>
                            </div>
                            <input type="hidden" name="o_key" value="<?=$o_key?>">
                            <input type="hidden" name="type" value="<?=$type?>">
                            <input type="hidden" name="shop" value="<?=$shop?>">
                            <input type="hidden" name="star" value="<?=$star_score?>">
                           <input type="button" onclick="review();" value="등록">
                           <input type="button" onclick="review_delete();" value="삭제">
                           <input type="button" onclick="review_update();" value="수정">
                         </form>
                       </div>
                     </li>
                   </ul>
                </div>
              </div><!--main-->
            </section>
            <aside>
              <div id="div_aside">
                <!-- 작업대 -->

                <h2><?=$shop?></h2>
                <form class="" action="index.html" method="post">
                  <h3><span id="h_pay">0</span>원</h3>
                  <p>
                    <?=$subject?><br/>
                    <?=$content?><br/>
                    1회당 레슨시간 (분) : 30 분<br/>
                    레슨 횟수 : 1 회<br/>
                  </p>
                  <select class="" name="" id="choose" onchange="pay(this.value);">
                    <option value="0">옵션선택</option>
                  <?php
                  $sql="select * from program where shop='$shop'and type='$type' order by price";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)){
                    $shop          = $row["shop"]; //장소 이름
                    $type          = $row["type"]; //헬스나 pt
                    $end_day      = $row["end_day"]; //날짜
                    $choose       = $row["choose"]; //옵션 내용
                    $price        = (int)$row["price"]; //옵션에 대한 가격
                    $file_copied         = $row["file_copied"]; //이미지파일 이름
                    $file_type         = $row["file_type"]; //이미지파일에 타입
                    if(!($choose==="선택")){
                   ?>
                     <option value="<?=$price?>"><?=$choose?>횟수: <?=$price?>원</option>

                    <?php
                    }
                  }

                  mysqli_close($conn);
                     ?>
                  </select>
                  <script type="text/javascript">
                    $('.starRev span').click(function(){
                      $(this).parent().children('span').removeClass('on');
                      $(this).addClass('on').prevAll('span').addClass('on');
                      valr=$(this).text();
                      <?php
                      $star_score=0;
                      $star_score="document.write(valr);";
                      ?>
                      return false;
                    });
                    function review(){
                      <?php
                      $mode="insert";
                      ?>
                      document.form_review.submit();
                    }
                    function review_delete(){
                      <?php
                      $mode="delete";
                       ?>
                       document.form_review.submit();
                    }
                    function review_update(){
                      <?php
                      $mode="update";
                       ?>
                       document.form_review.submit();
                    }
                    function pay(x){
                      document.getElementById("h_pay").innerHTML=x;
                    }
                  </script>
                  <br/>
                  <div class="">
                    <img src="" alt="">작업일 : 123 &nbsp;&nbsp; <img src="" alt="">수정 횟수 : 제한 없음
                  </div>
                  <input type="button" name="" value="찜하기">
                  <input type="button" name="" value="장바구니">
                  <input type="button" name="" value="구매하기" onclick="location.href='./program_purchase.php'">
              </div>
            </aside>
          </div>
            <div class="clear"></div>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>
  </body>
</html>
