<?php

include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$project_uid = $_POST['project_uid'];
$handled_by = $_POST['handled_by'];
$company_uid = $_POST['company_uid'];
$project_name = $_POST['project_name'];
$project_type = $_POST['project_type'];
$land_id = $_POST['land_id'];
$land_location = $_POST['land_location'];
$land_landmark = $_POST['land_landmark'];
$land_latitude = $_POST['land_latitude'];
$land_longitude = $_POST['land_longitude'];
$reg_percentage = $_POST['reg_percentage'];
$easy_emi = $_POST['easy_emi'];
$dtcp_status = $_POST['dtcp_status'];
$patta_status = $_POST['patta_status'];
$chitta_status = $_POST['chitta_status'];
$uid = uniqid();
if ($isNew === 'true') {
    $query = "INSERT INTO `tbl_projects` (`project_id`, `project_name`, `projecttype_id`, `company_id`,
     `land_id`, `handled_by`, `location`, `landmark`, `latitude`, `longitude`, `is_active`, `reg_percentage`, 
     `easy_emi_available`, `dtcp_approved`, `patta_available`, `chitta_available`) 
     VALUES ('$uid','$project_name',$project_type,'$company_uid','$land_id','$handled_by','$land_location',
     '$land_landmark','$land_latitude','$land_longitude','1','$reg_percentage','$easy_emi','$dtcp_status','$patta_status','$chitta_status')";
} else if ($isNew === 'false') {
    $query = "UPDATE `tbl_projects` SET `project_name`='$project_name',`projecttype_id`=$project_type,
    `land_id`='$land_id',`handled_by`='$handled_by',`location`='$land_location',`landmark`='$land_landmark',
    `latitude`='$land_latitude',`longitude`='$land_longitude', `reg_percentage` = '$reg_percentage',`easy_emi_available`='$easy_emi',
    `dtcp_approved`='$dtcp_status',`patta_available`='$patta_status',`chitta_available`='$chitta_status' WHERE `project_id` = '$project_uid'";
}
//echo $query;exit();
$result = $con->query($query);
if ($result == 1) {
    echo $uid;
} else {
    echo '';
}
?>