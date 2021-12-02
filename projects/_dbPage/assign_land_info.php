<?php

include('../../include/lib_page.php');
$req_land_id = $_POST['land_id'];
$sql = "SELECT * FROM `tbl_lands` WHERE `land_id` = '$req_land_id' AND `is_deleted` = '0'";
$result = mysqli_query($con, $sql);
$users_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $land_id = $row['land_id'];
    $landlord_name = $row['landlord_name'];
    $land_location = $row['land_location'];
    $landmark = $row['landmark'];
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
    $users_arr[] = array("land_location" => $land_location, "landmark" => $landmark, "latitude" => $latitude, "longitude" => $longitude);
}
echo json_encode($users_arr);
?>