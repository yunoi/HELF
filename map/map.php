<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>키워드로 장소검색하기</title>
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/common.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/main.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
        <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
</head>
<body>
  <header>
      <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
  </header>
  <?php include $_SERVER['DOCUMENT_ROOT']."/helf/map/list.php";?>
  <footer>
      <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
  </footer>
</body>
</html>
