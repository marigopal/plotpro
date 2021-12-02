<?php

include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_company` WHERE `is_deleted` = '0' AND `company_id` = '$id'";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $company_id = $row['company_id'];
    $company_name = $row['company_name'];
    $company_address1 = $row['company_address1'];
    $company_address2 = $row['company_address2'];
    $company_city = $row['company_city'];
    $company_zipcode = $row['company_zipcode'];
    $company_email = $row['company_email'];
    $company_mobileno = $row['company_mobileno'];
    $company_phone = $row['company_phone'];
    $company_properitor = $row['company_properitor'];
    $is_active = $row['is_active'];
    $data_arr[] = array("company_id" => $company_id, "company_name" => $company_name, "company_address1" => $company_address1, "company_address2" => $company_address2, "company_city" => $company_city, "company_zipcode" => $company_zipcode, "company_email" => $company_email, "company_mobileno" => $company_mobileno, "company_phone" => $company_phone, "company_properitor" => $company_properitor, "is_active" => $is_active);
}
echo json_encode($data_arr);
?>