<?php
include('../../include/lib_page.php');
$projectid= $_POST['projectid'];
$block_id = $_POST['block_id'];
$isnew = $_POST['isnew'];
if($isnew == 1){
    $query2 = "SELECT plot_id,project_id,block_id,plot_name,is_sold,is_deleted,sqft_value FROM tbl_plots where is_deleted = '0' and project_id = '$projectid' and block_id = '$block_id' and (sqft_value != '' or sqft_value != '0')";
}else {
    $query2 = "SELECT plot_id,project_id,block_id,plot_name,is_sold,is_deleted,sqft_value FROM tbl_plots where is_sold = '0' and is_deleted = '0' and project_id = '$projectid' and block_id = '$block_id' and (sqft_value != '' or sqft_value != '0')";
}
    


// echo $query2;exit();
$result = mysqli_query($con,$query2);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $plot_id = $row['plot_id'];
    $plot_name = $row['plot_name'];
   
    $data_arr[] = array("plot_id" => $plot_id, "plot_name" => $plot_name);
}
echo json_encode($data_arr);
?>
