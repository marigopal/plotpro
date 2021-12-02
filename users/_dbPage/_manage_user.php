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
$username = $_POST['username'];
$password = encrypt($_POST['password']);
$user_role = $_POST['user_role'];
$is_admin = '1';
if($user_role != 1)
{
 $is_admin = '0';
}
$uid = uniqid();
if($isNew === 'true')
{
    $user_query = "INSERT INTO `tbl_users`(`user_id`, `full_name`, `city`, `mobile_number`, `email`, `address1`, "
            . "`address2`, `employee_id`, `username`, `password`, `role_id`, `is_admin`, `is_firstlogin`, `is_active`, `created_on`) "
            . "VALUES ('$uid','$full_name','$city','$mobile','$email','$address1','$address2','$emp_id','$username','$password','$user_role','$is_admin','1','1',now())";
    
}
else if($isNew === 'false')
{
    
    $user_query = "UPDATE `tbl_users` SET `full_name`='$full_name',`city`='$city',`mobile_number`='$mobile',`email`='$email',
    `address1`='$address1',`address2`='$address2',`employee_id`='$emp_id',`username`='$username',`password`='$password',`role_id`='$user_role',`is_admin`='$is_admin' WHERE `user_id` = '$user_id'";
}
// echo $user_query;exit();
if ($result = $con->query($user_query)) 
    {
        echo "1";
    }
    else{echo "0";}
?>