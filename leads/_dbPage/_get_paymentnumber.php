<?php

include('../../include/lib_page.php');
$sql = "SELECT Max(payment_auto_number) as new_payment_auto_number FROM `tbl_payment`";
$result = mysqli_query($con, $sql);
$data_arr = array();
while ($row = mysqli_fetch_array($result)) {
    $payment_number = $row['new_payment_auto_number'];
    if ($payment_number == null) {
        $payment_number = 0;
    }
    $data_arr[] = array("payment_number" => $payment_number);
}
echo json_encode($data_arr);
?>