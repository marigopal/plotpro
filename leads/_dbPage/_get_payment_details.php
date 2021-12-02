<?php

include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_payment` WHERE `is_deleted` = '0' AND `payment_id` = '$id'";
$result = mysqli_query($con, $sql);
$users_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $payment_id = $row['payment_id'];
    $sales_id = $row['sales_id'];
    $payment_date = $row['payment_date'];
    $lead_id = $row['lead_id'];
    $payment_auto_number = $row['payment_auto_number'];
    $payment_auto_name = $row['payment_auto_name'];
    $plot_id = $row['plot_id'];
    $payment_amount = $row['payment_amount'];
    $payment_reference = $row['payment_reference'];
    $order_reference = $row['order_reference'];
    $payment_method = $row['payment_method'];
    $receipt_imgname = $row['receipt_imgname'];
    $sms_email_value = $row['sms_email_value'];
    $is_paid = $row['is_paid'];
    $users_arr[] = array("payment_id" => $payment_id, "sales_id" => $sales_id, "payment_date" => $payment_date, "lead_id" => $lead_id, "payment_auto_number" => $payment_auto_number, "payment_auto_name" => $payment_auto_name, "plot_id" => $plot_id, "payment_amount" => $payment_amount, "payment_reference" => $payment_reference, "order_reference" => $order_reference, "payment_method" => $payment_method, "receipt_imgname" => $receipt_imgname, "sms_email_value" => $sms_email_value, "is_paid" => $is_paid);
}
echo json_encode($users_arr);
?>