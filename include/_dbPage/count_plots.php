<?php
//Check company exist in Database
include('../../include/lib_page.php');
$projectid = $_POST['projectid'];
$sql = "SELECT count(*) as count_plots FROM btech_plotpro.tbl_plots where project_id = '$projectid' and is_deleted = '0'";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$count = $row['count_plots'];
echo $count;
?>
