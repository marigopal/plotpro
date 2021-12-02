<?php
include '../../include/lib_page.php';
$sno = 0;
$sql = "SELECT a.`plotsale_id`,a.`lead_id`,a.`plot_id`,a.`sqft_value`,a.`sqft_total`,a.`cent_value`,a.`cent_total`,a.`total_cost`,a.`initial_payment`,a.`is_emi_converted`,a.`is_flexi_converted`,a.`max_months_allowed`,a.`is_deleted`,a.created_by,a.created_on,b.lead_id,b.first_name,c.plot_id,c.plot_name from tbl_plotsales a LEFT JOIN tbl_leads b on a.lead_id = b.lead_id LEFT JOIN tbl_plots c on a.plot_id = c.plot_id WHERE a.is_deleted = '0' ORDER BY a.created_on DESC";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row['plotsale_id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['plot_name']; ?></td>
            <td><?php echo $row['sqft_value']; ?></td>
            <td><?php echo $row['sqft_total']; ?></td>
            <td><?php echo $row['cent_value']; ?></td>
            <td><?php echo $row['cent_total']; ?></td>
            <td><?php echo $row['total_cost']; ?></td>
            <td>
                <a href="/leads/index_payments?id=<?php echo $row['lead_id']; ?>"><i class="fas fa-amazon-pay"></i></a>
                <a href="#" data-toggle="modal" data-target="#salesplot_modal_box" onclick="update_sales('<?php echo $row['plotsale_id'] ?>');"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#salesdelete_modal_box" onclick=" $('#salesdelete_uid').val('<?= $row['plotsale_id']; ?>');"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>