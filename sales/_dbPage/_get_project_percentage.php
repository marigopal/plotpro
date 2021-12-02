<?php
include('../../include/lib_page.php');
$project_id = $_POST['project_id'];
$sql = "select project_id,reg_percentage from tbl_projects where is_deleted = '0' and project_id ='$project_id'";
// echo $sql; exit();
$result = mysqli_query($con,$sql);
$data_arr = array();
while( $row = mysqli_fetch_array($result) ){
    
    $reg_percentage = $row['reg_percentage'];
    
   
    $data_arr[] = array("reg_percentage" => $reg_percentage);
}
echo json_encode($data_arr);
?>