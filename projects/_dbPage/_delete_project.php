<?php

include('../../include/lib_page.php');
$delete_id = $_POST['uid'];
$amenity_check = "SELECT COUNT(*) as cntUser FROM tbl_project_amenity WHERE `is_deleted` = '0' AND `project_id` =  '$delete_id'";
$result_amenity_check = mysqli_query($con, $amenity_check);
$row_amenity = mysqli_fetch_array($result_amenity_check);
if ($row_amenity['cntUser'] == 0) {
    $delete_query = "UPDATE `tbl_projects` SET `is_deleted`='1' WHERE `project_id` = '$delete_id'";
    if ($result = $con->query($delete_query)) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "2";
}
?>