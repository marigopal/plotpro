<?php

include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_landlords` WHERE `is_deleted` = '0' AND `landlord_id` = '$id'";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $land_id = $row['land_id'];
    $landlord_id = $row['landlord_id'];
    $landlord_name = $row['landlord_name'];
    $bought_on = $row['bought_on'];
    $sold_on = $row['sold_on'];
    $bought_value = $row['bought_value'];
    $sold_value = $row['sold_value'];
    $bought_from_landlord_id = $row['bought_from_landlord_id'];
    $data_arr[] = array("land_id" => $land_id, "landlord_id" => $landlord_id, "landlord_name" => $landlord_name, "bought_on" => $bought_on, "sold_on" => $sold_on, "bought_value" => $bought_value, "sold_value" => $sold_value, "bought_from_landlord_id" => $bought_from_landlord_id);
}
echo json_encode($data_arr);
?>