<?php
include('../../include/lib_page.php');
$blocks_name = $_POST['blocks_name'];
$query = "SELECT count(*) as cntUser
FROM `php_btechplotpro`.`tbl_blocks` where block_name = '$blocks_name' and is_deleted = '0';";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
if ($row['cntUser'] > 0) {
    echo "1";
} else {
echo "0";    
}
?>
