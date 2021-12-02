<?php

include('../../include/lib_page.php');
$block_id = $_POST['block_id'];
$sql = "SELECT `plot_id`,`plot_name`,`is_deleted`, 'block_id' FROM `tbl_plots` WHERE `block_id` = '$block_id'";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $plot_id = $row['plot_id'];
    $plot_name = $row['plot_name'];
    $block_id = $row['block_id'];
    $data_arr[] = array("plot_id" => $plot_id, "plot_name" => $plot_name, "block_id" => $block_id);
}
echo json_encode($data_arr);
?>