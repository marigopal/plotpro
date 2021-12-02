<?php

include('../../include/lib_page.php');
$delete_id = $_POST['uid'];
$landlord_check = "SELECT COUNT(*) as cntUser FROM `tbl_landlords` WHERE `is_deleted` = '0' AND `land_id` = '$delete_id'";
$result_landlord = mysqli_query($con, $landlord_check);
$row_landlord = mysqli_fetch_array($result_landlord);
if ($row_landlord['cntUser'] == 0) {
    $delete_query = "UPDATE `tbl_lands` SET `is_deleted`='1' WHERE `land_id` =  '$delete_id'";
    if ($result = $con->query($delete_query)) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "2";
}
?>