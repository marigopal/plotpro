<?php
include('../../include/lib_page.php');

$query2 = "SELECT * FROM `tbl_task_status` ORDER BY `seq_number` ASC";

$result = mysqli_query($con,$query2);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $task_status_id  = $row['task_status_id'];
    $task_status_name = $row['task_status_name'];
    
   
    $data_arr[] = array("task_status_id" => $task_status_id , "task_status_name" => $task_status_name);
}
echo json_encode($data_arr);
?>
