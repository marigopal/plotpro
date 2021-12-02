<?php
include '../../include/lib_page.php';
$sno = 0;
$sql = "SELECT * FROM `tbl_project_amenity` WHERE `is_deleted` = '0'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        ?>	
        <tr>
            <td><?= ++$sno; ?></td>
            <td hidden=""><?php echo $row[0]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td style="white-space:pre-wrap; word-wrap:break-word"><?php echo $row[3]; ?></td>
            <td>
                <a href="#" data-toggle="modal" data-target="#amenity_modal_box" onclick="update_amenity('<?= $row[0]; ?>');"><i class="fas fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#deleteamenity_modal_box" onclick="delete_amenity('<?= $row[0]; ?>');"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php
    }
}
mysqli_close($con);
?>  