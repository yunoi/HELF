<!DOCTYPE html>
<!-- 회사소개 -->
<?php $mater="강윤해" ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>회사 소개</title>
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
        <link rel="stylesheet" href="./css/introduction.css">
  </head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>
    <section>
      <article>
        <div id="div_header">
          <b>회사소개</b>
        </div>
        <div id="div_introduction">
          <p>안녕하세요 대표자 <b><?=$mater?></b> 입니다. <br/>
            저희 HELF<br/>
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

    <aside>
    <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/aside.php";?>
  </aside>
  <footer>
  <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
  </footer>
  </body>
</html>
