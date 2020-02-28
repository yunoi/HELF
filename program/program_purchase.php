<!--
https://kmong.com/order/2518542 참고한 사이트 화면
 -->
<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: 결제페이지</title>
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>

    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
    <link rel="stylesheet" href="./css/program_purchase.css">
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
    <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/js/main.js"></script>
    <script src="./js/program_purchase.js" charset="utf-8"></script>
    <!-- 카카오페이 -->
    <script>
      function payment(){
        var IMP = window.IMP; // 생략가능
        IMP.init('imp50161639'); // 가맹점 식별코드

        IMP.request_pay({
    pg : 'kakaopay',
    pay_method : 'card',
    merchant_uid : 'merchant_' + new Date().getTime(),
    name : '<?=substr($user_id, 0, 5);?>' + new Date().getTime(),
    amount : 1,
    buyer_name : '구매자이름',
    m_redirect_url :'../common/lib/payment_complete.php'
}, function(rsp) {
    if ( rsp.success ) {
        var msg = '결제가 완료되었습니다.';
        // msg += '고유ID : ' + rsp.imp_uid;
        // msg += '상점 거래ID : ' + rsp.merchant_uid;
        // msg += '결제 금액 : ' + rsp.paid_amount;
        // msg += '카드 승인번호 : ' + rsp.apply_num;

        location.href = "http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/lib/payment_complete.php";
    } else {
        var msg = '결제에 실패하였습니다.';
        msg += '에러내용 : ' + rsp.error_msg;
    }
    alert(msg);
});
      }
      function bank(){ // 무통장 입금 버튼 누르면 작동할 함수
        document.getElementById('bank').innerHTML="<select id='bank_name' title='무통장은행선택'><option value=''>은행 선택</option><option value='shinhan'>신한 은행</option><option value='hana'>하나 은행</option><option value='woori'>우리 은행</option></select>";
        document.getElementById('btn_pay').innerHTML='<a href="#"><button type="button" name="button" onclick="banked_clik()">주문하기</button> </a>;';
      }
      function banked_clik(){
        let bank_name = document.getElementById('bank_name').value;
        <?php
        $user_id=$_SESSION['user_id'];
        ?>
        location.href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/lib/payment_complete.php?bank="+bank_name+"&id=<?=$user_id?>";
      }
      function kakao(){
        document.getElementById('bank').innerHTML="";
        document.getElementById('btn_pay').innerHTML='<a href="#"><button type="button" name="button" onclick="payment()">결제하기</button> </a>;';
      }
    </script>
  </head>
  <body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";
        if(isset($_GET['o_key'])||isset($_GET['shop'])||isset($_GET['type'])||isset($_GET['price'])){
          $shop=$_GET['shop'];
          $type=$_GET['type'];
          $price=(int)$_GET['price'];

          $sql="select o_key from program where shop='$shop'and type='$type' and price=$price";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result);

          $o_key=$row['o_key'];
          $pay="get";
        }else if(isset($_POST['o_key'])){
          $o_key=(int)$_POST['o_key'];
          $pay="post";
        }else{
          echo "<script>alert('접속 오류 발생');</script>";
          return;
        }
        ?>
    </header>
