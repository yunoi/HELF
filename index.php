<?php
  session_start();
 include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/create_table.php";
?>
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
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>

            <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>

        <script type="text/javascript" src="./common/js/main.js"></script>
    </head>
    <body>

        <header>
            <?php include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/header.php";?>
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