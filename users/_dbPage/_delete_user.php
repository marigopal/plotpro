<?php
include('../../include/lib_page.php');
//Get data from post
$delete_id = $_POST['uid'];
$delete_query = "UPDATE `tbl_users` SET `is_deleted`='1' WHERE `user_id` = '$delete_id'";
//echo $delete_query;exit();
if ($result = $con->query($delete_query)) 
{
    echo "1";
}
else
{
    echo "0";
}
?>