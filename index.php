<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>HELF :: Health friends, healthier life</title>
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
            type="text/css"
            href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/helf/common/css/carousel.css">
        <script src="./js/vendor/modernizr.custom.min.js"></script>
        <script src="./js/vendor/jquery-1.10.2.min.js"></script>
        <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="./main.js"></script>
    </head>
    <body>

        <header>
            <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
            <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/carousel.php";?>
        </header>
        <div id="container">
            <div id="section_aside">
                <section>
                    <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/main.php";?>
                </section>
                <aside>
                    <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/aside.php";?>
                </aside>
            </div>
        </div>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/footer.php";?>
        </footer>

    </body>
</html>
