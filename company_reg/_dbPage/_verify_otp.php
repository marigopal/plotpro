<?php

include('../../include/lib_page.php');
include('../../PHPMailer/mail_page.php');
$otp_input = $_POST['otp_input'];
$time = new DateTime();
$current_time = $time->format('Y-m-d H:i:s');
$minutes_to_add = 5;
$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
$otp_expiration_on = $time->format('Y-m-d H:i:s');
$get_otp_query = "SELECT `company_id`,`otp`,`otp_expiration_date`,`is_active`,`company_email` FROM `tbl_company` WHERE `is_deleted` = '0'";
$result = mysqli_query($con, $get_otp_query);
$row = mysqli_fetch_array($result);
$new_otp = random_strings();
$company_email = $row['company_email'];
if (($row['otp_expiration_date'] > $current_time) && ($row['otp'] == $otp_input)) {

    $update_active = "UPDATE `tbl_company` SET `is_active`='1' WHERE `company_id` = '" . $row['company_id'] . "'";
    if ($result = $con->query($update_active)) {
        $mail->addAddress($company_email);
        $mail->Subject = 'PlotPro - Company Verification Completed';
        $mail->Body = 'Company Registration Completed';
        $mail->send();
        echo "1"; //OTP Verification ok
    }
} else if (($row['otp_expiration_date'] > $current_time) && ($row['otp'] != $otp_input)) {
    echo "2"; //Incorrect OTP
} else if (($row['otp_expiration_date'] < $current_time) && ($row['otp'] == $otp_input)) {

    $update_otp = "UPDATE `tbl_company` SET `otp`='$new_otp',`otp_expiration_date`='$otp_expiration_on' WHERE `company_id` = '" . $row['company_id'] . "'";
    if ($result = $con->query($update_otp)) {
        $mail->addAddress($company_email);
        $mail->Subject = 'PlotPro - User Register Validation - OTP';
        $mail->Body = 'Company Registration new OTP - <b>' . $new_otp . '</b>';
        $mail->send();
        echo "3"; //OTP Expired and resent otp to mail
    }
    
} else if (($row['otp_expiration_date'] < $current_time) && ($row['otp'] != $otp_input)) {

    $update_otp = "UPDATE `tbl_company` SET `otp`='$new_otp',`otp_expiration_date`='$otp_expiration_on' WHERE `company_id` = '" . $row['company_id'] . "'";
    if ($result = $con->query($update_otp)) {
        $mail->addAddress($company_email);
        $mail->Subject = 'PlotPro - User Register Validation - OTP';
        $mail->Body = 'Company Registration new OTP - <b>' . $new_otp . '</b>';
        $mail->send();
        echo "4"; //OTP Expired and resent otp to mail
    }
    
} 
else {
    echo "0";
}

function random_strings() {
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result), 0, 8);
}
 
?>
