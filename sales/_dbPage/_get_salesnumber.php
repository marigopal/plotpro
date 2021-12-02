<?php
include('../../include/lib_page.php');
$sql = "SELECT Max(sales_number) as new_sales_number FROM `tbl_plotsales` WHERE `is_deleted` = '0'";
// echo $sql; exit();
$result = mysqli_query($con,$sql);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    
    $sales_number = $row['new_sales_number'];
    
    if($sales_number == null)
    {
        $sales_number = 0;
    }
    $data_arr[] = array("sales_number" => $sales_number);
}
echo json_encode($data_arr);
?>