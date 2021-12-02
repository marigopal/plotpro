<?php
include('../../include/lib_page.php');
$username = $_POST['username'];
$query = "SELECT  count(*) as cntUser
FROM `php_btechplotpro`.`tbl_users` where username = '$username' and is_deleted = '0';";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
if ($row['cntUser'] > 0) {
    echo "1";
} else {
echo "0";    
}
?>
