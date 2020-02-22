<?php
  session_start();
 include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/create_table.php";
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELF :: 칼로리 처방전</title>
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/HELF/bmi/css/label.css">
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/img/favicon.ico">
    <script>
      function btn_kcal(){
        <?php $mode = "kcal"; ?>
        document.form_kcal.submit();
      }
    </script>
  </head>
  <body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>
  <section>
    <div id="div_bmi">
      <div id="div_form">
    <form name="form_kcal" action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/HELF/bmi/calculator.php?mode=<?=$mode?>" method="post">
      <!-- get방식으로 안에 모드(타입)을 넣는다 bmi와 kcal을 한번에 처리한다 -->
        <div class="div-bmi">
      <h2>칼로리</h2>
      <ul>
        <li>
          <label for="gen">성별</label>
          <input type="radio" name="gen" id="man" value="man" checked> 남
          <input type="radio" name="gen" id="girl" value="girl"> 여
        </li>
        <li>
          <label for="age">나이(연령)</label>
          <input type="number" name="age" id="age" value=""> 세
        </li>
        <li>
          <label for="cm">신장(cm)</label>
          <input type="number" name="cm" id="cm" value=""> cm
        </li>
        <li>
          <label for="kg">몸무게</label>
          <input type="number" name="kg" id="kg" value=""> kg
        </li>
        <li>
          <label for="goal_kg">목표 몸무게</label>
          <input type="number" name="goal_kg" id="goal_kg" value=""> kg
        </li>
        <li>
          <label for="term">감량 기간</label>
          <input type="number" name="term" id="term" value=""> 개월
        </li>
        <li>
          <table>
            <tr>
              <th><label for="">활동량</label></th>
              <td>
              <input type="radio" name="work" value="0.1"> 활동 안함<br/><br/>
              <input type="radio" name="work" value="0.3"> 가벼운 활동(평소 가벼운 운동이나 스포츠를 한다)<br/><br/>
              <input type="radio" name="work" value="0.6"> 보통 활동(평소 적당한 운동이나 스포츠를 한다)<br/><br/>
              <input type="radio" name="work" value="0.7"> 많은 활동(평소 강렬한 운동이나 활동을 한다)<br/><br/>
              <input type="radio" name="work" value="0.9"> 격심한 활동(평소 매우 심한 운동을 하거나 육체적인 직업이다)<br/><br/></td>
            </tr>
          </table>
        </li>
      </ul>
      <div class="div_btn">
        <input id="bmi_btn" type="button" name="" onclick="btn_kcal();" value="확인하기">
      </div>
    </div>
    </form>
      </div>
      <div id="div_aside">
    <aside>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/aside.php";?>
    </aside>
          </div>
  </section>
  <footer>
      <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
  </footer>
  </body>
</html>
