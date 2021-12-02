<?php

include('../../include/lib_page.php');
$project_id = $_POST['project_id'];
$emi_eligible = "SELECT * FROM tbl_projects where project_id = '$project_id' and is_deleted = '0'";
$result = mysqli_query($con, $emi_eligible);
$row = mysqli_fetch_array($result);
if ($row['easy_emi_available'] == 1) {
    echo "1";
} else {
    echo "0";
}
?>
