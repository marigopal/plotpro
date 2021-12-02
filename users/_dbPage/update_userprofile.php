<?php
include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$user_id = $_POST['user_id'];
$emp_id = $_POST['emp_id'];
$full_name = $_POST['full_name'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$user_query = "UPDATE `tbl_users` SET `full_name`='$full_name',`city`='$city',`mobile_number`='$mobile',`email`='$email',
    `address1`='$address1',`address2`='$address2',`employee_id`='$emp_id',`is_firstlogin`='0' WHERE `user_id` = '$user_id'";

if ($result = $con->query($user_query)) 
    {
        echo "1";
    }
    else{echo "0";}
?>