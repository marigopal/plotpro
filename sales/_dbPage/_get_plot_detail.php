<?php
include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_plots` WHERE `is_deleted` = '0' AND `plot_id` = '$id'";
// echo $sql;exit();
$result = mysqli_query($con,$sql);
$users_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $square_feet = $row['square_feet'];
    $sqft_value = $row['sqft_value'];
    $in_cent = $row['in_cent'];
    
    $users_arr[] = array("square_feet" => $square_feet, "sqft_value" => $sqft_value, "in_cent" => $in_cent);
}
echo json_encode($users_arr);
?>