<div class="clear"></div>
    <section>
      <div class="item_all">
        <h3>주문하기 & 결제하기</h3>
        <div class="clear"></div>
        <div class="div_item1">
          <div class="clear"></div>
          <div class="div_center">
            <table>
              <tr>
                <th id="title1">&nbsp;</th>
                <th id="title2">프로그램</th>
                <th id="title3">옵션확인</th>
                <th id="title4">마감일</th>
                <th id="title5">가격</th>
              </tr>
              <?php
              $total_pay=0;
              if($pay==="post"){
                for ($i=0; $i < count($o_key); $i++) {
                  $sql = "select * from `program` where o_key=".$o_key[$i].";";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result);
                  $shop = $row["shop"];
                  $type = $row["type"];
                  $subject = $row["subject"]; //프로그램 이름
                  $content = $row["content"]; //내용
                  $location = $row["location"]; //주소
                  $price = $row["price"]; //가격
                  $choose = $row["choose"]; //가격
                  $end_day = $row["end_day"]; //종료 날짜
                  $file_copied = $row["file_copied"]; //파일 이름
                  $total_pay=$total_pay+$price;
                   ?>
                  <tr>
                    <td id="program">
                      <!-- 판매 프로그램 이름 자리 -->
                      <div class="div_img">
                        <img src='../admin/data/<?=$file_copied?>'>
                      </div>
                      <strong><?=$subject?></strong>
                      <ul>
                        <!-- 설명 -->
                        <li><?=$location?></li>
                      </ul></td>
                    <td><div class="">
                      <!-- 옶션이 넣어질 자리 -->
                        <b><?=$choose?></b>
                      </div></td>
                    <td>
                        <span id="item3"><?=$end_day?></span>
                    </td>
                    <td>
                      <span id="pay"><?=$price?></span>원
                    </td>
                  </tr>
              <?php
                }
              }else{
                  $sql = "select * from program where o_key=$o_key;";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result);

                  $shop = $row["shop"];  //샵
                  $type = $row["type"];  //pt , 헬스 종류
                  $subject = $row["subject"]; //프로그램 이름
                  $content = $row["content"]; //내용
                  $location = $row["location"]; //주소
                  $price = $row["price"]; //가격
                  $choose = $row["choose"]; //가격
                  $end_day = $row["end_day"]; //종료 날짜
                  $file_copied = $row["file_copied"]; //파일 이름

                  $total_pay=$total_pay+$price;
                   ?>
                  <tr>
                    <td id="program">
                      <!-- 판매 프로그램 이름 자리 -->
                      <div class="div_img">
                        <img src='../admin/data/<?=$file_copied?>'>
                      </div>
                      </td>
                      <td>
                      <div class="content">
                        <span><?=$subject?></span><br/>
                        <span><?=$location?></span>
                      </div>
                    </td>
                    <td>
                      <div class="">
                      <!-- 옶션이 넣어질 자리 -->
                        <b><?=$choose?></b>
                      </div></td>
                    <td>
                        <span id="item3"><?=$end_day?></span>
                    </td>
                    <td>
                      <span id="pay"><?=$price?></span>원
                    </td>
                  </tr>
              <?php
                }
               ?>
            </table>
          </div><!--end of div_center-->
        </div><!--end of div_item1-->
      <div class="clear"></div>
<!-- 총결제금액 표시 할 장소 -->
      <div class="">총 결제 금액 <?=$total_pay?> 원</div>

     <div class="clear"></div>
        <div class="div_item4">
          <div class="h">
            결제방법
          </div>
          <div class="div_body">
            <div class="">
              <ul>
                <li><input type="radio" name="pay" value="" onclick="bank();">무통장입금</li>
                <li><input type="radio" name="pay" value="" onclick="kakao();"><img src="./img/kakao.jpg" alt="kakao"></li>
              </ul>
            </div>
        </div>
      </div><!--end of div_item4-->
      <div class="clear"></div>
      <div id="bank"> <!--무통장 입금 설명이 들어갈 자리-->
      </div>
      <div class="clear"></div>
      <div class="div_item5">
        <div class="div_body">
          <div class="position-relative">
                <img src="" alt="">
                <ul class="list-unstyled inline-block">
                    <li><strong><b>HELF</b>은 에스크로 결제 서비스를 이용하여 안전한 거래 환경을 제공합니다.</strong></li>
                    <li><b>HELF</b>을 통해 결제 진행 시 관련 정책에 의해 보호 받을 수 있습니다.</li>
                </ul>
            </div>
          <div class="btn" id="btn_pay">

          </div>
      </div><!--end of div_body-->
    </div><!--end of item_all-->
    </section>
<div class="clear"></div>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>

  </body>
</html>
