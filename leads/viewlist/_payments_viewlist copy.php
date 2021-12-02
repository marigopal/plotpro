<?php
include '../../include/lib_page.php';
$sno = 0;
$sql = "SELECT a.`payment_id`,a.`payment_date`,a.`lead_id`,a.`sales_id`, a.`payment_auto_name`,a.`plot_id`,a.`payment_amount`,a.`payment_reference`,a.`order_reference`,a.`is_paid`,a.`is_deleted`,b.`lead_id`,b.`first_name`,c.`plot_id`,c.`plot_name` FROM tbl_payment a LEFT JOIN tbl_leads b on a.lead_id = b.lead_id LEFT JOIN tbl_plots c on a.plot_id = c.plot_id where a.is_deleted = '0'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row['payment_id']; ?></td>
            <td><?php echo $row['payment_date']; ?></td>
            <td><?php echo $row['payment_auto_name']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['plot_name']; ?></td>
            <td><?php echo $row['payment_amount']; ?></td>
            <td><?php if ($row['is_paid'] == 1) {
            echo "Paid";
        } ?></td>
            <td>
                <a href="#" data-toggle="modal" data-target="#payments_modal_box" onclick="update_payment('<?php echo $row['payment_id'] ?>');"><i class="fas fa-print"></i></a>
                <a href="#" data-toggle="modal" data-target="#payments_modal_box" onclick="update_payment('<?php echo $row['payment_id'] ?>');"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#deletepayment_modal_box" onclick=" $('#deletepayment_id').val('<?= $row['payment_id']; ?>');"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>
  