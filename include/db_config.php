<?php


date_default_timezone_set("Asia/Calcutta");
$con = mysqli_connect("sg2nlmysql11plsk.secureserver.net", "enflowsa", "123@T123", "php_btechplotpro");
if (!$con) {
    header("Location: /db_fail");
    die("Connection failed: " . mysqli_connect_error());
   
}

?>

