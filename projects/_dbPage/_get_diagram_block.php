<?php

include('../../include/lib_page.php');
$project_uid = $_POST['project_uid'];
$sql = "SELECT a.`plot_id`,a.`project_id`,a.`block_id`,a.`plot_name`,a.`is_deleted`,b.block_id,b.block_name "
        . "FROM `tbl_plots` a "
        . "JOIN tbl_blocks b on b.block_id = a.`block_id` "
        . "WHERE a.is_deleted = '0' AND a.project_id = '$project_uid' GROUP BY a.`block_id`";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $block_id = $row['block_id'];
    $block_name = $row['block_name'];
    $data_arr[] = array("block_id" => $block_id, "block_name" => $block_name);
}
echo json_encode($data_arr);
?>