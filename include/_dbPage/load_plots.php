<?php
include('../../include/lib_page.php');
$projectid= $_POST['projectid'];
if(isset($_POST['block_id'])){
$block_id = $_POST['block_id'];
$query2 = "SELECT plot_id,project_id,block_id,plot_name,is_sold,is_deleted, IFNULL(sqft_value,0) sqft_value FROM tbl_plots where is_deleted = '0' and project_id = '$projectid' and block_id = '$block_id'";
}
else {
    # code...
    $query2 = "SELECT plot_id,project_id,block_id,plot_name,is_sold,is_deleted, IFNULL(sqft_value,0) sqft_value FROM tbl_plots where is_deleted = '0' and project_id = '$projectid'";
}

// echo $query2;exit();
$result = mysqli_query($con,$query2);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $plot_id = $row['plot_id'];
    $plot_name = $row['plot_name'];
    $block_id = $row['block_id'];
    $is_sold = $row['is_sold'];
    $sqft_value = $row['sqft_value'];
   
    $data_arr[] = array("plot_id" => $plot_id, "plot_name" => $plot_name, "block_id" => $block_id, "is_sold" => $is_sold, "sqft_value" => $sqft_value);
}
echo json_encode($data_arr);
?>
