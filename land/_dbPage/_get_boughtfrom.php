<?php

include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_landlords` WHERE `is_deleted` = '0' AND `landlord_id` = '$id'";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $sold_on = $row['sold_on'];
    $sold_value = $row['sold_value'];
    $data_arr[] = array("sold_on" => $sold_on, "sold_value" => $sold_value);
}
echo json_encode($data_arr);
?>