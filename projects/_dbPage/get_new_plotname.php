<?php

include('../../include/lib_page.php');
$req_block_id = $_POST['block_id'];
$req_project_uid = $_POST['project_uid'];
$sql = "SELECT Max(plot_no) + 1 as new_plot_no FROM `tbl_plots` WHERE `project_id` = '$req_project_uid' and `block_id` = '$req_block_id' AND `is_deleted` = '0'";
$result = mysqli_query($con, $sql);
$users_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $plot_no = $row['new_plot_no'];
    if ($plot_no == null) {
        $plot_no = 1;
    }
    $users_arr[] = array("plot_no" => $plot_no);
}
echo json_encode($users_arr);
?>