<?php

include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$land_id = $_POST['land_id'];
$land_name = $_POST['land_name'];
$land_location = $_POST['land_location'];
$land_landmark = $_POST['land_landmark'];
$land_acers = $_POST['land_acers'];
$land_value = $_POST['land_value'];
$land_cent = $_POST['land_cent'];
$land_square_feet = $_POST['land_square_feet'];
$land_latitude = $_POST['land_latitude'];
$land_longitude = $_POST['land_longitude'];
$uid = uniqid();
if ($isNew === 'true') {
    $query = "INSERT INTO `tbl_lands`(`land_id`, `landlord_name`, `land_location`, `landmark`, "
            . "`latitude`, `longitude`, `land_total_acres`, `land_total_value`, `land_sqft_value`, "
            . "`land_total_cent`) VALUES ('$uid','$land_name','$land_location','$land_landmark',"
            . "'$land_latitude','$land_longitude',$land_acers,'$land_value','$land_square_feet',"
            . "'$land_cent')";
} else if ($isNew === 'false') {
    $query = "UPDATE `tbl_lands` SET `landlord_name`='$land_name',`land_location`='$land_location',"
            . "`landmark`='$land_landmark',`latitude`=$land_latitude,`longitude`=$land_longitude,"
            . "`land_total_acres`=$land_acers,`land_total_value`=$land_value,`land_sqft_value`=$land_square_feet,"
            . "`land_total_cent`=$land_cent WHERE `land_id` = '$land_id'";
}
$result = $con->query($query);
if ($result > 0) {
    echo $uid;
} else {
    echo '';
}
?>