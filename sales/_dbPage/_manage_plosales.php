<?php
include('../../include/lib_page.php');
$isNew = $_POST['isNew'];
$plotsales_uid = $_POST['plotsales_uid'];
$sales_no = $_POST['sales_no'];
$sales_name = $_POST['sales_name'];
$project_id = $_POST['project_id'];
$block_id = $_POST['block_id'];
$lead_id = $_POST['lead_id'];
$plot_id = $_POST['plot_id'];
$sqft_value = $_POST['sqft_value'];
$total_sqft_value = $_POST['total_sqft_value'];
$cent_value = $_POST['cent_value'];
$net_cost = $_POST['net_cost'];
$reg_cost = $_POST['reg_cost'];
$total_cent = $_POST['total_cent'];
$total_cost = $_POST['total_cost'];
$initial_amt = $_POST['initial_amt'];
$maximum_month = $_POST['maximum_month'];
$immediate_value = $_POST['immediate_value'];
$emi_value = $_POST['emi_value'];
$emi_amt = $_POST['emi_amt'];
$flexi_value = $_POST['flexi_value'];
$uid = uniqid();
$current_user = decrypt($_COOKIE['user_id']);
if($isNew === 'true')
{
    $query = "INSERT INTO `tbl_plotsales`(`plotsale_id`, `sales_number`, `sales_name`, `project_id`, `block_id`, `lead_id`, `plot_id`,
     `sqft_value`, `sqft_total`, `cent_value`, `cent_total`,
     `net_cost`,`reg_amt`,`total_cost`, `initial_payment`, `is_immediate_payment`, `is_emi_converted`,`emi_amt`, `is_flexi_converted`, `max_months_allowed`, `created_by`, `created_on`) 
     VALUES ('$uid','$sales_no','$sales_name','$project_id','$block_id','$lead_id','$plot_id',
     '$sqft_value','$total_sqft_value',
     '$cent_value','$total_cent','$net_cost','$reg_cost','$total_cost',
     '$initial_amt','$immediate_value','$emi_value','$emi_amt','$flexi_value','$maximum_month','$current_user',now())";

}

else if($isNew === 'false')
{
    $query = "UPDATE `tbl_plotsales` SET `project_id`='$project_id',`block_id`='$block_id',`lead_id`='$lead_id',
    `plot_id`='$plot_id', `sqft_value`='$sqft_value',`sqft_total`='$total_sqft_value',`cent_value`='$cent_value',`cent_total`='$total_cent',
    `net_cost`='$net_cost',`reg_amt`='$reg_cost',`total_cost`='$total_cost',`initial_payment`='$initial_amt',
    `is_emi_converted`='$emi_value', `is_immediate_payment` = '$immediate_value',
    `emi_amt`='$emi_amt',`is_flexi_converted`='$flexi_value',`max_months_allowed`='$maximum_month' WHERE `plotsale_id` = '$plotsales_uid'";
}
// echo $query;exit();
$result = $con->query($query);
if($result == 1)
    {
        $update_sale_status = "UPDATE `tbl_plots` SET `is_sold`='1',`lead_id`='$lead_id' WHERE `plot_id` = '$plot_id'";
        $result_plot_update = $con->query($update_sale_status);
        if($result_plot_update > 0){

    echo "1";
    }
    }
    else{
        echo '0';
    }
    
?>