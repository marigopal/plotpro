<?php
include('../../include/lib_page.php');

$query2 = "SELECT `project_id`,`project_name`,`is_deleted` FROM tbl_projects WHERE `is_deleted` = '0'";

$result = mysqli_query($con,$query2);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $project_id = $row['project_id'];
    $project_name = $row['project_name'];
   
    $data_arr[] = array("project_id" => $project_id, "project_name" => $project_name);
}
echo json_encode($data_arr);
?>
