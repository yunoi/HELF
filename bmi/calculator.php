<!-- bmi와 kcal이 모드를 가져오면 확인후 계간해서 화면 출력하는부분 -->
<?php
  if(isset($_GET['mode'])){
    $mode=$_GET['mode'];
  }else{
    echo "<script>
    alert('오류가 발생했습니다');
    <script/>";
    return;
  }
  switch ($mode) {
    case 'bmi'://
      $gen = $_POST['gen']; //성별
      $age = $_POST['age']; //나이

      $cm = $_POST['cm']; //신장
      $kg = $_POST['kg']; //무게
      $bmi = (int)$kg / ((int)$cm*(int)$cm); //bmi지수
      // 공식 bmi지수= 몸무게 / (신장*신장)
      break;
    case 'kcal'://
    $gen = $_POST['gen'];
    $age = $_POST['age'];

    $cm = $_POST['cm'];
    $kg = $_POST['kg'];
    $goal_kg = $_POST['goal_kg'];
    $term = $_POST['term'];
    $work = $_POST['work']; //활동량
    //기초대사량
    if($gen==="man"){
      $basic_met=293-(3.8*$age)+456.4*(parseFloat($cm)/100)+10.12*parseFloat($kg);
    }else{
      $basic_met=247-(2.67*$age)+401.5*(parseFloat($cm)/100)+8.60*parseFloat($kg);
    }
    $basic_met=parseFloat($basic_met); //기초 대사량
	  $active_met=parseFloat($basic_met*$work); //활동대사량
	  $digest_met=parseFloat((($basic_met+$active_met)/0.9)*0.1); //소화 대사량
	  $all_met = $basic_met+$active_met+$digest_met; //전체 대사량
      break;
    default://
      return;
  }
 ?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/main.css">
    <link rel="stylesheet" href="./css/calculator.css">
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="./common/js/main.js"></script>
  </head>
  <body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>
  <?php
if($mode==="bmi"){
  ?>
  <div class="div-bmi">
      <table>
        <tr>
          <th>성별</th>
          <td><?=$gen?></td>
        </tr>
        <tr>
          <th>나이</th>
          <td><?=$age?></td>
        </tr>
        <tr>
          <th>신장(cm)</th>
          <td><?=$cm?></td>
        </tr>
        <tr>
          <th>몸무게</th>
          <td><?=$kg?></td>
        </tr>
        <tr>
          <th>BMI수치</th>
          <td><?=$bmi?></td>
        </tr>
      </table>
  </div>
  <?php
}else{
   ?>
   <div class="div-kcal">
       <table>
         <tr>
           <th>성별</th>
           <td><?=$gen?></td>
         </tr>
         <tr>
           <th>나이</th>
           <td><?=$age?></td>
         </tr>
         <tr>
           <th>신장(cm)</th>
           <td><?=$cm?></td>
         </tr>
         <tr>
           <th>몸무게</th>
           <td><?=$kg?></td>
         </tr>
         <tr>
           <th>권장 칼로리</th>
           <td><?=$day_kcal?></td>
         </tr>
       </table>
   </div>
   <?php
}
 ?>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
    </footer>

  </body>
</html>
