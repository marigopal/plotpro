<?php

include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_lands` WHERE `is_deleted` = '0' AND `land_id` = '$id'";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $land_id = $row['land_id'];
    $landlord_name = $row['landlord_name'];
    $land_location = $row['land_location'];
    $landmark = $row['landmark'];
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
    $land_total_acres = $row['land_total_acres'];
    $land_total_value = $row['land_total_value'];
    $land_sqft_value = $row['land_sqft_value'];
    $land_total_cent = $row['land_total_cent'];
    $data_arr[] = array("land_id" => $land_id, "landlord_name" => $landlord_name, "land_location" => $land_location, "landmark" => $landmark, "latitude" => $latitude, "longitude" => $longitude, "land_total_acres" => $land_total_acres, "land_total_value" => $land_total_value, "land_sqft_value" => $land_sqft_value, "land_total_cent" => $land_total_cent);
}
echo json_encode($data_arr);
?>