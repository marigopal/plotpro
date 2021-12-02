<?php
include('../../include/lib_page.php');

$query2 = "SELECT `plotsale_id`,`sales_name`,`is_deleted` FROM tbl_plotsales WHERE `is_deleted` = '0'";

$result = mysqli_query($con,$query2);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $plotsale_id = $row['plotsale_id'];
    $sales_name = $row['sales_name'];
   
    $data_arr[] = array("plotsale_id" => $plotsale_id, "sales_name" => $sales_name);
}
echo json_encode($data_arr);
?>
