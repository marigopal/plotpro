<?php
include '../../include/lib_page.php';
$sno = 0;
$sql = "SELECT * FROM `tbl_users` WHERE `is_active` ='1' and `is_deleted` = '0'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['employee_id']; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['mobile_number']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td>
                <a href="#" data-toggle="modal" data-target="#users_modal_box" onclick="update_user('<?= $row[0]; ?>');"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#deleteuser_modal_box" onclick="delete_user('<?= $row[0]; ?>');"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>
  