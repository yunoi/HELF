<?php
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";

if (!$conn) {
    die("Error connecting to database: " . mysqli_connect_error($conn));
    exit();
}


if (isset($_POST['list'])) {
    $count = $_POST['list'];
    $num = 5;

    $sql="select * from program order by o_key desc limit ".$count.",".$num;
    // execute query to effect changes in the database ...
    $result = mysqli_query($conn, $sql);

    for($i=0; $program=mysqli_fetch_array($result); $i++){
      $array[] = array("o_key" => $program[0] , "shop" => $program[1] , "type" => $program[2] , "subject" => $program[3] , "personnel" => $program[5],
      "end_day" => $program[6] , "choose" => $program[7] , "price" => $program[8] , "location" => $program[9] , "file_copied" => $program[11]);
    }

    echo json_encode($array);

}
