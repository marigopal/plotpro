<?php

include('../../include/lib_page.php');
$id = $_POST['id'];
$check_lead = "select count(*) as cntUser from tbl_plotsales WHERE `lead_id` = '$id'";
$result = mysqli_query($con, $check_lead);
$row = mysqli_fetch_array($result);
if ($row['cntUser'] > 0) {
    echo $row['cntUser'];
} else {
    echo "0";
}
?>
