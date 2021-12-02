<?php
include('../../include/lib_page.php');
include('../../PHPMailer/mail_page.php');
$isNew = $_POST['isNew'];
$company_uid = $_POST['company_uid'];
$company_name = $_POST['company_name'];
$company_addresss1 = $_POST['company_addresss1'];
$company_addresss2 = $_POST['company_addresss2'];
$company_city = $_POST['company_city'];
$company_zipcode = $_POST['company_zipcode'];
$company_email = $_POST['company_email'];
$company_mobile = $_POST['company_mobile'];
$company_properitor = $_POST['company_properitor'];
$otp = $_POST['otp'];
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = encrypt($_POST['password']);
}
$minutes_to_add = 5;
$time = new DateTime();
$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
$otp_expiration_on = $time->format('Y-m-d H:i:s');
$uid = uniqid();
if ($isNew === 'true') {
    $company_query = "INSERT INTO `tbl_company`(`company_id`, `company_name`, `company_address1`,`company_address2`, "
            . "`company_city`, `company_zipcode`,`company_email`,`company_mobileno`, `company_properitor`,`otp`,`otp_expiration_date`) "
            . "VALUES ('$uid','$company_name','$company_addresss1','$company_addresss2','$company_city','$company_zipcode',"
            . "'$company_email','$company_mobile','$company_properitor','$otp','$otp_expiration_on')";
          
           
} else if ($isNew === 'false') {
    $company_query = "UPDATE `tbl_company` SET `company_name`='$company_name',`company_address`='$company_addresss',"
            . "`company_city`='$company_city',`company_zipcode`='$company_zipcode',"
            . "`company_properitor`='$company_properitor' WHERE `company_id` = '$company_uid'";
}
//echo $company_query;exit();
if ($result = $con->query($company_query)) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($username != '' && $password != '') {
            $insert_user = "INSERT INTO `tbl_users`(`user_id`, `full_name`, `city`, `email`, `address1`, `address2`,`username`, `mobile_number`,`password`, `is_firstlogin`, "
                    . "`is_admin`, `is_active`, `created_on`,`role_id`) "
                    . "VALUES ('$uid','$company_properitor','$company_city','$company_email','$company_addresss1','$company_addresss2','$username','$company_mobile','$password','1','1','1',now(),'1')";
                    // echo $insert_user;exit();
            if ($result = $con->query($insert_user)) {
                
                $block_exist = "select count(*) as cntUser from tbl_blocks";
                $result_blocks_exist = mysqli_query($con, $block_exist);
                $row_blocks_exist = mysqli_fetch_array($result_blocks_exist);
                if ($row_blocks_exist['cntUser'] <= 0) {
                    
                    $block_query =  "Insert into `tbl_blocks`(block_id, block_name, is_deleted)
                    VALUES
                    ('100bl0a000a01','A', 0),    ('100bl0a000a02','B', 0),    ('100bl0a000a03','C', 0),
                    ('100bl0a000a04','D', 0),    ('100bl0a000a05','E', 0),    ('100bl0a000a06','F', 0),
                    ('100bl0a000a07','G', 0),    ('100bl0a000a08','H', 0),    ('100bl0a000a09','I', 0),
                    ('100bl0a000a10','J', 0),    ('100bl0a000a11','K', 0),    ('100bl0a000a12','L', 0),
                    ('100bl0a000a13','M', 0),    ('100bl0a000a14','N', 0),    ('100bl0a000a15','O', 0),
                    ('100bl0a000a16','P', 0),    ('100bl0a000a17','Q', 0),    ('100bl0a000a18','R', 0),
                    ('100bl0a000a19','S', 0),    ('100bl0a000a20','T', 0),    ('100bl0a000a21','U', 0),
                    ('100bl0a000a22','V', 0),    ('100bl0a000a23','W', 0),    ('100bl0a000a24','X', 0),
                    ('100bl0a000a25','Y', 0),    ('100bl0a000a26','Z', 0)"; 
                    // echo $block_query; exit();
                    $result = $con->query($block_query);
                   
               } 
                echo "1";
            }
        }
    }
    $mail->addAddress($company_email);
    $mail->Subject = 'PlotPro - User Register Validation - OTP';
    $mail->Body = 'Company Registration OTP - <b>' . $otp . '</b>';
    $mail->send();
   
} else {
    echo "0";
}
?>
