<?php

include('../../include/lib_page.php');
$req_block_id = $_POST['block_id'];
$req_project_uid = $_POST['project_uid'];
$sql = "SELECT * FROM `tbl_plots` WHERE `project_id` = '$req_project_uid' and `block_id` = '$req_block_id' AND `is_deleted` = '0'";
$result = mysqli_query($con, $sql);
$users_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $plot_id = $row['plot_id'];
    $plot_no = $row['plot_no'];
    $plot_name = $row['plot_name'];
    $square_feet = $row['square_feet'];
    $in_cent = $row['in_cent'];
    $sqft_value = $row['sqft_value'];
    $users_arr[] = array("plot_id" => $plot_id, "plot_no_1" => $plot_no, "plot_name" => $plot_name, "square_feet" => $square_feet, "in_cent" => $in_cent, "sqft_value" => $sqft_value);
}
echo json_encode($users_arr);
?>