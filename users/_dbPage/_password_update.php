<?php
include('../../include/lib_page.php');
$user_id = decrypt($_POST['user_id']);
$password = encrypt($_POST['password']);
$update_ = "UPDATE `tbl_users` SET `password`='$password' WHERE `user_id` = '$user_id'";
if ($result = $con->query($update_)) 
{
    echo "1";
}
else
{
    echo "0";
}
?>