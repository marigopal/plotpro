<?php

include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_project_amenity` WHERE `is_deleted` = '0' AND `amenity_id` = '$id'";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $amenity_id = $row['amenity_id'];
    $project_id = $row['project_id'];
    $amenity_title = $row['amenity_title'];
    $amenity_description = $row['amenity_description'];
    $data_arr[] = array("amenity_id" => $amenity_id, "project_id" => $project_id, "amenity_title" => $amenity_title, "amenity_description" => $amenity_description);
}
echo json_encode($data_arr);
?>