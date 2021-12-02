<?php

include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$projecttype_id = $_POST['projecttype_id'];
$projecttype_name = $_POST['projecttype_name'];
$uid = uniqid();
if ($isNew === 'true') {
    $producttype_query = "INSERT INTO `tbl_projecttype`(`projectype_name`) VALUES ('$projecttype_name')";
} else if ($isNew === 'false') {
    $producttype_query = "UPDATE `tbl_projecttype` SET `projectype_name`='$projecttype_name' WHERE `projecttype_id` = '$projecttype_id'";
}
if ($result = $con->query($producttype_query)) {
    echo "1";
} else {
    echo "0";
}
?>