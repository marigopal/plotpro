<?php
include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_users` WHERE `is_deleted` = '0' AND `user_id` = '$id'";

$result = mysqli_query($con,$sql);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $user_id  = $row['user_id'];
    $full_name = $row['full_name'];
    $city = $row['city'];
    $mobile_number = $row['mobile_number'];
    $email = $row['email'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $employee_id = $row['employee_id'];
    $username = $row['username'];
    $password = decrypt($row['password']);
    $role_id = $row['role_id'];
    $is_active = $row['is_active'];
    $data_arr[] = array("user_id" => $user_id, "full_name" => $full_name, "city" => $city, "mobile_number" => $mobile_number, "email" => $email, "address1" => $address1, "address2" => $address2, "employee_id" => $employee_id, "username" => $username, "password" => $password, "role_id" => $role_id, "is_active" => $is_active);
}
echo json_encode($data_arr);
?>