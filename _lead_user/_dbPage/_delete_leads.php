<?php
include('../../include/lib_page.php');
//Get data from post
$delete_id = $_POST['uid'];
$delete_query = "UPDATE `tbl_leads` SET `is_deleted`='1' WHERE `lead_id` = '$delete_id'";
if ($result = $con->query($delete_query)) 
{
    echo "1";
}
else
{
    echo "0";
}
?>