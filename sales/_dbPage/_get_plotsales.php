<?php
include('../../include/lib_page.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_plotsales` WHERE `is_deleted` = '0' AND `plotsale_id` = '$id'";
// echo $sql;exit();
$result = mysqli_query($con,$sql);
$users_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $plotsale_id = $row['plotsale_id'];
    $sales_number = $row['sales_number'];
    $sales_name = $row['sales_name'];
    $project_id = $row['project_id'];
    $block_id = $row['block_id'];
    $lead_id = $row['lead_id'];
    $plot_id = $row['plot_id'];
    $sqft_value = $row['sqft_value'];
    $sqft_total = $row['sqft_total'];
    $cent_value = $row['cent_value'];
    $cent_total = $row['cent_total'];
    $net_cost = $row['net_cost'];
    $reg_amt = $row['reg_amt'];
    $total_cost = $row['total_cost'];
    $initial_payment = $row['initial_payment'];
    $is_immediate_payment = $row['is_immediate_payment'];
    $is_emi_converted = $row['is_emi_converted'];
    $emi_amt = $row['emi_amt'];
    $is_flexi_converted = $row['is_flexi_converted'];
    $max_months_allowed = $row['max_months_allowed'];
    $users_arr[] = array("plotsale_id" => $plotsale_id, "sales_number" => $sales_number, "sales_name" => $sales_name, "project_id" => $project_id, "block_id" => $block_id, "lead_id" => $lead_id, "plot_id" => $plot_id, "sqft_value" => $sqft_value, "sqft_total" => $sqft_total, "cent_value" => $cent_value, "cent_total" => $cent_total, "net_cost" => $net_cost, "reg_amt" => $reg_amt, "total_cost" => $total_cost,"initial_payment" => $initial_payment,"is_immediate_payment" => $is_immediate_payment, "is_emi_converted" => $is_emi_converted, "emi_amt" => $emi_amt, "is_flexi_converted" => $is_flexi_converted, "max_months_allowed" => $max_months_allowed);
}
echo json_encode($users_arr);
?>