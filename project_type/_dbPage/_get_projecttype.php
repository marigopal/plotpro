<?php

include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_projecttype` WHERE `is_deleted` = '0' and projecttype_id = '$id'";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $projecttype_id = $row['projecttype_id'];
    $projectype_name = $row['projectype_name'];
    $data_arr[] = array("projecttype_id" => $projecttype_id, "projectype_name" => $projectype_name);
}
echo json_encode($data_arr);
?>