<?php
include('../../include/lib_page.php');

$query2 = "SELECT `lead_id`,`first_name`,`is_deleted` FROM tbl_leads WHERE `is_deleted` = '0'";

$result = mysqli_query($con,$query2);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $lead_id = $row['lead_id'];
    $first_name = $row['first_name'];
   
    $data_arr[] = array("lead_id" => $lead_id, "first_name" => $first_name);
}
echo json_encode($data_arr);
?>
