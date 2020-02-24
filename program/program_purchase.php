<!--
https://kmong.com/order/2518542 참고한 사이트 화면
이페이지 구매화면에서 구매후 결제할 페이지로 생각하고 만들었음
하 귀찮다 9:15
 -->
<?php
  session_start();
 include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/create_table.php";
 $val=1;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: 결제페이지</title>
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
    <link rel="stylesheet" href="./css/program_purchase.css">
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/js/main.js"></script>
    <script src="./js/program_purchase.js" charset="utf-8"></script>
  </head>
  <body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>
<div class="clear"></div>
    <section>
      <div class="item_all">
        <h3>주문하기 & 결제하기</h3>
        <div class="clear"></div>
        <div class="div_item1">
          <div class="div_img">
            <img src="" alt="">
          </div>
          <div class="div_right">
            <div class="">
              <!-- 제품명 부분 -->
              <h4>프로그램 이름</h4>
            </div>
            <div class="">
              <!-- 아이콘과 회사명관련을 입력할 부분 -->
              <img src="" alt=""/>
              <span></span>
            </div>
          </div>
          <div class="div_center">
            <table>
              <tr>
                <th id="title1">기복항목</th>
                <th id="title2">수량선택</th>
                <th id="title3">작업일</th>
                <th id="title4">가격</th>
              </tr>
              <tr>
                <td id="program">
                  <strong>운동 + 식단 프로그램</strong>
                  <ul>
                    <li>♥&nbsp;1회당 레슨시간(분) : 30분</li>
                    <li>♥&nbsp;레슨횟수 : 1회</li>
                  </ul></td>
                <td><div class="">
                    <button type="button" name="button" onclick="">-</button>
                    <b><?=$val?></b>
                    <button type="button" name="button" onclick="">+</button>
                  </div></td>
                <td>
                    <span id="item3">365</span>
                      &nbsp;일
                </td>
                <td>
                  <span id="pay">11,000</span>
                  &nbsp;원
                </td>
              </tr>
            </table>
          </div><!--end of div_center-->
        </div><!--end of div_item1-->
        <div class="clear"></div>
        <div class="div_item2">
          <div class="h">
            의뢰인 정보
          </div>
          <div class="div_body">
            <div class="item2_left">
              <ul>
                <li>본인 확인 후 구매가 가능합니다.(첫 결제 1회만)</li>
                <li>인증된 정보에 따라 실명이 자동 업데이트 됩니다.</li>
              </ul>
            </div>
            <div class="item2_right">
              <a href="#"><button type="button" name="button"><b>로그인 후 휴대폰 인증을 해주세요</b></button> </a>
            </div>
          </div><!--end of div_body-->
        </div><!--end of div_item2-->
      <div class="clear"></div>
        <div class="div_item3">
          <div class="h">
            결제금액
          </div>
          <div class="div_body">
          <div class="left">
            <div class="hi">
              현재 사용가능 쿠폰&nbsp;<span>0</span>
              <button type="button" name="button">쿠폰선택</button>
            </div>
              <div class="clear"></div>
            <div class="row">
              <div class="">
                  캐시 사용 <span>(보유캐시&nbsp;:&nbsp;<b>0</b>원)</span>
              </div>
              <div class="">
                <input type="number" name="" value="" onchange="">
                <button type="button" name="button">전액사용</button>
              </div>
            </div><!--end of row-->
          </div><!--end of left-->
          <div class="right">
            <div class="hi">
              <span>총 서비스 금액 <b>0</b>&nbsp;원</span>
              <ul>
                <li>ㄴ&nbsp;쿠폰 <span>0</span>원 </li>
                <li>ㄴ&nbsp;캐시 <span>0</span>원 </li>
              </ul>
            </div><!--end of hi-->
            <div class="row">
              <div class="">
                총 결제금액 <br/>
                <span>(VAT 포함)</span>
              </div>
              <div class="">
                <span>11,000원</span>
              </div>
            </div><!--end of row-->
          </div><!--end of right-->
        </div><!--end of div_body-->
        </div><!--end of div_item3-->
              <div class="clear"></div>
        <div class="div_item4">
          <div class="h">
            결제방법
          </div>
          <div class="div_body">
            <div class="">
              <ul>
                <li><input type="radio" name="pay" value="">신용카드</li>
                <li><input type="radio" name="pay" value="">실시간 계좌이체</li>
                <li><input type="radio" name="pay" value="">무통장입금</li>
                <li><input type="radio" name="pay" value="">휴대폰</li>
                <li><input type="radio" name="pay" value="">페이나우</li>
                <li><input type="radio" name="pay" value=""><img src="" alt="payco"></li>
              </ul>
            </div>
        </div>
      <div class="clear"></div>
      <div class="div_item5">
        <div class="div_body">
          <div class="position-relative">
                <img src="" alt="">
                <ul class="list-unstyled inline-block">
                    <li><strong>크몽은 에스크로 결제 서비스를 이용하여 안전한 거래 환경을 제공합니다.</strong></li>
                    <li>크몽을 통해 결제 진행 시 관련 정책에 의해 보호 받을 수 있습니다.</li>
                </ul>
            </div>
          <div class="btn">
            <a href="#"><button type="button" name="button">결제하기</button> </a>
          </div>
      </div><!--end of div_body-->
    </div><!--end of div_item6-->
    </div><!--end of item_all-->
    </section>
<div class="clear"></div>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>

  </body>
</html>
