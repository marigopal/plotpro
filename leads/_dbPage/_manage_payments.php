<?php

include('../../include/lib_page.php');
include('../../PHPMailer/mail_page.php');
$isNew = $_POST['isNew'];
$payments_uid = $_POST['payments_uid'];
$sales_invoice = $_POST['sales_invoice'];
$lead_id = $_POST['lead_id'];
$payments_date = $_POST['payments_date'];
$payments_reference_auto_no = $_POST['payments_reference_auto_no'];
$payments_reference_auto_name = $_POST['payments_reference_auto_name'];
$plot_id = $_POST['plot_id'];
$payments_amount = $_POST['payments_amount'];
$payments_ref = $_POST['payments_ref'];
$payments_order_ref = $_POST['payments_order_ref'];
$payment_method = $_POST['payment_method'];
$img_name = $_POST['img_name'];
$sms_email_value = $_POST['sms_email_value'];
if ($payments_date != '') {
    $payments_date = strtotime($payments_date);
    $payments_date = date('Y-m-d H:i:s', $payments_date);
} else {
    $landlord_bought_on = NULL;
}
$uid = uniqid();
if ($isNew === 'true') {
    $query = "INSERT INTO `tbl_payment`(`payment_date`, `sales_id`, `lead_id`, `payment_auto_number`, `payment_auto_name`, `plot_id`  , `payment_amount`, `payment_reference`, "
            . "`order_reference`, `payment_method`, `receipt_imgname`, `sms_email_value`, `is_paid`) VALUES (" . ($payments_date == NULL ? "NULL" : "'$payments_date'") . ",'$sales_invoice','$lead_id',"
            . "'$payments_reference_auto_no','$payments_reference_auto_name','$plot_id','$payments_amount','$payments_ref','$payments_order_ref','$payment_method',
            '$img_name','$sms_email_value','1')";
} else if ($isNew === 'false') {
    $query = "UPDATE `tbl_payment` SET `sales_id`='$sales_invoice',`payment_date`='$payments_date',`lead_id`='$lead_id',`payment_auto_number`='$payments_reference_auto_no',
    `payment_auto_name`='$payments_reference_auto_name',`plot_id`='$plot_id',
    `payment_amount`='$payments_amount',`payment_reference`='$payments_ref',
    `order_reference`='$payments_order_ref',`payment_method`='$payment_method', `receipt_imgname`= '$img_name', `sms_email_value`='$sms_email_value' WHERE `payment_id` = '$payments_uid'";
}
if ($result = $con->query($query)) {
    echo "1";
} else {
    echo "0";
}
?>