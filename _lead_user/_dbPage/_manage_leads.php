<?php
include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$leads_uid = $_POST['leads_uid'];
$leads_title = $_POST['leads_title'];
$leads_firstname = $_POST['leads_firstname'];
$leads_midname = $_POST['leads_midname'];
$leads_lastname = $_POST['leads_lastname'];
$leads_logged = $_POST['leads_logged'];
$leads_address1 = $_POST['leads_address1'];
$leads_address2 = $_POST['leads_address2'];
$leads_city = $_POST['leads_city'];
$leads_state = $_POST['leads_state'];
$leads_zipcode = $_POST['leads_zipcode'];
$leads_phone = $_POST['leads_phone'];
$leads_mobile = $_POST['leads_mobile'];
$leads_email = $_POST['leads_email'];
$managed_by = $_POST['managed_by'];
$current_user = decrypt($_COOKIE['user_id']);

$uid = uniqid();
if($isNew === 'true')
{
    $query = "INSERT INTO `tbl_leads`(`lead_id`, `first_name`, `mid_name`, `last_name`, `title`, `phone`, `mobile`, `email`, 
    `city`, `state`, `zipcode`, `address1`, `address2`, `login_user_id`, `status_id`, `created_by`, `created_on`, `managed_by`, `is_active`)
    VALUES ('$uid','$leads_firstname','$leads_midname','$leads_lastname','$leads_title','$leads_phone','$leads_mobile','$leads_email',
    '$leads_city','$leads_state','$leads_zipcode','$leads_address1','$leads_address2','$leads_logged','1','$current_user',now(),'$managed_by','1')";

}

else if($isNew === 'false')
{
    $query = "UPDATE `tbl_leads` SET `first_name`='$leads_firstname',`mid_name`='$leads_midname',`last_name`='$leads_lastname',
    `title`='$leads_title',`phone`='$leads_phone',`mobile`='$leads_mobile',`email`='$leads_email',`city`='$leads_city',
    `state`='$leads_state',`zipcode`='$leads_zipcode',`address1`='$leads_address1',`address2`='$leads_address2', `managed_by`='$managed_by' WHERE `lead_id` = '$leads_uid'";
}
// echo $query;exit();
$result = $con->query($query);
if($result == 1)
    {
    echo $uid;
    }
    else{
        echo "0";
    }
    
?>