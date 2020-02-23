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
    <title>HELF :: 회사 소개</title>
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
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
          <b>회사소개</b>
        </div>
        <div id="div_introduction">
          <p>안녕하세요 대표자 <b><?=$mater?></b> 입니다. <br/>
            저희 HELF는 2020년 2월에 설립이 된 회사입니다.<br/>
            当 HELFは 2020年 2月 に設立された会社です。 <br/>
            HELF is a company established in February 2020. <br/>

            exercitation ullamco laboris nisi ut aliquip ex ea commodo <br/>
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum <br/>
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat <br/>
            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
          </p>
          <p>Lorem ipsum dolor sit <br/>
            amet, consectetur adipisicing elit, sed do <br/>
            eiusmod tempor incididunt ut labore et dolore <br/>
            magna aliqua. Ut enim ad minim veniam, quis nostrud <br/>
            exercitation ullamco laboris nisi ut aliquip ex ea commodo <br/>
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum <br/>
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat <br/>
            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
          </p>
          <p>Lorem ipsum dolor sit <br/>
            amet, consectetur adipisicing elit, sed do <br/>
            eiusmod tempor incididunt ut labore et dolore <br/>
            magna aliqua. Ut enim ad minim veniam, quis nostrud <br/>
            exercitation ullamco laboris nisi ut aliquip ex ea commodo <br/>
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum <br/>
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat <br/>
            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
          </p>
          <p>Lorem ipsum dolor sit <br/>
            amet, consectetur adipisicing elit, sed do <br/>
            eiusmod tempor incididunt ut labore et dolore <br/>
            magna aliqua. Ut enim ad minim veniam, quis nostrud <br/>
            exercitation ullamco laboris nisi ut aliquip ex ea commodo <br/>
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum <br/>
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat <br/>
            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
          </p>
          <img src="" alt="조직도 이미지">
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
