<?php
include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_lead_project` WHERE `lead_project_id` = '$id' and `is_deleted` = '0'";
// echo $sql;exit();
$result = mysqli_query($con,$sql);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $lead_project_id = $row['lead_project_id'];
    $project_id = $row['project_id'];
    $lead_id = $row['lead_id'];
    $status_id = $row['status_id'];
    $managed_by = $row['managed_by'];
    $lead_project_description = $row['lead_project_description'];
   
   $data_arr[] = array("lead_project_id" => $lead_project_id, "project_id" => $project_id, "lead_id" => $lead_id, "status_id" => $status_id, "managed_by" => $managed_by, "lead_project_description" => $lead_project_description);
}
echo json_encode($data_arr);
?>