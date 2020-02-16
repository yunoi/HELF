<!DOCTYPE html>
<!-- 회사소개 -->
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
    <style>
      #div_introduction{
        margin: 0 auto;
        border:2px solid black;
        width: 450px;
      }
    </style>
  </head>
  <body>
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
    </header>

    <section>
      <article>
        <div id="div_introduction">
          <h3>회사 소개</h3>
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
