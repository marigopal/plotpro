<?php
include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$tasks_logged = $_POST['tasks_logged'];
$lead_project_id = $_POST['lead_project_id'];
$project_id = $_POST['project_id'];
$project_name = $_POST['project_name'];
$lead_id = $_POST['lead_id'];
$status_id = $_POST['status_id'];
$assigned_to = $_POST['assigned_to'];
$lead_project_description = $_POST['lead_project_description'];
$task_name = $project_name . " - ". ${strtoupper(trim($assigned_to)) . 'full_name'};

$uid_project = uniqid();
$uid_task = uniqid();
if($isNew === 'true')
{
    $query_lead_project = "INSERT INTO `tbl_lead_project`(`lead_project_id`, `project_id`, `lead_id`, `status_id`, `lead_project_description`,
    `managed_by`, `created_by`, 
    `created_on`, `modified_by`, `modified_on`) VALUES ('$uid_project','$project_id','$lead_id','$status_id','$lead_project_description','$assigned_to','$tasks_logged',
    now(),'$tasks_logged',now())";

    $query_lead_task = "INSERT INTO `tbl_lead_task`(`lead_task_id`, `lead_project_id`, `task_name`, `task_description`, `assigned_to`, 
    `status_id`, `modified_by`, `modified_on`) VALUES ('$uid_task','$uid_project','$task_name','$lead_project_description','$assigned_to',
    '$status_id','$tasks_logged',now())";
    // echo $query_lead_project; echo '</br>'; echo $query_lead_task; exit();
    $result_lead_project = $con->query($query_lead_project);
    if($result_lead_project > 0){
        $result_lead_task = $con->query($query_lead_task);
        if($result_lead_task > 0)
        {echo "1";}
    }

}

else if($isNew === 'false')
{
    $upate_lead_project = "UPDATE `tbl_lead_project` SET `status_id`='$status_id',`managed_by`='$assigned_to',`lead_project_description`='$lead_project_description',`modified_by`='$tasks_logged',`modified_on`=now() WHERE `lead_project_id` = '$lead_project_id'";
    echo $upate_lead_project;

}

?>