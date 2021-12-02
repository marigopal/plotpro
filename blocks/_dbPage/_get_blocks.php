<?php

include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_blocks` WHERE `is_deleted` = '0' AND `block_id` = '$id'";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $block_id = $row['block_id'];
    $block_name = $row['block_name'];

    $data_arr[] = array("block_id " => $block_id, "block_name" => $block_name);
}
echo json_encode($data_arr);
?>