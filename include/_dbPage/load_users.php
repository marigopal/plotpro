<?php
include('../../include/lib_page.php');

$query2 = "SELECT * FROM `tbl_users` WHERE `is_deleted` = ''";

$result = mysqli_query($con,$query2);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $user_id  = $row['user_id'];
    $full_name = $row['full_name'];
    $role_id = $row['role_id'];
   
    $data_arr[] = array("user_id" => $user_id , "full_name" => $full_name, "role_id" => $role_id);
}
echo json_encode($data_arr);
?>
