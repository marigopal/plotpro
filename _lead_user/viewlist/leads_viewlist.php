<?php
include '../../include/lib_page.php';
$sno = 0;
$current_user = decrypt($_COOKIE['user_id']);
$sql = "SELECT * FROM `tbl_leads` WHERE `is_active` = '1' AND `is_deleted` = '0' AND `created_by` = '$current_user'";
// echo $sql;exit();
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
            <td><?php echo $row['managed_by']; ?></td>
            <td>
                <a href="/_lead_user/_index_tasks?id=<?php echo $row[0]; ?>"><i class="fas fa-eye"></i></a>
                <!-- <?php if($row['managed_by'] == decrypt($_COOKIE['user_id'])){?>
                <a href="#" data-toggle="modal" data-target="#leads_modal_box" onclick="update_lead('<?= $row['lead_id']; ?>');"><i class="fas fa-edit"></i></a>
                <?php }?>
                <a href="#" data-toggle="modal" data-target="#leads_task_modal" ><i class="fas fa-tasks"></i></a> -->
                <!-- <a href="#" data-toggle="modal" data-target="#leadsdelete_modal_box" onclick="delete_lead('<?= $row['lead_id']; ?>');"><i class="fas fa-trash-alt"></i></a> -->
                <!-- <a href="#" data-toggle="modal" data-target="#leadsdelete_modal_box" onclick="delete_lead('<?= $row['lead_id']; ?>');"><i class="fas fa-trash-alt"></i></a> -->
            </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>
  