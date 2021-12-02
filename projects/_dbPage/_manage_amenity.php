<?php

include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$project_uid = $_POST['project_uid'];
$amenity_uid = $_POST['amenity_uid'];
$amenity_title = $_POST['amenity_title'];
$amenity_description = $_POST['amenity_description'];
if ($isNew === 'true') {
    $query = "INSERT INTO `tbl_project_amenity`(`project_id`, `amenity_title`, `amenity_description`) VALUES ('$project_uid','$amenity_title','$amenity_description')";
} else if ($isNew === 'false') {
    $query = "UPDATE `tbl_project_amenity` SET `amenity_title`='$amenity_title',`amenity_description`='$amenity_description' WHERE `amenity_id` = '$amenity_uid'";
}
$result = $con->query($query);
if ($result == 1) {
    echo "1";
} else {
    echo "";
}
?>