<?php

include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_projects` WHERE `is_deleted` = '0' and `project_id` = '$id'";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $project_id = $row['project_id'];
    $project_name = $row['project_name'];
    $projecttype_id = $row['projecttype_id'];
    $company_id = $row['company_id'];
    $land_id = $row['land_id'];
    $handled_by = $row['handled_by'];
    $location = $row['location'];
    $landmark = $row['landmark'];
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
    $reg_percentage = $row['reg_percentage'];
    $easy_emi_available = $row['easy_emi_available'];
    $dtcp_approved = $row['dtcp_approved'];
    $patta_available = $row['patta_available'];
    $chitta_available = $row['chitta_available'];
    $data_arr[] = array("project_id" => $project_id, "project_name" => $project_name, "projecttype_id" => $projecttype_id, "company_id" => $company_id, "land_id" => $land_id, "handled_by" => $handled_by, "location" => $location, "landmark" => $landmark, "latitude" => $latitude, "longitude" => $longitude, "reg_percentage" => $reg_percentage, "easy_emi_available" => $easy_emi_available, "dtcp_approved" => $dtcp_approved, "patta_available" => $patta_available, "chitta_available" => $chitta_available);
}
echo json_encode($data_arr);
?>