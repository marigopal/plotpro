<?php
include('../../include/lib_page.php');

$query2 = "SELECT `landlord_id`,`landlord_name`,`is_deleted` FROM tbl_landlords WHERE `is_deleted` = '0'";

$result = mysqli_query($con,$query2);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $landlord_id = $row['landlord_id'];
    $landlord_name = $row['landlord_name'];
   
    $data_arr[] = array("landlord_id" => $landlord_id, "landlord_name" => $landlord_name);
}
echo json_encode($data_arr);
?>
