<?php
include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$tasks_logged = $_POST['tasks_logged'];
$lead_task_id = $_POST['lead_task_id'];
$task_lead_project_id = $_POST['task_lead_project_id'];
$existing_task_name = $_POST['existing_task_name'];
$task_name = $_POST['task_name'];
$existing_status_id = $_POST['existing_status_id'];
$existing_status_name = $_POST['existing_status_name'];
$task_status_id = $_POST['task_status_id'];
$task_status_name = $_POST['task_status_name'];
$existing_assigned_to = $_POST['existing_assigned_to'];
$existing_assigned_to_name = $_POST['existing_assigned_to_name'];
$task_assigned_to = $_POST['task_assigned_to'];
$task_assigned_to_name = $_POST['task_assigned_to_name'];
$existing_task_description = $_POST['existing_task_description'];
$task_description = $_POST['task_description'];


$uid_task = uniqid();


if($isNew === 'true')
{
  $insert_task = "INSERT INTO `tbl_lead_task`(`lead_task_id`, `lead_project_id`, `task_name`, 
  `task_description`, `assigned_to`, `status_id`, `modified_by`, `modified_on`) 
  VALUES ('$uid_task','$task_lead_project_id','$task_name','$task_description','$task_assigned_to',
  '$task_status_id','$tasks_logged',now())";
//   echo $insert_task;
  $result_lead_task = $con->query($insert_task);
    if($result_lead_task > 0){
    echo "1";
    }

}

else if($isNew === 'false')
{
    $update_task = "UPDATE `tbl_lead_task` SET `task_name`='$task_name',`task_description`='$task_description',
    `assigned_to`='$task_assigned_to',`status_id`='$task_status_id',`modified_by`='$tasks_logged',`modified_on`=now() WHERE `lead_task_id` = '$lead_task_id'";
    // echo $update_task;  echo '</br>'; 
    $result_update_task = $con->query($update_task);
    if($result_update_task > 0)
    {
        if($existing_task_name != $task_name)
        {
            $uid_taskname = uniqid();
            $_str_task = "[{\"Existing Task Name\":\"" . $existing_task_name . "\",\"New Task Name\":\"" . $task_name . "\"}]";
            $taskname_log = "INSERT INTO `tbl_tasklogs`(`tasklog_id`, `log_date`, `lead_task_id`, `log_description`) 
            VALUES ('$uid_taskname',now(),'$lead_task_id','$_str_task')";
            $result_insert_taskname_log = $con->query($taskname_log);
            if(!($result_insert_taskname_log > 0))
            {echo "Task Name Not inserted";}
        }
        if($existing_status_id != $task_status_id)
        {
            $uid_status_id = uniqid();
            $_str_status = "[{\"Existing Status Name\":\"" . $existing_status_name . "\",\"New Status Name\":\"" . $task_status_name . "\"}]";
            $status_log = "INSERT INTO `tbl_tasklogs`(`tasklog_id`, `log_date`, `lead_task_id`, `log_description`) 
            VALUES ('$uid_status_id',now(),'$lead_task_id','$_str_status')";
            $result_insert_status_id_log = $con->query($status_log);
            if(!($result_insert_status_id_log > 0))
            {echo "Status Not inserted";}
        }
        if($existing_assigned_to != $task_assigned_to)
        {
            $uid_assignedto = uniqid();
            $_str_assignedto = "[{\"Existing Assigned Name\":\"" . $existing_assigned_to_name . "\",\"New Assigned Name\":\"" . $task_assigned_to_name . "\"}]";
            $assigned_to_log = "INSERT INTO `tbl_tasklogs`(`tasklog_id`, `log_date`, `lead_task_id`, `log_description`) 
            VALUES ('$uid_assignedto',now(),'$lead_task_id','$_str_assignedto')";
             $result_insert_assignedto_log = $con->query($assigned_to_log);
             if(!($result_insert_assignedto_log > 0))
             {echo "Assignedto Not inserted";}
         }
        
        if($existing_task_description != $task_description)
        {
            $uid_description = uniqid();
            $_str_description = "[{\"Existing Description\":\"" . $existing_task_description . "\",\"New Description\":\"" . $task_description . "\"}]";
            $description_log = "INSERT INTO `tbl_tasklogs`(`tasklog_id`, `log_date`, `lead_task_id`, `log_description`) 
            VALUES ('$uid_description',now(),'$lead_task_id','$_str_description')";
             $result_insert_description_log = $con->query($description_log);
             if(!($result_insert_description_log > 0))
             {echo "Description Not inserted";}
        }
        echo "1";
    }
    
}
else
    {echo "0";}

?>