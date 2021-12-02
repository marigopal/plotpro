<?php

include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_leads` WHERE `is_deleted` = '0' AND `is_active` = '1' AND `lead_id` =  '$id'";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $lead_id = $row['lead_id'];
    $first_name = $row['first_name'];
    $mid_name = $row['mid_name'];
    $last_name = $row['last_name'];
    $title = $row['title'];
    $phone = $row['phone'];
    $mobile = $row['mobile'];
    $email = $row['email'];
    $city = $row['city'];
    $state = $row['state'];
    $zipcode = $row['zipcode'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $login_user_id = $row['login_user_id'];
    $data_arr[] = array("lead_id" => $lead_id, "first_name" => $first_name, "mid_name" => $mid_name, "last_name" => $last_name, "title" => $title, "phone" => $phone, "mobile" => $mobile, "email" => $email, "city" => $city, "state" => $state, "zipcode" => $zipcode, "address1" => $address1, "address2" => $address2, "login_user_id" => $login_user_id);
}
echo json_encode($data_arr);
?>