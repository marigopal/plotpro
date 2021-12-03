<?php
include '../../include/lib_page.php';
$sno = 0;
if (!empty($_POST['filter'])) {
    $filter = $_POST['filter'];
    $where = "WHERE a.`lead_id` = '$filter'";
    // echo $filter;echo $where;
} else {
    $where = "";
}
$sql = "SELECT a.`plotsale_id`,a.`sales_name`,a.`project_id`,a.`block_id`,a.`lead_id`,a.`plot_id`,a.`total_cost`,a.`is_immediate_payment`,a.`created_by`,a.`created_on`,a.`is_deleted`,b.project_id,b.project_name,d.lead_id,d.first_name,e.plot_id,e.plot_name,f.payment_id,f.sales_id,f.payment_amount FROM `tbl_plotsales`a LEFT JOIN tbl_projects b on a.`project_id` = b.project_id LEFT JOIN tbl_leads d on a.`lead_id` = d.lead_id LEFT JOIN tbl_plots e on a.`plot_id` = e.plot_id LEFT JOIN tbl_payment f on a.`plotsale_id` = f.sales_id $where 
GROUP BY a.`plot_id`
ORDER BY a.`created_by` DESC";
// echo $sql;exit();
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>
        <tr data-widget="expandable-table" aria-expanded="false" class="thead-dark" style="background: #91bbff;">
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row['plotsale_id']; ?></td>
            <td><?php echo $row['created_on']; ?></td>
            <td><?php echo $row['project_name']; ?></td>
            <td><?php echo $row['plot_name']; ?></td>
            <td><?php echo $row['total_cost']; ?></td>
            <td></td>
            <td><?php echo ${strtoupper(trim($row['created_by'])) . 'full_name'}; ?></td>
        </tr>
        <tr class="expandable-body d-none">
            <td style="width:auto;" colspan="7"><p>
                <table class="table table-bordered table-striped pl-0">
                    <thead>
                        <tr>
                            <th hidden="">ID</th>
                            <th>Payment Date</th>
                            <th>Receipt</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sale_id = $row['plotsale_id'];
                        $project_id = $row['project_id'];
                        $lead_id = $row['lead_id'];
                        
                        $sub_sql = "SELECT a.`payment_id`,a.`sales_id`,a.`payment_date`,a.`payment_auto_name`,
                        a.`payment_amount`,a.`payment_method`,b.plotsale_id,b.sales_name,b.project_id,b.lead_id 
                        FROM `tbl_payment` a LEFT JOIN tbl_plotsales b on a.`sales_id` = b.plotsale_id 
                        WHERE b.project_id = '$project_id' AND b.lead_id = '$lead_id' AND a.`sales_id` = '$sale_id' and a.is_deleted = '0' ORDER BY a.`payment_date` DESC";
    //  echo $sub_sql;exit();
                        $subresult = $con->query($sub_sql);
                        if ($subresult->num_rows > 0) {
                            while ($subrow = $subresult->fetch_array(MYSQLI_BOTH)) {
                                ?>	
                                <tr  style="background:white;">
                                    <td style="width:auto;" hidden=""><p><?php echo $subrow['payment_id']; ?></p></td>
                                    <td style="width:auto;"><p><?php echo $subrow['payment_date']; ?></p></td>
                                    <td style="width:auto;"><p><?php echo $subrow['payment_auto_name']; ?></p></td>
                                    <td style="width:auto;" ><p><?php echo $subrow['payment_amount']; ?></p></td>
                                    <td style="width:auto;" ><p><?php  
                                    if($subrow['payment_method'] == 1)
                                    { echo "Cash";}
                                    elseif($subrow['payment_method'] == 2 || $subrow['payment_method'] == 3)
                                    {echo "Online";} 
                                    ?></p></td>
                                    <td style="width:auto;"><p>
                                    <a href="#" data-toggle="modal" data-target="#payments_modal_box" onclick="update_payment('<?php echo $row['payment_id'] ?>');"><i class="fas fa-print"></i></a>
                <a href="#" data-toggle="modal" data-target="#payments_modal_box" onclick="update_payment('<?php echo $row['payment_id'] ?>');"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#deletepayment_modal_box" onclick=" $('#deletepayment_id').val('<?= $row['payment_id']; ?>');"><i class="fas fa-trash-alt"></i></a>
                                    </p></td>
                                    
                                   
                                </tr>   
                                <?php
                            }
                        }
                        ?> 

                    </tbody>
                </table>
            </p></td>
        </tr>   
        <?php
    }
}

mysqli_close($con);
?>
  