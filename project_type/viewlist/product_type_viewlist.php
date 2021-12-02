<?php
include '../../include/lib_page.php';
$sno = 0;
$sql = "SELECT `projecttype_id`, `projectype_name`, `is_deleted` FROM `tbl_projecttype` WHERE `is_deleted` = '0'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row['projecttype_id']; ?></td>
            <td><?php echo $row['projectype_name']; ?></td>
            <td>
                <a href="#" data-toggle="modal" data-target="#projecttype_modal_box" onclick="update_projecttype('<?= $row['projecttype_id']; ?>');"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#delete_modal_box" onclick="delete_projecttype('<?= $row['projecttype_id']; ?>');"><i class="fas fa-trash-alt"></i></a>
            </td>ref="#" data-toggle="modal" data-target="#modal-danger"><i class="fas fa-trash-alt"></i></a>
        </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>