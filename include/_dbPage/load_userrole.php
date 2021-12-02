<?php
include('../../include/lib_page.php');

$query2 = "SELECT * FROM `tbl_usersroles` WHERE `is_deleted` = '0'";

$result = mysqli_query($con,$query2);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $role_id  = $row['role_id'];
    $role_name = $row['role_name'];
   
    $data_arr[] = array("role_id" => $role_id , "role_name" => $role_name);
}
echo json_encode($data_arr);
?>
