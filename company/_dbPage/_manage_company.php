<?php

include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$company_uid = $_POST['company_uid'];
$company_name = $_POST['company_name'];
$company_city = $_POST['company_city'];
$company_properitor = $_POST['company_properitor'];
$company_zipcode = $_POST['company_zipcode'];
$company_phone = $_POST['company_phone'];
$company_mobile = $_POST['company_mobile'];
$company_email = $_POST['company_email'];
$company_address1 = $_POST['company_address1'];
$company_address2 = $_POST['company_address2'];
$uid = uniqid();
if ($isNew === 'true') {
    $company_query = "INSERT INTO `tbl_company`(`company_id`, `company_name`, `company_address`, "
            . "`company_city`, `company_zipcode`, `company_properitor`) "
            . "VALUES ('$uid','$company_name','$company_addresss','$company_city','$company_zipcode','$company_properitor')";
} else if ($isNew === 'false') {
    $company_query = "UPDATE `tbl_company` SET `company_name`='$company_name',`company_address1`='$company_address1',"
            . "`company_address2`='$company_address2',`company_city`='$company_city',`company_zipcode`='$company_zipcode',"
            . "`company_email`='$company_email',`company_mobileno`='$company_mobile',`company_phone`='$company_phone',"
            . "`company_properitor`='$company_properitor' WHERE `company_id` = '$company_uid'";
}
if ($result = $con->query($company_query)) {
    echo "1";
} else {
    echo "0";
}
?>