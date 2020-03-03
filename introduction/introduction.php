<?php
  session_start();
 include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/create_table.php";
 $mater="강윤해";
?>
<!DOCTYPE html>
<!-- 회사소개 -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: HELF 소개</title>
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <script type="text/javascript" src="./common/js/main.js"></script>
    <link rel="stylesheet" href="./css/introduction.css">
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
  </head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>
    <div id="div-body">
    <section>
      <article>
        <div id="div_header">
          <b><span>HELF</span></b>
        </div>
        <div id="div_introduction">
          <!-- 운동과 친구 라이프  -->
          <p>안녕하세요 대표자 <b><?=$mater?></b> 입니다. <br/> <br/>
            저희 <span>HELF</span>&nbsp;는 건강한 몸을 원하시고 윤택한 삶을 사시는 여러분에 <br/> <br/>
            보다 좋은 생활에 활력을 불어 넣어주기 위한 목표를 가지고 모여서 설립하였고,<br/> <br/>

            </p>
            <img src="./img/introduction1.jpg" width="800" alt=""><br/><br/>
            <p>

            <div class="one">
              <div class="two">
                "
              </div>
              <b>"&nbsp;<span>Health</span>&nbsp;","&nbsp;<span>Life</span>&nbsp;","&nbsp;<span>Friends</span>&nbsp;"</b> 이 세가지가 모여서 만들어 졌습니다.

                <div class="two">
                  "
                </div>
              </div><br/> <br/>
            <span>HELF</span>&nbsp;에 뜻은 이름그대로 운동 활력 친구 <br/> <br/>
            운동을하는 같이 함계 활력있게 도와주는 곁에 있는 친구 입니다.<br/> <br/> <br/>

            운동을 하는데 같이 시작할 친구를 찾기 힘들고,<br/> <br/>
            원하는 시간에 원하는 장소에 맞추어서 같이 운동을 해줄 친구를 만들<br/> <br/>
            그러한 장소를 찾았지만 처음 접하는 입문자분들에게는 그러한 손길이 도착하는것은 드물었습니다.<br/> <br/> <br/>

            </p>
            <img src="./img/introduction2.jpg" width="800" alt=""><br/><br/>
            <p>

            장소가 없어서 만들었고 같은 입장에 배움을 하고자하는분들 한테는 경험자를 연결해주는 <br/> <br/>
            만남이 이루어지는 장소를 만들고 가르쳐주고 가르침을 받는게 아닌 친구처럼 다가와<br/> <br/>
            친근감있게 애기하며 정보를 주고 받는 모습을 담아 만들었습니다.<br/> <br/><br/>

          </p>
            <img src="./img/introduction3.jpg" width="800" alt=""><br/><br/>
            <p>

            <span>HELF</span>&nbsp;는 설립한 그 모습 그대로 여러분 곁에 오랜 친구처럼 같이 함께 생활에 활력이 되면서 <br/> <br/>
            항상 처음 마음가짐 그대로 같이 함께 하겠습니다.<br/> <br/> <br/>
</p>
<br/>
<p>
            감사합니다. 오늘도 좋은 건강, 좋은 활력, 좋은 운동과 함꼐 힘차하루되시기 바랍니다. <br/> <br/>
            대표자 <b><?=$mater?></b><br/><br/>
        </p>
        </div>
      </article>
    </section>
    <aside id="aside_introduction">
      <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/aside.php";?>
    </aside>
  </div>
  <footer>
  <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
  </footer>
  </body>
</html>
