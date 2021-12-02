<?php
include('../../include/lib_page.php');
$projectid = $_POST['projectid'];

$query2 = "SELECT a.plot_id,a.project_id,a.block_id,a.is_deleted,b.block_id,b.block_name FROM tbl_plots a join tbl_blocks b on a.block_id = b.block_id where a.is_deleted = '0' and project_id ='$projectid' group by a.block_id";
// echo $query2;exit();
$result = mysqli_query($con,$query2);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $block_id = $row['block_id'];
    $block_name = $row['block_name'];
   
    $data_arr[] = array("block_id" => $block_id, "block_name" => $block_name);
}
echo json_encode($data_arr);
?>
