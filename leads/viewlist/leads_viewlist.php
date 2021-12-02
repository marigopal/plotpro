<?php
include '../../include/lib_page.php';
$sno = 0;
$sql = "SELECT * FROM `tbl_leads` WHERE `is_active` = '1' AND `is_deleted` = '0'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row['lead_id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="/leads/index_payments?id=<?php echo $row[0]; ?>"><i class="fas fa-eye"></i></a>
                <a href="#" data-toggle="modal" data-target="#leads_modal_box" onclick="update_lead('<?= $row['lead_id']; ?>');"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#leadsdelete_modal_box" onclick="delete_lead('<?= $row['lead_id']; ?>');"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>
  