<?php
include '../../include/lib_page.php';
$sno = 0;
$sql = "SELECT `block_id`, `block_name`, `is_deleted` FROM `tbl_blocks` WHERE `is_deleted` = '0' ORDER BY block_name ASC";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td>
                <a href="#" data-toggle="modal" data-target="#blocks_modal_box" onclick="update_blocks('<?= $row[0]; ?>');"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#delete_modal_box" onclick="delete_blocks('<?= $row[0]; ?>');"><i class="fas fa-trash-alt"></i></a>
            </td>ref="#" data-toggle="modal" data-target="#modal-danger"><i class="fas fa-trash-alt"></i></a>
        </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?> 