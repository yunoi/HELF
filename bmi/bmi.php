<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/label.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/main.css">
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="./common/js/main.js"></script>
    <script>
    function btn_bmi() {
      let $age = document.form_bmi.age;
      let $cm = document.form_bmi.cm;
      let $kg = document.form_bmi.kg;
      if(document.getElementById('man').checked==false &&
        document.getElementById('girl').checked==false){
        alert("성별을 체크해주세요");
        return;
      }else if($age.value===""){
        alert("나이를 입력해주세요");
        return;
      }else if($cm.value === ""|| isNaN($cm.value) || $cm.value < 50 || $cm.value > 240){
        alert("신장(cm)을 입력해주세요");
        return
      }else if($kg.value === ""){
        alert("몸무게(kg)을 입력해주세요");
        return
      }
      <?php $mode="bmi"?>
      document.form_bmi.submit();
    }
    </script>
  </head>
  <body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>
<!--  -->
    <section>
      <form class="" name="form_bmi" action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/bmi/calculator.php?mode=<?=$mode?>" method="post">
        <div class="div-bmi">
          <h3>나의 BMI지수를 재보자</h3>
        <!-- get방식으로 안에 모드(타입)을 넣는다 bmi와 kcal을 한번에 처리한다 -->
        <ul>
          <li>
            <label for="gen">성별</label>
            <input type="radio" name="gen" id="man" value="man" checked>남
            <input type="radio" name="gen" id="girl" value="girl">여
          </li>
          <li>
            <label for="age">나이(연령)</label>
            <input type="number" name="age" id="age" value="">세
          </li>
          <li>
            <label for="cm">신장(cm)</label>
            <input type="number" name="cm" id="cm" value="">cn
          </li>
          <li>
            <label for="kg">몸무게</label>
            <input type="number" name="kg" id="kg" value="">kg
          </li>
        </ul>
        <p>
          <b>비만도 측정(BMI)이란?<br/>
            나이, 신장(cm), 몸무게(kg)만으로 비만을 판정하는 비만 지수</b>
        </p>
        <input id="btn" type="button" name="" value="확인" onclick="btn_bmi();">
        </div>
      </form>
    </section>
<!--  -->
<footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
</footer>
  </body>
</html>
