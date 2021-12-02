<?php
include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_lead_task` WHERE `is_deleted` = '0' AND `lead_task_id`= '$id'";
// echo $sql;exit();
$result = mysqli_query($con,$sql);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $lead_task_id = $row['lead_task_id'];
    $lead_project_id = $row['lead_project_id'];
    $task_name = $row['task_name'];
    $task_description = $row['task_description'];
    $assigned_to = $row['assigned_to'];
    $status_id = $row['status_id'];
    
    $data_arr[] = array("lead_task_id" => $lead_task_id, "lead_project_id" => $lead_project_id, "task_name" => $task_name, "task_description" => $task_description, "assigned_to" => $assigned_to, "status_id" => $status_id);
}
echo json_encode($data_arr);
?>